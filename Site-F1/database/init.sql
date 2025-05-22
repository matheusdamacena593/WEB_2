SET NAMES utf8mb4;
SET CHARACTER SET utf8mb4;

DROP TABLE IF EXISTS tb_noticias;

CREATE TABLE tb_noticias (
  id SERIAL PRIMARY KEY,
  titulo VARCHAR(100),
  descricao TEXT,
  url VARCHAR(50),
  data DATE,
  autor VARCHAR(100) DEFAULT NULL
);

INSERT INTO tb_noticias (id, titulo, descricao, url, data, autor) VALUES 
(10, 'Campeão do Mundo', 'sdadasd', 'imgNoticias/Captura de tela 2025-03-20 114906.png', '2025-05-16', 'damacena');

DROP TABLE IF EXISTS tb_usuarios;

CREATE TABLE tb_usuarios (
  id SERIAL PRIMARY KEY,
  usuario VARCHAR(50),
  senha VARCHAR(50)
);

INSERT INTO tb_usuarios(id, usuario, senha) VALUES (1,'matheus','ifg');

DROP TABLE IF EXISTS tb_equipes;

CREATE TABLE tb_equipes (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(50),
  formotor VARCHAR(50),
  nacionalidade VARCHAR(50)
);

DROP TABLE IF EXISTS tb_pilotos;

CREATE TABLE tb_pilotos (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(50),
  vitorias INT,
  pontos INT,
  nacionalidade VARCHAR(50),
  equipe_id BIGINT UNSIGNED,
  url VARCHAR(50),
  FOREIGN KEY (equipe_id) REFERENCES tb_equipes(id) ON DELETE CASCADE
);
