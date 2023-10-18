import cv2
import face_recognition
import threading
import time
import numpy as np
from dao.mysql import DatabaseConnection
from PIL import Image
from io import BytesIO
from utils.myserial import MYSerial
from utils.twilio import App

class FaceDetectionRecognition:
    def __init__(self):
        self.font = cv2.FONT_HERSHEY_SIMPLEX
        self.cadastrado_cor = (0, 255, 0)
        self.desconhecido_cor = (0, 0, 255)
        self.tamanho = 1
        self.espessura = 2

        self.cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)
        self.cap.set(3, 640)
        self.cap.set(4, 480)
        self.cap.set(cv2.CAP_PROP_FPS, 30)
        self.cap.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))

        self.known_faces = []
        self.known_names = []
        self.know_phones = []
        self.know_matricula = []

        self.account_sid = 'AC32215330dcd9178564d0b312cffe4531'
        self.auth_token = '28d5285f9ba6d7b99fae4058e12792a9'
        self.my_serial = MYSerial('COM7', 9600)
        self.app = App()

        db = DatabaseConnection(
            dbname="image_db",
            user="ifba",
            password="ifba6514",
            host="localhost",
            port="3306"
        )

        image_records = db.get_all()

        for record in image_records:
            matricula, name, phone, _, image_binary = record
            image_bytes = bytearray(image_binary)

            image_pil = Image.open(BytesIO(image_bytes))

            image_array = np.array(image_pil)

            if len(image_array.shape) == 2:
                image_array = cv2.cvtColor(image_array, cv2.COLOR_BGR2GRAY)

            face_encoding = face_recognition.face_encodings(image_array)[0]
            self.known_faces.append(face_encoding)
            self.known_names.append(name)
            self.know_phones.append(phone)
            self.know_matricula.append(matricula)

    def detect_recognize_faces(self):
        self.my_serial.load()
        paused = False

        while True:
            ret, img = self.cap.read()
            rgb_img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)

            face_locations = face_recognition.face_locations(rgb_img)
            face_encodings = face_recognition.face_encodings(rgb_img, face_locations)

            for (top, right, bottom, left), face_encoding in zip(face_locations, face_encodings):
                matches = face_recognition.compare_faces(self.known_faces, face_encoding)
                name = "Desconhecido"
                cor = self.desconhecido_cor
                if any(matches):
                    name = self.known_names[matches.index(True)]
                    matricula = self.know_matricula[matches.index(True)]
                    celphone = self.know_phones[matches.index(True)]
                    cor = self.cadastrado_cor

                if name == "Desconhecido":
                    paused = True
                    cv2.rectangle(img, (left, top), (right, bottom), cor, self.espessura)
                    cv2.putText(img, "[" + name + "]", (left, top - 10), self.font, self.tamanho, cor, self.espessura,
                                cv2.LINE_AA)
                    self.my_serial.receive(0)
                    paused = False
                else:
                    aluno_cadastrado = f"{name}{matricula}"
                    paused = True
                    cv2.rectangle(img, (left, top), (right, bottom), cor, self.espessura)
                    cv2.putText(img, "[Aluno:" + aluno_cadastrado + "]", (left, top - 10), self.font, self.tamanho, cor,self.espessura, cv2.LINE_AA)
                    # Pausa a exibição de frames quando a mensagem e o comando serial são enviados
                    self.my_serial.receive(1)
                    self.app.sendMessage(celphone, 'Aluno Entrou no colégio.')
                    paused = False
            if not paused:
                cv2.imshow('img', img)

            key = cv2.waitKey(1)

            if key & 0xFF == ord('q'):
                break

    def start(self):
        thread = threading.Thread(target=self.detect_recognize_faces)
        thread.start()
        thread.join()

if __name__ == "__main__":
    face_detection_recognition = FaceDetectionRecognition()
    face_detection_recognition.start()
