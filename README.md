<<<<<<< HEAD
# Eyes-V
## Projeto Inovação 
=======
# Eyes-V Project - Verena Eyes v1.0.0
>>>>>>> 4fcc5e8d07ac500a76c17901984137c47a697c01

Equip development:
* [Felipe](https://github.com/Felipegdecastro)
* [Igor](https://github.com/igorttosta)
* [Italo](https://github.com/Itaperam)
* [Manoel Vitor](https://github.com/manoelvitorsilvasantos)
* [Matheus Lima](https://github.com/limabarreto)
* [Prof. Paulo Perris](https://github.com/pauloperris)
* [Sheory Martins](https://github.com/sheory)

## How to clone This Repository

To clone this repository to your local machine, follow the steps bellow:

1. Open the terminal
2. Navigate to the directory where you want to clone  the repository.
3. Execute command to clone the repository

```bash
cd C:/users/{your_username}/Documents/
<<<<<<< HEAD
git clone https://github.com/manoelvitorsilvasantos/Eyes-V.git
cd C:/users/{your_username}/Documents/Eyes-V
=======
git clone https://github.com/manoelvitorsilvasantos/Eyes-V
cd C:/users/{your_username}/Documents/Eyes-V
>>>>>>> 4fcc5e8d07ac500a76c17901984137c47a697c01
```

## How to install dependences (dlib)
1. Open the terminal
2. Navigate to the directory where are to save the repository.
3. Intro you will to execute  command

```bash
cd C:/users/{your_username}/Documents/Eyes-V
pip install -r requirements.txt
```

# If you are  using python 3.11, please create a virtual environment.
1. Make a virtual environment yourself.
```bash
python3 -m venv venv
```
2. Active your virtual environment.
```bash
source venv/bin/activate
```
3. Try to install dependeces.
```bash
pip install -r requirements
```
4. Disabling virtual environment
```bash
deactivate
```
## How to fix error with library dlib
1. Open the terminal
2. Navigate to the directory where are to clone the repository.
3. Execute command to install library
```bash
cd C:/users/{your_username}/Documents/Eyes-V
pip install dlib-19.19.0-cp38-cp38-win_amd64.whl
```
A video tutorial on how to solve a problem with dlib.
[Click Here](https://www.youtube.com/watch?v=d0pMd-MLqtc)

Visual studio for windows is recommended for installation
[Click Here](https://visualstudio.microsoft.com/pt-br/downloads/)

## How to create database using mysql terminal CMD or Shell

1. Open the terminal
2. Execute to command
3. Type to your password

I recommend you to use xampp in this project.
[Xampp](https://www.apachefriends.org/download.html)

```bash
mysql -u root -p
```
After execute it.
```bash
CREATE USER 'ifba'@'localhost' IDENTIFIED BY 'ifba6514';
GRANT ALL PRIVILEGES ON *.* TO 'ifba'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```
Now we will execute query to create the database
```sql
-- drop database exist
DROP DATABASE image_db;
-- create database image_db
CREATE DATABASE image_db;
-- use database
USE image_db;
-- create table usuario_credencial if not exist 
CREATE TABLE IF NOT EXISTS usuarios_credencial(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	usuario VARCHAR(32) NOT NULL,
	senha VARCHAR(255) NOT NULL,
	tipo CHAR(1) NOT NULL,
	data DATE,
	PRIMARY KEY(id)
);
-- create table aluno if not exist
CREATE TABLE IF NOT EXISTS aluno(
   id INT NOT NULL,
   nome VARCHAR(32) NOT NULL,
   phone VARCHAR(15) NOT NULL,
   email VARCHAR(150) NOT NULL,
   PRIMARY KEY(id)
);
-- create table imagem if not exist
CREATE TABLE IF NOT EXISTS imagem(
	id INT NOT NULL AUTO_INCREMENT,
	imagem_aluno LONGBLOB NOT NULL,
	id_aluno INT NOT NULL,
	FOREIGN KEY(id_aluno) REFERENCES aluno(id),
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS logs( 
	id INT NOT NULL AUTO_INCREMENT, 
   frequencia INT NOT NULL,
	dt DATE, 
	id_aluno INT NOT NULL, 
	FOREIGN KEY(id_aluno) REFERENCES aluno(id), 
	PRIMARY KEY(id) 
);

-- insert intro table aluno register begin
INSERT INTO aluno(id, nome, phone, email)
VALUES(1, 'test', '5599999999999', 'test@email.com');
-- insert intro table usuario_credencial register begin
INSERT INTO usuarios_credencial(nome, email, usuario, senha, tipo, data)
VALUES('administrador', 'administrador@admin.com', 'admin', MD5('admin'), '1', CURDATE());

```
## How you'll to use class DatabaseConnect.py from connect database mysql.
Please, Look to mysql.py file and writer your credencial to connect database any difficulty.

Example:

```python
# library that you will to use
from dao.mysql import DatabaseConnect
# instance that you will to create.
db = DatabaseConnect(
  "image_db", # Database name
  "ifba", # User to database
  "ifba6514", # Password to database
  "localhost", # host name or IP
  "3306" # port number, by default mysql to use the port 3306
)
```

## QRCODE APP 
You must read qrcode when open whatsapp type in the chat: join arm-tree
<p align="center">
	<img src="https://raw.githubusercontent.com/manoelvitorsilvasantos/Eyes-V/main/frontend/assets/img/qrcode.png" width="128">
</p>

<div align="center">
	<a href="https://wa.me/14155238886?text=join+arm-tree">Link Acesso</a>
</div>