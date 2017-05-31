drop schema if exists projetobd;
create schema projetobd;
use projetobd;

create table obra(
    codigo integer primary key,     
    titulo varchar (30),  
    data_lançamento date
    
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
    foreign key (obra_codigo) references obra(codigo)
);

create table serie(
    codigo integer primary key,
    obra_codigo integer not null,
    foreign key (obra_codigo) references obra(codigo)
);

create table temporada(
    numero integer primary key,
    serie_codigo integer not null,
    foreign key(serie_codigo) references serie(codigo)
);

create table episodio(
    nome varchar(100) primary key,
    numero integer not null,
    foreign key(numero) references temporada(numero)
);
create table usuario(
	id integer primary key
);
create table administrador(
	usuario_id integer not null,
    id integer not null,
    primary key(usuario_id,id),
    foreign key(usuario_id) references usuario(id)
);
create table assistido(
	usuario_id integer not null,
    obra_codigo integer not null,
    quando date,
    primary key(usuario_id,obra_codigo),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);
create table deseja_assistir(
	usuario_id integer not null,
    obra_codigo integer not null,
    primary key(usuario_id,obra_codigo),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);

create table favorito(
	usuario_id integer not null,
    obra_codigo integer not null,
    primary key(usuario_id,obra_codigo),
    foreign key(usuario_id) references usuario(id),
    foreign key (obra_codigo) references obra(codigo)
);

create table ranking(
	usuario_id integer not null,
    obra_codigo integer not null,
    primary key(usuario_id,obra_codigo),
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
	nome varchar(100),
    primary key(nome),
	obra_codigo integer not null,
    foreign key (obra_codigo) references obra(codigo)
);

create table ator(
	nome varchar(100),
    codigo integer,
    primary key(codigo),
	personagem_nome varchar(100) not null,
    foreign key (personagem_nome) references personagem(nome)
);