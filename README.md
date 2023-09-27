# projeto-inovacao-ifba
## Projeto Inovação 

Components:
1. Felipe
2. Igor
3. Italo
4. Manoel Vitor
5. Matheus
6. Prof. Paulo
7. Sheory

## How to clone This Repository

To clone this repository to your local machine, follow the steps bellow:

1. Open the terminal
2. Navigate to the directory where you want to clone  the repository.
3. Execute command to clone the repository

```bash
cd C:/users/{your_username}/Documents/
git clone https://github.com/pauloperris/projeto-inovacao-ifba.git
cd C:/users/{your_username}/Documents/projeto-inovacao-ifba
```

## How to install dependences
1. Open the terminal
2. Navigate to the directory where are to save the repository.
3. Intro you will to execute  command

```bash
cd C:/users/{your_username}/Documents/projeto-inovacao-ifba
pip install -r requirements.txt
```

## How to fix error with library dlib
1. Open the terminal
2. Navigate to the directory where are to clone the repository.
3. Execute command to install library
```bash
cd C:/users/{your_username}/Documents/projeto-inovacao-ifba
pip install dlib-19.19.0-cp38-cp38-win_amd64.whl
```

## How to create database

1. Open the terminal
2. Execute to command
3. Type to your password

```bash
mysql -u {username} -p
```
Now we will execute query to create the database
```sql
CREATE DATABASE image_db;
```
Now we will execute query to create us the table

```sql
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
```

```sql
CREATE TABLE IF NOT EXISTS image(
   id INT NOT NULL AUTO_INCREMENT,
   imagem_aluno LONGBLOB NOT NULL,
   id_aluno INT NOT NULL,
   FOREIGN KEY(id) REFERENCES aluno(id),
   PRIMARY KEY(id)
);
```

```sql
CREATE TABLE IF NOT EXISTS aluno(
   id INT NOT NULL,
   nome VARCHAR(32) NOT NULL,
   phone VARCHAR(15) NOT NULL,
   email VARCHAR(150) NOT NULL,
   PRIMARY KEY(id)
);
```
```sql
INSERT INTO aluno(id, nome, phone, email)
VALUES(1, 'Manoel Vitor', '<your_number>', '<your_email>');
```
```sql
INSERT INTO usuarios_credencial(nome, email, usuario, senha, tipo, data)
VALUES('administrador', '<your_email>', 'admin', MD5('admin'), '1', CURDATE());
```
Please, Look to mysql.py file and writer your credencial to connect database any difficulty.

Example:


```python
# library that you will to use
from dao.mysql import DatabaseConnect
# instance that you will to create.
db = DatabaseConnect(
  "image_db", # Database name
  "root", # User to database
  "root", # Password to database
  "localhost", # host name or IP
  "3306" # port number, by default mysql to use the port 3306
)
```
