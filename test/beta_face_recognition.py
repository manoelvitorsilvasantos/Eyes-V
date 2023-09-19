import face_recognition
import cv2
import numpy as np

# Carregar imagens das pessoas que você deseja reconhecer
imagem_vitor = face_recognition.load_image_file("manoel.jpg")


# Codificar os rostos das imagens
codificacao_vitor = face_recognition.face_encodings(imagem_vitor)[0]


# Capturar vídeo da webcam usando o backend DirectShow
cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)

# Definir a resolução da câmera para 640x480
cap.set(3, 640)
cap.set(4, 480)

# Definir a taxa de quadros para 30fps
cap.set(cv2.CAP_PROP_FPS, 120)

# Definir o formato de vídeo para MJPG
cap.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))



while True:
    # Capturar um frame da webcam
    ret, frame = cap.read()
    
    if not ret:
        break
    
    # Converter o frame de BGR para RGB (OpenCV carrega imagens como BGR)
    frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
    
    # Detectar os rostos no frame
    faces_detectadas = face_recognition.face_locations(frame_rgb)
    
    
    for face in faces_detectadas:
        top, right, bottom, left = face
        rosto = frame_rgb[top:bottom, left:right]
        codificacao_rosto = face_recognition.face_encodings(rosto)
        
        if len(codificacao_rosto) > 0:
            comparacao_vitor = face_recognition.compare_faces([codificacao_vitor], codificacao_rosto[0])[0]
            
            if comparacao_vitor:
                nome = "Vitor"
            else:
                nome = "Desconhecido"
            
            # Desenhar um retângulo ao redor do rosto detectado
            cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0), 2)
            # Escrever o nome da pessoa reconhecida
            cv2.putText(frame, nome, (left, top - 10), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 255, 0), 2)

    # Mostrar o frame resultante
    cv2.imshow('Reconhecimento Facial', frame)
    
    # Pressione 'q' para sair do loop
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Liberar os recursos
cap.release()
cv2.destroyAllWindows()
