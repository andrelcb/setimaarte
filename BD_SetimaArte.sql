create database setimaArte;

use setimaArte;

create table shopping(
idshopping int not null primary key auto_increment,
nome_shopping varchar(50) not null,
endereco varchar(50) not null,
tel_fixo char(10)
);

select * from shopping;

create table Cinema(
idcinema int not null primary key auto_increment,
nome_cinema varchar(50) not null,
shopping_idshopping int not null,
email_cinema varchar(50),
foreign key (shopping_idshopping) references shopping(idshopping)
);

create table Filmes(
idfilmes int not null primary key auto_increment,
nome_filme varchar(50) not null,
preco_sessao float not null,
classificacao char(2) not null,
nota_filme int,
horario_filme datetime,
cinema_idcinema int not null,
foto_filme varchar(150),
opcao char(2),
foreign key (cinema_idcinema) references cinema(idcinema) 
);


create table usuario(
idusuario int not null auto_increment primary key,
nome_usuario varchar(50),
email varchar(50),
senha varchar(50)
);

SELECT 
    f.foto_filme,
    f.nome_filme,
    f.classificacao,
    c.nome_cinema,
    f.preco_sessao,
    f.opcao,
    s.nome_shopping,
    DATE_FORMAT(f.horario_filme, '%H:%m') as hora
FROM
    cinema c
        INNER JOIN
    filmes f ON c.idcinema = f.cinema_idcinema
        INNER JOIN
    shopping s ON s.idshopping = c.shopping_idshopping
WHERE
    nome_filme LIKE '%%'
ORDER BY preco_sessao ASC