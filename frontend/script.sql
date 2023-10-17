-- DROP DATABASE 
DROP DATABASE image_db;

-- CREATE DATABASE
CREATE DATABASE image_db;

-- USE DATABASE
USE image_db;

-- TABLE usuarios_credencial
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

-- TABLE aluno
CREATE TABLE IF NOT EXISTS aluno(
   id INT NOT NULL,
   nome VARCHAR(32) NOT NULL,
   phone VARCHAR(15) NOT NULL,
   email VARCHAR(150) NOT NULL,
   PRIMARY KEY(id)
);


-- TABLE imagem
CREATE TABLE IF NOT EXISTS imagem(
	id INT NOT NULL AUTO_INCREMENT,
	imagem_aluno LONGBLOB NOT NULL,
	id_aluno INT NOT NULL,
	FOREIGN KEY(id_aluno) REFERENCES aluno(id),
	PRIMARY KEY(id)
);


-- INSERT ALUNO REGISTER
INSERT INTO aluno(id, nome, phone, email)
VALUES(1, 'test', '5599999999999', 'test@email.com');

-- INSERT usuarios_credencial REGISTER
INSERT INTO usuarios_credencial(nome, email, usuario, senha, tipo, data)
VALUES('administrador', 'administrador@admin.com', 'admin', MD5('admin'), '1', CURDATE());

