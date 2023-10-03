import mysql.connector

class DatabaseConnection:
    def __init__(self, dbname, user, password, host, port):
        self.dbname = dbname
        self.user = user
        self.password = password
        self.host = host
        self.port = port
        self.connection = self._connect()

    # connect with database
    def _connect(self):
        try:
            connection = mysql.connector.connect(
                database=self.dbname,
                user=self.user,
                password=self.password,
                host=self.host,
                port=self.port
            )
            return connection
        except Exception as e:
            print("Error:", e)
            return None
    # save image in database
    def save_image(self, nome, image, phone, email):
        try:
            with self.connection.cursor() as cursor:
                insert_query = ("INSERT INTO image_table "
                               "(nome_pessoa, image_pessoa, phone_pessoa, email_pessoa) "
                               "VALUES (%s, %s, %s, %s)")
                cursor.execute(insert_query, (nome, image, phone, email))
                self.connection.commit()
                print("Image saved successfully.")
        except Exception as e:
            print("Error:", e)

    def get_all(self):
        try:
            with self.connection.cursor() as cursor:
                select_query = "SELECT a.id, a.nome, a.phone, a.email, i.imagem_aluno FROM aluno a JOIN imagem i ON i.id_aluno = a.id"
                cursor.execute(select_query)
                records = cursor.fetchall()
                return records
        except Exception as e:
            print("Error:", e)

    def get_all_records(self):
        try:
            with self.connection.cursor() as cursor:
                select_query = "SELECT * FROM image_table"
                cursor.execute(select_query)
                records = cursor.fetchall()
                return records
        except Exception as e:
            print("Error:", e)

    def close_connection(self):
        self.connection.close()
        print("Connection closed.")
