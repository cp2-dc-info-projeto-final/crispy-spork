DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
sobrenome VARCHAR(30) NOT NULL,
email VARCHAR(50),
data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO usuario(nome,sobrenome,email) VALUES ('Ygor','Canalli','ygor.canalli@gmail.com');