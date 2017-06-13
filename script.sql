drop schema if exists MyHobbie;
create schema MyHobbie;
use MyHobbie;
CREATE TABLE Faixa_Etaria (
    idade VARCHAR(100) PRIMARY KEY
);
CREATE TABLE obra (
    titulo VARCHAR(100),
    sinopse VARCHAR(1000),
    foto VARCHAR(1000),
    Faixa_Etaria_idade VARCHAR(100) NOT NULL,
    data_lancamento DATE,
    data_adicionado DATE,
    hora_adicionado TIME,
    primary key(titulo,data_lancamento),
    FOREIGN KEY (Faixa_Etaria_idade)
        REFERENCES Faixa_Etaria (idade)
);
CREATE TABLE genero (
    nome VARCHAR(100) PRIMARY KEY
);
CREATE TABLE genero_obra (
    genero_nome VARCHAR(100),
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (genero_NOME , obra_titulo,obra_data),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento),
    FOREIGN KEY (genero_NOME)
        REFERENCES genero (nome)
);
CREATE TABLE filme (
    trailer VARCHAR(1000),
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento)
        ON DELETE CASCADE
);
CREATE TABLE serie (
    stattus VARCHAR(100),
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento)
        ON DELETE CASCADE
);
CREATE TABLE temporada (
	trailer VARCHAR(1000),
    foto VARCHAR(1000),
    numero INTEGER,
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data,numero),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES serie (obra_titulo,obra_data)
        ON DELETE CASCADE
);
CREATE TABLE episodio (
    nome VARCHAR(100),
    numero INTEGER,
    sinopse VARCHAR(1000),
    video VARCHAR(1000),
    foto VARCHAR(1000),
    datta date,
    obra_titulo varchar(100),
    data_adicionado DATETIME DEFAULT CURRENT_TIMESTAMP,
    obra_data DATE,
    temporada_numero integer,
    PRIMARY KEY (obra_titulo,obra_data,temporada_numero,numero),
    FOREIGN KEY (obra_titulo,obra_data,temporada_numero)
        REFERENCES temporada (obra_titulo,obra_data,numero)
        ON DELETE CASCADE
);
CREATE TABLE usuario (
    login VARCHAR(100),
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    senha VARCHAR(100) NOT NULL,
    foto VARCHAR(1000),
    datta DATE NOT NULL,
    hora TIME NOT NULL,
    ip VARCHAR(50) NOT NULL,
    PRIMARY KEY (login)    
);
CREATE TABLE administrador (
    usuario_login VARCHAR(100) NOT NULL,
    PRIMARY KEY (usuario_login),
    FOREIGN KEY (usuario_login)
        REFERENCES usuario (login) ON UPDATE CASCADE
);
CREATE TABLE assistiu (
    usuario_login VARCHAR(100),
    datta DATETIME,
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data,usuario_login),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento),
	FOREIGN KEY (usuario_login)
        REFERENCES usuario (login)  ON UPDATE CASCADE
);
CREATE TABLE deseja_assistir (
    usuario_login VARCHAR(100) NOT NULL,
    datta DATETIME,
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data,usuario_login,datta),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento),
	FOREIGN KEY (usuario_login)
        REFERENCES usuario (login)  ON UPDATE CASCADE
);
CREATE TABLE favorita (
    usuario_login VARCHAR(100),
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data,usuario_login),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento),
	FOREIGN KEY (usuario_login)
        REFERENCES usuario (login)  ON UPDATE CASCADE
);
CREATE TABLE comentario (
    texto VARCHAR(1000),
    usuario_login VARCHAR(100) NOT NULL,
    datta DATETIME DEFAULT CURRENT_TIMESTAMP,
    obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data,usuario_login,datta),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento),
	FOREIGN KEY (usuario_login)
        REFERENCES usuario (login)  ON UPDATE CASCADE
);
CREATE TABLE personagem (
    nome VARCHAR(100) PRIMARY KEY,
    foto VARCHAR(1000)
);
CREATE TABLE personagem_obra (
    personagem_nome VARCHAR(100),
	obra_titulo varchar(100),
    obra_data DATE,
    PRIMARY KEY (obra_titulo,obra_data,personagem_nome),
    FOREIGN KEY (obra_titulo,obra_data)
        REFERENCES obra (titulo,data_lancamento),
	FOREIGN KEY (personagem_nome)
        REFERENCES personagem (nome)
);
CREATE TABLE ator (
    codigo INTEGER PRIMARY KEY,
    nome VARCHAR(100),
    idade INTEGER,
    foto VARCHAR(1000),
    sexo VARCHAR(100),
    biografia VARCHAR(1000)
);
CREATE TABLE personagem_ator (
    ator_codigo INTEGER,
    personagem_nome VARCHAR(100),
    PRIMARY KEY (ator_codigo , personagem_nome),
    FOREIGN KEY (personagem_nome)
        REFERENCES personagem (nome),
    FOREIGN KEY (ator_codigo)
        REFERENCES ator (codigo)
);

insert into faixa_etaria values
("Livre"),("+12"),("+14"),("+16"),("+18");
insert into genero(nome) values 
			('acao'),
			('animacao'),
			('aventura'),
			('comedia'),
			('drama'),
			('terror'),
			('suspense'),
			('misterio'),
			('fantasia');
