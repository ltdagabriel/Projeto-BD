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
	user_view varchar(5),
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
			
insert into usuario values
			('caionakai','Caio','caio@teste.com','123','', STR_TO_DATE( "05/01/2017", "%d/%m/%Y" ),01010,'01'),
			('gabriel','Gabriel','gabriel@teste.com','123','', STR_TO_DATE( "05/01/2017", "%d/%m/%Y" ),010101,'01');

insert into obra values
			('Game of Thrones','Baseada nos livros de George R.R. Martin, a série mostra duas famílias poderosas disputando um jogo mortal pelo controle dos Sete Reinos de Westeros para assumir o Trono de Ferro','http://segredosdomundo.r7.com/wp-content/uploads/2015/04/1100.jpg','+16',STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 01012001, 010101,'true'),
			('Moana','Uma jovem decide velejar através do Oceano Pacífico, com a ajuda de um semi-deus, em uma viagem que pode mudar a vida de todos.','https://lumiere-a.akamaihd.net/v1/images/moana-fallback_fde4d101.jpeg','Livre',STR_TO_DATE( "05/01/2017", "%d/%m/%Y" ), 01012001, 010101,'true'),
			('Van Helsing',' A narrativa é protagonizada por Vanessa que, cinco anos após sua morte, Assim, Vanessa Van Helsing se torna a última esperança da humanidade para recuperar o mundo destes sanguinários seres.','https://static.omelete.uol.com.br/media/extras/conteudos/vanhelsing01.jpg','+14',STR_TO_DATE( "23/09/2016", "%d/%m/%Y" ), 01012001, 010101,'true');

insert into genero_obra values
			('terror', 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
            ('aventura', 'Moana', STR_TO_DATE( "05/01/2017", "%d/%m/%Y" )),
			('acao', 'Van Helsing', STR_TO_DATE( "23/09/2016", "%d/%m/%Y" ));			
			
insert into personagem values 
			('Jon Snow',''),
			('Gregor Clegane', ''),
			('Daenerys Targaryen', ''),
			('Arya Stark', ''),
			('Sansa Stark', ''),
			('Moana', '');

insert into filme values
			('', 'Moana', STR_TO_DATE( "05/01/2017", "%d/%m/%Y" ));
			
insert into personagem_obra values
			('Moana','Moana', STR_TO_DATE( "05/01/2017", "%d/%m/%Y" )),
			('Jon Snow','Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
			('Gregor Clegane','Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
			('Daenerys Targaryen','Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
			('Arya Stark','Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
			('Sansa Stark','Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ));
			
insert into ator values
			(001, 'Emilia Clarke', 31, '', 'feminino', 'Emilia Isabelle Euphemia Rose Clarke é uma atriz inglesa conhecida pela sua interpretação da personagem Daenerys Targaryen na série de televisão Game of Thrones, da HBO.'),
			(002, 'Sophie Turner', 21, '', 'feminino', 'Sophie Turner é uma atriz britânica, mais conhecida por interpretar Sansa Stark na série de televisão Game of Thrones.'),
			(003, 'Kit Harington', 31, '', 'masculino', 'Christopher Catesby "Kit" Harington é um ator inglês de televisão, teatro e cinema. Mais conhecido por interpretar Jon Snow, um dos protagonistas da série Game Of Thrones transmitida desde 2011 pela emissora norte-americana HBO.'),
			(004, 'Auli Cravalho', 16, '', 'feminino', '(Kohala, 22 de novembro de 2000) é uma atriz e cantora estadunidense. Estreou como atriz interpretando a personagem principal do filme animado de 2016 Moana.');
			
insert into personagem_ator values
			(001, 'Daenerys Targaryen'),
			(002, 'Sansa Stark'),
			(003, 'Jon Snow'),
			(004, 'Moana');
			
insert into serie values
			('Completo', 'Van Helsing', STR_TO_DATE( "23/09/2016", "%d/%m/%Y" )),
			('Em lançamento', 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ));
			
insert into temporada values
			('', '', 1, 'Van Helsing', STR_TO_DATE( "23/09/2016", "%d/%m/%Y" )),
            ('', '', 1, 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
            ('', '', 2, 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
            ('', '', 3, 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
            ('', '', 4, 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ));

insert into episodio values
			('Ep1', 1, '', '', STR_TO_DATE( "31/07/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ),  1),
			('Ep2', 2, '', '', STR_TO_DATE( "23/09/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep3', 3, '', '', STR_TO_DATE( "30/09/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep4', 4, '', '', STR_TO_DATE( "7/10/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep5', 5, '', '', STR_TO_DATE( "14/10/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep6', 6, '', '', STR_TO_DATE( "21/10/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001,STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep7', 7, '', '', STR_TO_DATE( "28/10/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001,STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep8', 8, '', '', STR_TO_DATE( "4/11/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep9', 9, '', '', STR_TO_DATE( "11/11/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ),1),
			('Ep10', 10, '', '', STR_TO_DATE( "18/11/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep11', 11, '', '', STR_TO_DATE( "25/11/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1),
			('Ep12', 12, '', '', STR_TO_DATE( "2/12/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001,STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ),  1),
			('Ep13', 13, '', '', STR_TO_DATE( "9/12/2016", "%d/%m/%Y" ), 'Game of Thrones', 01012001, STR_TO_DATE( "17/04/2011", "%d/%m/%Y" ), 1);

insert into assistiu values
			('gabriel', 01012001, 'Game of Thrones', STR_TO_DATE( "17/04/2011", "%d/%m/%Y" )),
			('caionakai', 01012001, 'Moana', STR_TO_DATE( "05/01/2017", "%d/%m/%Y" ));