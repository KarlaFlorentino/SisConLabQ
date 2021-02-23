CREATE DATABASE lab;

CREATE TABLE Pessoa(
email varchar(100) not null primary key,
senha varchar(45) not null, 
tipo varchar(9) not null, 
area_Pessoa varchar(8) not null
);

CREATE TABLE Classe(
id_Classe serial not null primary key,
desc_Classe varchar(100) not null,
email varchar(100) not null,
foreign key (email) references Pessoa(email) on delete cascade
);

CREATE TABLE Risco(
id_Risco serial not null primary key,
desc_Risco varchar(100) not null,
email varchar(100) not null,
foreign key (email) references Pessoa(email) on delete cascade
);

CREATE TABLE Reagente(
cas varchar(11) not null,
lote varchar(20) not null,
desc_Reag varchar(100) not null,
local_Reag varchar(50) not null, 
controlado varchar(3) not null, 
anexo varchar(200), 
area_Reag varchar(8) not null,
id_Classe bigint unsigned not null,
id_Risco bigint unsigned not null,
primary key(cas,lote),
foreign key (id_Classe) references Classe(id_Classe) on delete cascade,
foreign key (id_Risco) references Risco(id_Risco) on delete cascade
);

CREATE TABLE EstoqueReag(
cod_EstoqueReag serial not null primary key,
qtd_Reag float not null,
unidade varchar(3) not null, 
validade date not null,
desc_Reag varchar(100),
cas varchar(11) not null,
lote varchar(20) not null,
foreign key (cas,lote) references lab.Reagente(cas,lote) on delete cascade
);

CREATE TABLE Material(
id_Mat int not null primary key,
desc_Mat varchar(100) not null,  
area_Mat varchar(8) not null, 
local_Mat varchar(50) not null
);

CREATE TABLE EstoqueMat(
cod_EstoqueMat serial not null primary key,
qtd_Mat int not null,
desc_Mat varchar(100), 
id_Mat int not null,
foreign key (id_mat) references lab.Material(id_mat) on delete cascade
); 

CREATE TABLE Equipamento(
id_Equip int not null primary key,
desc_Equip varchar(100) not null, 
local_Equip varchar(50) not null,
area_Equip varchar(8) not null
);

CREATE TABLE EstoqueEquip(
cod_EstoqueEquip serial not null primary key,
qtd_Equip int not null, 
desc_Equip varchar(100), 
id_Equip int not null,
foreign key (id_Equip) references lab.Equipamento(id_Equip) on delete cascade
); 

CREATE TABLE Agenda(
id_Agenda serial not null primary key,
data date not null, 
horaInicio time not null, 
horaFim time not null,
desc_Agenda varchar(100)
);

CREATE TABLE PessoaAgenda(
email varchar(45) not null,
id_Agenda serial not null,
primary key (email,id_Agenda),
foreign key (email) references lab.Pessoa(email) on delete cascade,
foreign key (id_Agenda) references lab.Agenda(id_Agenda) on delete cascade
);






