drop schema if exists projetobd;
create schema projetobd;
use projetobd;
CREATE TABLE Faixa_Etaria (
    idade VARCHAR(30) PRIMARY KEY
);
CREATE TABLE obra (
    codigo INTEGER PRIMARY KEY,
    titulo VARCHAR(30),
    sinopse VARCHAR(300),
    Faixa_Etaria_idade VARCHAR(30) NOT NULL,
    data_lancamento DATE,
    FOREIGN KEY (Faixa_Etaria_idade)
        REFERENCES Faixa_Etaria (idade)
);
CREATE TABLE genero (
    nome VARCHAR(20) PRIMARY KEY
);
CREATE TABLE genero_obra (
    genero_nome VARCHAR(20),
    obra_codigo INTEGER,
    PRIMARY KEY (genero_NOME , obra_codigo),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo),
    FOREIGN KEY (genero_NOME)
        REFERENCES genero (nome)
);
CREATE TABLE filme (
    obra_codigo INTEGER NOT NULL,
    trailer VARCHAR(300),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE serie (
    stattus VARCHAR(100),
    obra_codigo INTEGER PRIMARY KEY,
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE temporada (
    numero INTEGER,
    n_episodios INTEGER,
    trailer VARCHAR(300),
    serie_codigo INTEGER,
    CONSTRAINT temporada_key PRIMARY KEY (numero , serie_codigo),
    FOREIGN KEY (serie_codigo)
        REFERENCES serie (obra_codigo)
);
CREATE TABLE episodio (
    nome VARCHAR(100),
    numero INTEGER,
    sinopse VARCHAR(200),
    CONSTRAINT episodio_key PRIMARY KEY (nome , numero),
    temporada_numero INTEGER NOT NULL,
    FOREIGN KEY (temporada_numero)
        REFERENCES temporada (numero)
);
CREATE TABLE usuario (
    id INTEGER PRIMARY KEY,
    nome VARCHAR(30),
    senha VARCHAR(20),
    email VARCHAR(50) UNIQUE
);
CREATE TABLE administrador (
    usuario_id INTEGER NOT NULL,
    codigo INTEGER NOT NULL,
    PRIMARY KEY (usuario_id , codigo),
    FOREIGN KEY (usuario_id)
        REFERENCES usuario (id)
);
CREATE TABLE assistiu (
    usuario_id INTEGER NOT NULL,
    obra_codigo INTEGER NOT NULL,
    datta DATETIME,
    PRIMARY KEY (usuario_id , obra_codigo , datta),
    FOREIGN KEY (usuario_id)
        REFERENCES usuario (id),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE deseja_assistir (
    usuario_id INTEGER NOT NULL,
    obra_codigo INTEGER NOT NULL,
    datta DATETIME,
    PRIMARY KEY (usuario_id , obra_codigo , datta),
    FOREIGN KEY (usuario_id)
        REFERENCES usuario (id),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE favorita (
    usuario_id INTEGER NOT NULL,
    obra_codigo INTEGER NOT NULL,
    PRIMARY KEY (usuario_id , obra_codigo),
    FOREIGN KEY (usuario_id)
        REFERENCES usuario (id),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE comentario (
    usuario_id INTEGER NOT NULL,
    obra_codigo INTEGER NOT NULL,
    datta DATETIME NOT NULL,
    texto VARCHAR(300),
    PRIMARY KEY (usuario_id , obra_codigo , datta),
    FOREIGN KEY (usuario_id)
        REFERENCES usuario (id),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE idioma (
    nome VARCHAR(30),
    sigla_pais VARCHAR(2),
    PRIMARY KEY (nome , sigla_pais),
    obra_codigo INTEGER NOT NULL,
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE legenda (
    nome VARCHAR(30),
    sigla_pais VARCHAR(2),
    PRIMARY KEY (nome , sigla_pais),
    obra_codigo INTEGER NOT NULL,
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE personagem (
    nome VARCHAR(100) PRIMARY KEY
);
CREATE TABLE personagem_obra (
    personagem_nome VARCHAR(100),
    obra_codigo INTEGER NOT NULL,
    PRIMARY KEY (personagem_nome , obra_codigo),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo),
    FOREIGN KEY (personagem_nome)
        REFERENCES personagem (nome)
);
CREATE TABLE ator (
    codigo INTEGER PRIMARY KEY,
    nome VARCHAR(100),
    idade INTEGER,
    sexo VARCHAR(20),
    biografia VARCHAR(300)
);
CREATE TABLE personagem_ator (
    ator_codigo INTEGER,
    personagem_nome VARCHAR(100) NOT NULL,
    PRIMARY KEY (ator_codigo , personagem_nome),
    FOREIGN KEY (personagem_nome)
        REFERENCES personagem (nome),
    FOREIGN KEY (ator_codigo)
        REFERENCES ator (codigo)
);
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
insert into usuario(id,nome,senha,email) values
			(1,'Gabriel','123456','gabriel@abc.com'),
			(2,'Caio','123456','caio@abc.com');
insert into personagem(nome) values 
			('Jon Snow'),
			('Gregor Clegane'),
			('Daenerys Targaryen'),
			('Arya Stark');
insert into faixa_etaria(idade) values
			('Maiores de 17 anos'),
			('Maiores de 18 anos');
insert into obra(codigo,titulo,sinopse,faixa_etaria_idade,data_lancamento) values
			(1,'Game of Trhones','Baseada nos livros de George R.R. Martin, a série mostra duas famílias poderosas disputando um jogo mortal pelo controle dos Sete Reinos de Westeros para assumir o Trono de Ferro','Maiores de 17 anos',STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ));
insert into personagem_obra(personagem_nome,obra_codigo) values
			('Jon Snow',1),
			('Gregor Clegane',1),
			('Daenerys Targaryen',1),
			('Arya Stark',1);