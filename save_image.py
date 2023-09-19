import cv2
from dao.mysql import DatabaseConnection
import os

# Crie uma instância da classe DatabaseConnection
db = DatabaseConnection(
    dbname="image_db",
    user="mvictor",
    password="admin",
    host="localhost",
    port="3306"
)

# Inicialize a câmera (webcam)
camera = cv2.VideoCapture(0, cv2.CAP_DSHOW)
# Definir a resolução da câmera para 640x480
camera.set(cv2.CAP_PROP_FRAME_WIDTH, 640)
camera.set(cv2.CAP_PROP_FRAME_HEIGHT, 480)

# Definir a taxa de quadros para 30fps
camera.set(cv2.CAP_PROP_FPS, 120)

# Definir o formato de vídeo para MJPG
camera.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))

while True:
    # Capture um frame da webcam
    ret, frame = camera.read()

    # Exiba o frame na janela
    cv2.imshow("Webcam", frame)

    # Capture uma tecla pressionada
    key = cv2.waitKey(1)

    # Se a tecla "q" for pressionada, saia do loop
    if key == ord("q"):
        break

    # Se a tecla "s" for pressionada, salve a imagem no banco de dados
    if key == ord("s"):
        name = input("Digite o nome da pessoa: ")
        phone = input("Digite o telefone da pessoa: ")
        email = input("Digite o email da pessoa: ")

        # Defina o nome do arquivo de imagem a ser salvo
        image_path = "captured_image.jpg"
        print("Image salva: ", image_path)

        # Salve a imagem no arquivo
        cv2.imwrite(image_path, frame)

        
        with open(image_path, "rb") as image_file:
            image_binary = image_file.read()

        db.save_image(name, image_binary, phone, email)
        print("Imagem e informações salvas no banco de dados!")
        db.close_connection()

# Libere os recursos
camera.release()
cv2.destroyAllWindows()

