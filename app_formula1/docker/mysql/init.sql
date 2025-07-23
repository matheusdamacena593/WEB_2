SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

DROP TABLE IF EXISTS tb_noticias;

CREATE TABLE tb_noticias (
  id SERIAL PRIMARY KEY,
  titulo VARCHAR(100),
  descricao TEXT,
  url VARCHAR(255),
  data DATE,
  autor VARCHAR(100) DEFAULT NULL
);

DROP TABLE IF EXISTS tb_usuarios;

CREATE TABLE tb_usuarios (
  id SERIAL PRIMARY KEY,
  usuario VARCHAR(50),
  senha VARCHAR(50)
);

INSERT INTO tb_usuarios(id, usuario, senha) VALUES (1,'matheus','admin');

DROP TABLE IF EXISTS tb_equipes;

CREATE TABLE tb_equipes (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(50),
  formotor VARCHAR(50),
  nacionalidade VARCHAR(50),
  url VARCHAR(255),
  vitorias INT,
  pontos INT
);

DROP TABLE IF EXISTS tb_pilotos;

CREATE TABLE tb_pilotos (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(50),
  vitorias INT,
  pontos INT,
  nacionalidade VARCHAR(50),
  equipe_id BIGINT UNSIGNED,
  url VARCHAR(255),
  FOREIGN KEY (equipe_id) REFERENCES tb_equipes(id) ON DELETE CASCADE
);

DROP TABLE IF EXISTS tb_corridas;

CREATE TABLE tb_corridas (
  id SERIAL PRIMARY KEY,
  pista VARCHAR(50),
  data DATE,
  local VARCHAR(50),
  url VARCHAR(255)
);
