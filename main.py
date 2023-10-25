import cv2
import face_recognition
import threading
import numpy as np
from dao.mysql import DatabaseConnection
from datetime import datetime, time
from PIL import Image
from io import BytesIO
from utils.myserial import MYSerial
from twilio.rest import Client
import requests


class FaceDetectionRecognition:
    def __init__(self):
        # fonte pra mostra texto
        self.font = cv2.FONT_HERSHEY_SIMPLEX
        self.cadastrado_cor = (0, 255, 0)  # Verde neon para pessoa cadastrada
        self.desconhecido_cor = (0, 0, 255)  # Vermelho para pessoa desconhecida
        self.tamanho = 1
        self.espessura = 2
        # selecionar webcam
        #self.cap = cv2.VideoCapture(1, cv2.CAP_DSHOW)
        self.cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)
        # definir largura da tela
        self.cap.set(3, 640)
        # definir altura da tela.
        self.cap.set(4, 480)
        # definir número de frames por segudo
        self.cap.set(cv2.CAP_PROP_FPS,30)
        # qual o formato de captura de video
        self.cap.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))
        # lista de rosto conhecidos.
        self.known_faces = []
        # lista de nomes dos rostos conhecidos.
        self.known_names = []
        # lista de telefones das pessoas cadastradas.
        self.know_phones = []
        # lista de matriculas daquele aluno
        self.know_matricula = []
        self.used_sessions = {}
        self.session = requests.Session()

        self.my_serial = MYSerial('COM7', 9600)
      
        # Crie uma instância da classe DatabaseConnection
        db = DatabaseConnection(
            dbname="image_db",
            user="ifba",
            password="ifba6514",
            host="localhost",
            port="3306"
        )

        # Recupere todas as imagens da base de dados
        image_records = db.get_all()

        for record in image_records:
            # pega o retorno do query.
            # matricula, name, phone, _, _, image_binary, _= record
            matricula, name, phone, _, image_binary = record
            # Converta os dados binários em um array de bytes
            image_bytes = bytearray(image_binary)
            

            # Converta os bytes em um objeto de imagem Pillow
            image_pil = Image.open(BytesIO(image_bytes))

            # Converta a imagem Pillow em um array de imagem NumPy
            image_array = np.array(image_pil)

            if len(image_array.shape) == 2:
                image_array = cv2.cvtColor(image_array, cv2.COLOR_BGR2GRAY)

            face_encoding = face_recognition.face_encodings(image_array)[0]

            self.known_faces.append(face_encoding)
            self.known_names.append(name)  # Use o nome do registro
            self.know_phones.append(phone) # Use o phone de registro
            self.know_matricula.append(matricula) # Usa a matricula do aluno.

    def detect_recognize_faces(self):
        self.my_serial.load()
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
                # Verification student in the database.
                if name == "Desconhecido": # student dont found.
                    #cv2.rectangle(img, (left, top), (right, bottom), cor, self.espessura)
                    #aqcv2.putText(img, "["+ name + "]", (left, top - 10), self.font, self.tamanho, cor, self.espessura, cv2.LINE_AA)
                    self.my_serial.receive(0) # envia dados serial para o arduino
                else: # There is a student with its similiraty face.
                    cv2.rectangle(img, (left, top), (right, bottom), cor, self.espessura)
                    cv2.putText(img, "[Aluno:"+  name + "]", (left, top - 10), self.font, self.tamanho, cor, self.espessura, cv2.LINE_AA)
                    self.my_serial.receive(1) # envia dados serial para o arduino
                    url = "http://127.0.0.1:8000/send_message"
                    resultado = self.get_user_session(url, name, celphone)
                    print(resultado)
            cv2.imshow('img', img)

            if cv2.waitKey(1) & 0xFF == ord('q'):
                break
        self.session.close()

    def get_user_session(self, url, name_student, phone_student):
        
        data_hora_atual = datetime.now()
        hora_atual = data_hora_atual.time()
        #entrada
        start_time_enter = time(17,30) # horario de entrada
        end_time_enter = time(18,30)
        #saida 
        start_time_out = time(18,31) # horario de saida.
        end_time_out = time(22,0)

        if name_student in  self.used_sessions:
            return f"A sessão para {name_student} já foi iniciada anteriomente."
        else:
            data = {
                "name":name_student,
                "phone":phone_student,
            }

            if start_time_enter <= hora_atual <= end_time_enter:
                data["on_school"] = False
            elif start_time_out <= hora_atual <= end_time_out:
                data["on_school"] = True
            else:
                return "Fora do horário permitido para enviar a mensagem."

            response = self.session.post(url, json=data)
            self.used_sessions[name_student] = self.session

            if response.status_code == 200:
                print("Mensagem enviada com sucesso.")
                print(response.json())
            else:
                print("Houve um erro: ", response.status_code)
                print(response.text)



    def start(self):
        # make threas, it will work very great system.
        thread = threading.Thread(target=self.detect_recognize_faces)
        thread.start()
        thread.join()

if __name__ == "__main__":
    # Crie uma instância da classe FaceDetectionRecognition e inicie a detecção
    face_detection_recognition = FaceDetectionRecognition()
    face_detection_recognition.start()
