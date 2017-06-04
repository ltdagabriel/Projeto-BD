drop schema if exists projetobd;
create schema projetobd;
use projetobd;
CREATE TABLE Faixa_Etaria (
    idade VARCHAR(30) PRIMARY KEY
);
CREATE TABLE obra (
    codigo INTEGER PRIMARY KEY,
    titulo VARCHAR(30),
    sinopse VARCHAR(1000),
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
    trailer VARCHAR(1000),
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
    trailer VARCHAR(1000),
    serie_codigo INTEGER,
    CONSTRAINT temporada_key PRIMARY KEY (numero , serie_codigo),
    FOREIGN KEY (serie_codigo)
        REFERENCES serie (obra_codigo)
);
CREATE TABLE episodio (
    nome VARCHAR(100),
    numero INTEGER,
    sinopse VARCHAR(1000),
    datta date,
    CONSTRAINT episodio_key PRIMARY KEY (numero,temporada_numero,temporada_codigo),
    temporada_numero INTEGER NOT NULL,
	temporada_codigo integer,
    FOREIGN KEY (temporada_codigo,temporada_numero)
        REFERENCES temporada (serie_codigo,numero)
);
CREATE TABLE usuario (
    login VARCHAR(30) PRIMARY KEY,
    nome VARCHAR(30),
    senha VARCHAR(20),
    email VARCHAR(50) UNIQUE
);
CREATE TABLE administrador (
    usuario_login VARCHAR(30) NOT NULL,
    codigo INTEGER NOT NULL,
    PRIMARY KEY (usuario_login , codigo),
    FOREIGN KEY (usuario_login)
        REFERENCES usuario (login)
);
CREATE TABLE assistiu (
    usuario_login VARCHAR(30) NOT NULL,
    obra_codigo INTEGER NOT NULL,
    datta DATETIME,
    PRIMARY KEY (usuario_login , obra_codigo , datta),
    FOREIGN KEY (usuario_login)
        REFERENCES usuario (login),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE deseja_assistir (
    usuario_login VARCHAR(30) NOT NULL,
    obra_codigo INTEGER NOT NULL,
    datta DATETIME,
    PRIMARY KEY (usuario_login , obra_codigo , datta),
    FOREIGN KEY (usuario_login)
        REFERENCES usuario (login),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE favorita (
    usuario_login VARCHAR(30) NOT NULL,
    obra_codigo INTEGER NOT NULL,
    PRIMARY KEY (usuario_login , obra_codigo),
    FOREIGN KEY (usuario_login)
        REFERENCES usuario (login),
    FOREIGN KEY (obra_codigo)
        REFERENCES obra (codigo)
);
CREATE TABLE comentario (
	usuario_login VARCHAR(30) NOT NULL,
    obra_codigo INTEGER NOT NULL,
    datta DATETIME NOT NULL,
    texto VARCHAR(1000),
    PRIMARY KEY (usuario_login , obra_codigo , datta),
    FOREIGN KEY (usuario_login)
        REFERENCES usuario (login),
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
    biografia VARCHAR(1000)
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
insert into usuario(login,nome,senha,email) values
			('1','Gabriel','123456','gabriel@abc.com'),
			('2','Caio','123456','caio@abc.com'),
			('3','adm','adm','adm@adm.com');
insert into administrador values
			(3,1);
insert into personagem(nome) values 
			('Jon Snow'),
			('Gregor Clegane'),
			('Daenerys Targaryen'),
			('Arya Stark'),
			('Sansa Stark');
insert into faixa_etaria(idade) values
			('Livre'),
			('Maiores de 14 anos'),
			('Maiores de 17 anos'),
			('Maiores de 18 anos');
insert into obra(codigo,titulo,sinopse,faixa_etaria_idade,data_lancamento) values
			(1,'Game of Thrones','Baseada nos livros de George R.R. Martin, a série mostra duas famílias poderosas disputando um jogo mortal pelo controle dos Sete Reinos de Westeros para assumir o Trono de Ferro','Maiores de 17 anos',STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
			(2,'Moana','Uma jovem decide velejar através do Oceano Pacífico, com a ajuda de um semi-deus, em uma viagem que pode mudar a vida de todos.','livre',STR_TO_DATE( "05/01/2017", "%d/%m/%Y" )),
			(3,'Van Helsing',' A narrativa é protagonizada por Vanessa que, cinco anos após sua morte, Assim, Vanessa Van Helsing se torna a última esperança da humanidade para recuperar o mundo destes sanguinários seres.','Maiores de 14 anos',STR_TO_DATE( "23/09/2016", "%d/%m/%Y" ));			
insert into genero_obra(genero_nome,obra_codigo) values
			('drama',1),
            ('acao',1),
			('fantasia',1);
insert into personagem_obra(personagem_nome,obra_codigo) values
			('Jon Snow',1),
			('Gregor Clegane',1),
			('Daenerys Targaryen',1),
			('Arya Stark',1),
			('Sansa Stark',1);
insert into serie(stattus,obra_codigo) values
			('Incompleto',1),
			('Renovada',3);
insert into temporada(numero,serie_codigo) values
			(1,1),
			(2,1),
			(1,3);
insert into episodio(numero,datta,temporada_numero,temporada_codigo) values
			(1,STR_TO_DATE( "31/07/2016", "%d/%m/%Y" ),1,3),
			(2,STR_TO_DATE( "23/09/2016", "%d/%m/%Y" ),1,3),
			(3,STR_TO_DATE( "30/09/2016", "%d/%m/%Y" ),1,3),
			(4,STR_TO_DATE( "7/10/2016", "%d/%m/%Y" ),1,3),
			(5,STR_TO_DATE( "14/10/2016", "%d/%m/%Y" ),1,3),
			(6,STR_TO_DATE( "21/10/2016", "%d/%m/%Y" ),1,3),
			(7,STR_TO_DATE( "28/10/2016", "%d/%m/%Y" ),1,3),
			(8,STR_TO_DATE( "4/11/2016", "%d/%m/%Y" ),1,3),
			(9,STR_TO_DATE( "11/11/2016", "%d/%m/%Y" ),1,3),
			(10,STR_TO_DATE( "18/11/2016", "%d/%m/%Y" ),1,3),
			(11,STR_TO_DATE( "25/11/2016", "%d/%m/%Y" ),1,3),
			(12,STR_TO_DATE( "2/12/2016", "%d/%m/%Y" ),1,3),
			(13,STR_TO_DATE( "9/12/2016", "%d/%m/%Y" ),1,3);
insert into episodio(nome,numero,datta,temporada_numero,temporada_codigo) values
			('Winter Is Coming',1,STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ),1,1),
			('The Kingsroad',2,STR_TO_DATE( "24/04/2011", "%d/%m/%Y" ),1,1),
			('Lord Snow',3,STR_TO_DATE( "1/05/2011", "%d/%m/%Y" ),1,1),
			('Cripples, Bastards, and Broken Things',4,STR_TO_DATE( "8/05/2011", "%d/%m/%Y" ),1,1),
			('The North Remembers',1,STR_TO_DATE( "1/04/2012", "%d/%m/%Y" ),2,1),
			('The Night Lands',2,STR_TO_DATE( "08/04/2012", "%d/%m/%Y" ),2,1),
			('What Is Dead May Never Die',3,STR_TO_DATE( "15/04/2012", "%d/%m/%Y" ),2,1),
			('Garden of Bones',4,STR_TO_DATE( "22/04/2012", "%d/%m/%Y" ),2,1);

insert into ator(codigo, nome, idade, sexo, biografia) values
			(001, 'Emilia Clarke', 31, 'feminino', 'Emilia Isabelle Euphemia Rose Clarke é uma atriz inglesa conhecida pela sua interpretação da personagem Daenerys Targaryen na série de televisão Game of Thrones, da HBO.'),
			(002, 'Sophie Turner', 21, 'feminino', 'Sophie Turner é uma atriz britânica, mais conhecida por interpretar Sansa Stark na série de televisão Game of Thrones.'),
			(003, 'Kit Harington', 31, 'masculino', 'Christopher Catesby "Kit" Harington é um ator inglês de televisão, teatro e cinema. Mais conhecido por interpretar Jon Snow, um dos protagonistas da série Game Of Thrones transmitida desde 2011 pela emissora norte-americana HBO.');
			
insert into personagem_ator(ator_codigo, personagem_nome) values
			(001, 'Daenerys Targaryen'),
			(002, 'Sansa Stark'),
			(003, 'Jon Snow');
insert into filme(obra_codigo) values
			(2);

insert into comentario(usuario_login,obra_codigo, datta, texto) values
			('2', 2, STR_TO_DATE( "31/05/2017-13:20:13", "%d/%m/%Y-%T" ), 'Moana eh muito legal!'),
			('2', 2, STR_TO_DATE( "31/05/2017-13:20:50", "%d/%m/%Y-%T" ), 'Brincadeira eu só gostei das musicas q!'),
			('1', 2, STR_TO_DATE( "31/05/2017-21:00:50", "%d/%m/%Y-%T" ), 'Tenho que assistir!');

insert into assistiu (usuario_login, obra_codigo, datta) values
			('2', 2, STR_TO_DATE( "7/01/2017", "%d/%m/%Y" ));
-- Series            
select O.titulo as 'Titulo',
	DATE_FORMAT( O.data_lancamento, "%d/%m/%Y" ) as 'Data de Lancamento',
    (select count(*) from temporada T where T.serie_codigo=S.obra_codigo) as 'Numero de Temporada',
    S.stattus as 'Status'
From obra O,serie S
where O.codigo=S.obra_codigo;

-- Filmes
select O.titulo as 'Titulo',
	DATE_FORMAT( O.data_lancamento, "%d/%m/%Y" ) as 'Data de Lancamento'
From obra O,filme F
where O.codigo=F.obra_codigo;
/*login
-- Quem Assistiu Moana
select U.nome
from usuario U,obra O,assistiu A 
where O.codigo=A.obra_codigo and
	A.usuario_login=U.id and
    O.titulo='Moana';
-- comentarios de Moana
select U.nome, C.texto, DATE_FORMAT( C.datta, "%d/%m/%Y" ) as 'Data'
from usuario U,obra O,comentario C 
where O.codigo=C.obra_codigo and
	C.usuario_login=U.id and
    O.titulo='Moana'
order by C.datta desc;*/
select * from episodio;