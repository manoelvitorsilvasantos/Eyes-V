import sqlite3

class SQLiteDAO:
    def __init__(self, db_name="db_config.db"):
        self.db_name = db_name
        self.conn = None
        self.cursor = None

    def connect(self):
        try:
            self.conn = sqlite3.connect(self.db_name)
            self.cursor = self.conn.cursor()
            #self.create_credencial_table()  # Chama o método para criar a tabela se não existir
            print(f"Conexão com o banco de dados '{self.db_name}' estabelecida.")
        except sqlite3.Error as e:
            print(f"Erro ao conectar ao banco de dados: {e}")

    def disconnect(self):
        if self.conn:
            self.conn.close()
            print(f"Conexão com o banco de dados '{self.db_name}' fechada.")

    def create_credencial_table(self):
        try:
            query = """
                CREATE TABLE IF NOT EXISTS credencial (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    dbname TEXT,
                    user TEXT,
                    password TEXT,
                    host TEXT,
                    port INTEGER
                )
            """
            self.cursor.execute(query)
            self.conn.commit()
            print("Tabela 'credencial' criada ou já existente.")
        except sqlite3.Error as e:
            print(f"Erro ao criar tabela 'credencial': {e}")

    def insert_credencial(self, dbname, user, password, host, port):
        try:
            query = """
                INSERT INTO credencial (dbname, user, password, host, port)
                VALUES (?, ?, ?, ?, ?)
            """
            values = (dbname, user, password, host, port)
            self.cursor.execute(query, values)
            self.conn.commit()
            print("Credencial inserida com sucesso.")
        except sqlite3.Error as e:
            print(f"Erro ao inserir credencial: {e}")

    def get_all_credenciais(self):
        try:
            query = "SELECT * FROM credencial"
            self.cursor.execute(query)
            return self.cursor.fetchall()
        except sqlite3.Error as e:
            print(f"Erro ao obter todas as credenciais: {e}")
            return []
    def get_credencial_one(self):
    	try:
    		query = "SELECT * FROM credencial LIMIT 1"
    		self.cursor.execute(query)
    		return self.cursor.fetchone()
    	except sqlite3.Error as e:
    		print(f"Erro ao obter credencial: {e}")
    		return None

    def get_credencial_by_id(self, credencial_id):
        try:
            query = "SELECT * FROM credencial WHERE id = ?"
            self.cursor.execute(query, (credencial_id,))
            return self.cursor.fetchone()
        except sqlite3.Error as e:
            print(f"Erro ao obter credencial por ID: {e}")
            return None

    def update_credencial(self, credencial_id, dbname, user, password, host, port):
        try:
            query = """
                UPDATE credencial
                SET dbname = ?, user = ?, password = ?, host = ?, port = ?
                WHERE id = ?
            """
            values = (dbname, user, password, host, port, credencial_id)
            self.cursor.execute(query, values)
            self.conn.commit()
            print("Credencial atualizada com sucesso.")
        except sqlite3.Error as e:
            print(f"Erro ao atualizar credencial: {e}")

    def delete_credencial(self, credencial_id):
        try:
            query = "DELETE FROM credencial WHERE id = ?"
            self.cursor.execute(query, (credencial_id,))
            self.conn.commit()
            print("Credencial excluída com sucesso.")
        except sqlite3.Error as e:
            print(f"Erro ao excluir credencial: {e}")

