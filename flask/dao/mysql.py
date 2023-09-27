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
    def login_user(self, email, password):
        try:
            with self.connection.cursor() as cursor:
                select_query = f"SELECT * FROM admins WHERE email = %s AND senha = %s"
                cursor.execute(select_query, (email, password))
                result =  cursor.fetchone()
                if result:
                    return result
                return None
        except Exception as e:
            print("Error:", e)
            raise
    def login_save(self, nome, email, celular, senha):
        try:
            with self.connection.cursor() as cursor:
                insert_query = ("INSERT INTO admins"
                                "(nome, email, celular, senha) "
                                "VALUES (%s, %s, %s, %s)")
                cursor.execute(insert_query, (nome, email, celular, senha))
                self.connection.commit()
                print("Save with sucessfully.")
        except Exception as e:
            print("Error:", e)

    def close_connection(self):
        self.connection.close()
        print("Connection closed.")
