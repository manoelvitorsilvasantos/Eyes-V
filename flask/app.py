from flask import Flask, render_template, request, redirect, url_for, flash
from dao.mysql import DatabaseConnection
import hashlib

app = Flask(__name__)
app.secret_key = 'AD39232631'

db = DatabaseConnection(
    dbname="image_db",
    user="ifba",
    password="ifba6514",
    host="localhost",
    port="3306"
)

salt_key = 'AD39232631'

def hash_password(password):
	salted_password = password
	md5 = hashlib.md5()
	md5.update(salted_password.encode('utf-8'))
	hashed_password = md5.hexdigest()
	return hashed_password

@app.route('/')
def index():
	return 'Bem vindo'

@app.route('/login', methods=['GET', 'POST'])
def login():
	if request.method == 'POST':
		username = request.form['email']
		password = request.form['password']
		db.
		if username == 'mvictordossantos.limite@gmail.com' and password == '65564747':
			return 'Login bem'
	return render_template('index.html')


@app.route('/save')
def save_info():
	return 'Informações foram salvas com sucesso.'

@app.route('/cadastrar', methods=['GET', 'POST'])
def register():
	if request.method == 'POST':
		nome = request.form['nome']
		email = request.form['email']
		celular = request.form['celular']
		senha = request.form['password']
		senha_hashed = hash_password(senha)
		db.login_save(nome, email, celular, senha_hashed)
		print("Informações foram salvas com sucesso.")
		flash('Informações foram salvas com sucesso', 'info')
		db.close_connection()
		return 'Informações foram salvas com sucesso.'
	return render_template('registro.html')


@app.route('/test', methods=['GET', 'POST'])
def test():
	return render_template('test.html')


if __name__ == "__main__":
	app.run(host='0.0.0.0', port=5000, debug=True)