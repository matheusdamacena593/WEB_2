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