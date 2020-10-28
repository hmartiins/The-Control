CREATE DATABASE IF NOT EXISTS thecontrol;

USE thecontrol;

CREATE TABLE produto (
	cd INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(12,2) NOT NULL,
    idioma VARCHAR(60) NOT NULL DEFAULT "Português",
    plataforma VARCHAR(50) NOT NULL,
    multiplayer BOOLEAN DEFAULT false,
    ano_lancamento YEAR,
    desenvolvedor VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    createdAt DATETIME DEFAULT NOW(),

    PRIMARY KEY(cd)
) DEFAULT CHARSET="utf8";

CREATE TABLE categoria(
	cd INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(80) NOT NULL,
    
    PRIMARY KEY(cd)
) DEFAULT CHARSET="utf8";

CREATE TABLE produto_categoria (
	id_produto INT NOT NULL,
    id_categoria INT NOT NULL,
    
    FOREIGN KEY(id_produto) REFERENCES produto(cd),
    FOREIGN KEY(id_categoria) REFERENCES categoria(cd)
) DEFAULT CHARSET="utf8";
