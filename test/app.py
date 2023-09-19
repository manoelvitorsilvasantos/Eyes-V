import cv2

# Carregar o classificador em cascata pré-treinado
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Capturar vídeo da webcam usando o backend DirectShow
cap = cv2.VideoCapture(0, cv2.CAP_DSHOW)

# Definir a resolução da câmera para 640x480
cap.set(cv2.CAP_PROP_FRAME_WIDTH, 640)
cap.set(cv2.CAP_PROP_FRAME_HEIGHT, 480)

# Definir a taxa de quadros para 30fps
cap.set(cv2.CAP_PROP_FPS,30)

# Definir o formato de vídeo para MJPG
cap.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))

# definir configuracoes de legenda
font = cv2.FONT_HERSHEY_SIMPLEX
cor = (0,255,0)
tamanho = 1
espessura = 2

while True:
    # Ler o quadro atual do vídeo
    ret, img = cap.read()

    # Verificar se o quadro foi lido com sucesso
    if not ret:
        print("Não foi possível ler o quadro do vídeo")
        break

    # Converter para escala de cinza
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

    # Detectar faces
    faces = face_cascade.detectMultiScale(gray, 1.1, 4)

    # Desenhar retângulos ao redor das faces e adicionar legenda
    for (x, y, w, h) in faces:
        cv2.rectangle(img, (x, y), (x+w, y+h), cor, espessura)
        cv2.putText(img,'Rosto Detectado.',(x,y-10),font,tamanho,cor,espessura,cv2.LINE_AA)

    cv2.imshow('img', img)

    # Parar se a tecla 'q' for pressionada
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Liberar a captura de vídeo e destruir todas as janelas
cap.release()
cv2.destroyAllWindows()
