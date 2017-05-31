drop schema if exists projetobd;
create schema projetobd;
use projetobd;
create table Faixa_Etaria(
	codigo integer primary key,
    idade varchar(30)
);
create table obra(
    codigo integer primary key,     
    titulo varchar (30),
    sinopse varchar(300),
    Faixa_Etaria_codigo integer not null, 
    data_lançamento date,
    foreign key(Faixa_Etaria_codigo) references Faixa_Etaria(codigo)
    
);
create table genero(
	codigo integer primary key,
    nome varchar(20)
);
create table genero_obra(
	genero_codigo integer,
    obra_codigo integer,
    primary key (genero_codigo,obra_codigo),
    foreign key (obra_codigo) references obra(codigo),
    foreign key (genero_codigo) references genero(codigo)
);
create table filme(
    obra_codigo integer not null,
    trailer varchar(300),
    foreign key (obra_codigo) references obra(codigo)
);

create table serie(
	stattus varchar(100),
    obra_codigo integer primary key,
    foreign key (obra_codigo) references obra(codigo)
);

create table temporada(
    numero integer,
    n_episodios integer,
    trailer varchar(300),
    serie_codigo integer,
    constraint temporada_key primary key(numero,serie_codigo),
    foreign key(serie_codigo) references serie(obra_codigo)
);

create table episodio(
    nome varchar(100),
    numero integer,
    sinopse varchar(200),
    constraint episodio_key primary key(nome,numero),
    temporada_numero integer not null,
    foreign key(temporada_numero) references temporada(numero)
);
create table usuario(
	id integer primary key,
    nome varchar(30),
    senha varchar(20),
    email varchar(50) unique
);
create table administrador(
	usuario_id integer not null,
    codigo integer not null,
    primary key(usuario_id,codigo),
    foreign key(usuario_id) references usuario(id)
);
create table assistiu(
	usuario_id integer not null,
    obra_codigo integer not null,
    datta datetime,
    primary key(usuario_id,obra_codigo, datta),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);
create table deseja_assistir(
	usuario_id integer not null,
    obra_codigo integer not null,
    datta datetime,
    primary key(usuario_id,obra_codigo, datta),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);

create table favorita(
	usuario_id integer not null,
    obra_codigo integer not null,
    primary key(usuario_id,obra_codigo),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);

create table comentario(
	usuario_id integer not null,
    obra_codigo integer not null,
    datta datetime not null,
    texto varchar(300),
    primary key(usuario_id,obra_codigo, datta),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);
create table idioma(
	nome varchar(30),
    sigla_pais varchar(2),
    primary key(nome,sigla_pais),
	obra_codigo integer not null,
    foreign key (obra_codigo) references obra(codigo)
);
create table legenda(
	nome varchar(30),
    sigla_pais varchar(2),
    primary key(nome,sigla_pais),
	obra_codigo integer not null,
    foreign key (obra_codigo) references obra(codigo)
);
create table personagem(
	nome varchar(100) primary key
);

create table personagem_obra(
	personagem_nome varchar(100),
	obra_codigo integer not null,
    primary key(personagem_nome, obra_codigo),
    foreign key (obra_codigo) references obra(codigo),
    foreign key (personagem_nome) references personagem(nome)
);

create table ator(
	codigo integer primary key,
    nome varchar(100),
    idade integer,
    sexo varchar(20),
    biografia varchar(300)
);

create table personagem_ator(
	ator_codigo integer,
	personagem_nome varchar(100) not null,
    primary key (ator_codigo, personagem_nome),
    foreign key (personagem_nome) references personagem(nome),
    foreign key (ator_codigo) references ator(codigo)
);