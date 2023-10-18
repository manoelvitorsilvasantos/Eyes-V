import cv2
import mediapipe as mp
from utils.twilio import App
from time import sleep

webcam = cv2.VideoCapture(0, cv2.CAP_DSHOW)
webcam.set(3, 640)
webcam.set(4, 480)
webcam.set(cv2.CAP_PROP_FPS, 30)
webcam.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))
app = App()

reconhecimento_rosto = mp.solutions.face_detection
desenho = mp.solutions.drawing_utils
reconhecedor_rosto = reconhecimento_rosto.FaceDetection()

while webcam.isOpened():
    validacao, frame = webcam.read()
    if not validacao:
        break
    imagem = frame
    lista_rostos = reconhecedor_rosto.process(imagem)
    if lista_rostos.detections:
        for rosto in lista_rostos.detections:
            desenho.draw_detection(imagem, rosto)
        cv2.imshow("Rostos na sua webcam", imagem)
    if cv2.waitKey(5) == 27:
        break

webcam.release()
cv2.destroyAllWindows()
