create schema lab;

create table lab.Classe(
id_Classe serial not null primary key,
desc_Classe varchar(100) not null,
email varchar(100) not null,
foreign key (email) references lab.Pessoa(email) on delete cascade
);

COMMIT;

create table lab.Risco(
id_Risco serial not null primary key,
desc_Risco varchar(100) not null,
email varchar(100) not null,
foreign key (email) references lab.Pessoa(email) on delete cascade
);

COMMIT;

create table lab.Reagente(
cas varchar(11) not null primary key,
desc_Reag varchar(100) not null,
local_Reag varchar(50) not null, 
controlado varchar(3) not null, 
qtd_Reag float not null,
unidade varchar(3) not null, 
validade date not null, 
anexo varchar(100) not null, 
area_Reag varchar(8) not null,
id_Classe int not null,
id_Risco int not null,
foreign key (id_Classe) references lab.Classe(id_Classe) on delete cascade,
foreign key (id_Risco) references lab.Risco(id_Risco) on delete cascade
);

COMMIT;

create table lab.Material(
id_Mat serial not null primary key,
desc_Mat varchar(100) not null, 
qtd_Mat int not null, 
area_Mat varchar(8) not null, 
local_Mat varchar(50) not null
);

COMMIT;

create table lab.Equipamento(
id_Equip serial not null primary key,
desc_Equip varchar(100) not null, 
local_Equip varchar(50) not null,
qtd_Equip int not null, 
area_Equip varchar(8) not null
);

COMMIT;

create table lab.Pessoa(
email varchar(100) not null primary key,
senha varchar(45) not null, 
tipo varchar(9) not null, 
area_Pessoa varchar(8) not null
);

COMMIT;

create table lab.Agenda(
id_Agenda serial not null primary key,
data date not null, 
horaInicio time not null, 
horaFim time not null,
desc_Agenda varchar(100)
);

COMMIT;

create table lab.PessoaAgenda(
email varchar(45) not null,
id_Agenda serial not null,
primary key (email,id_Agenda),
foreign key (email) references lab.Pessoa(email) on delete cascade,
foreign key (id_Agenda) references lab.Agenda(id_Agenda) on delete cascade
);

COMMIT;

delete from lab.material;
delete from lab.equipamento;
delete from lab.classe;
delete from lab.risco;
select * from lab.reagente;
select * from lab.material;
select * from lab.equipamento;
select * from lab.risco;
select * from lab.classe;
