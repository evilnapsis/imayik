create database imayik;
use imayik;

create table user(
	id int not null auto_increment primary key,
	nick varchar(100) not null,
	email varchar(256) not null,
	password varchar(60) not null,
	name varchar(100),
	lastname varchar(100),
	phone varchar(100),
	image varchar(255),
	created_at datetime not null,
	is_admin boolean not null default 0,
	is_active boolean not null default 1
);

insert into user (nick,email,password,name,lastname) value ("evilnapsis","evilnapsis@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e","Agustin","Ramos");
insert into user (nick,email,password,name,lastname) value ("kurosaki","kurosaki05@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e","Sebastian","Ramos");
insert into user (nick,email,password,name,lastname) value ("yobup","yobups@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e","Yobup","Channel");

insert into user (nick,email,password,name,lastname) value ("tortilleria","tortilleria@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e","Agustin","Ramos de la Cruz");
insert into user (nick,email,password,name,lastname) value ("neowelder","neowelder@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e","Agustin","Ramos Escalante");
insert into user (nick,email,password,name,lastname) value ("minedeck","minedeck@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e","Agustin","R.");


create table channel(
	id int not null auto_increment primary key,
	title varchar(200) not null,
	description varchar(1000) not null,
	tags varchar(500) not null,
	image varchar(255),
	website varchar(255),
	fburl varchar(255),
	twurl varchar(255),
	gpurl varchar(255),
	created_at datetime not null,
	user_id int not null,
	foreign key (user_id) references user(id)
);

insert into channel (title,description,tags,created_at,user_id) value ("Evilnapsis Channel","Tecnologia, sofwtare, electronica, robotica e ingenieria hecha en casa ...","tecnologia,electronica,robotica,diy,sofwtare","2013-12-29 17:37:20",1);
insert into channel (title,description,tags,created_at,user_id) value ("La vida de tano","Mi vida y mi trabajo","vida,trabajo","2014-01-02 00:12:20",2);
insert into channel (title,description,tags,created_at,user_id) value ("Yobup Channel","Nuestra red social de imagenes","red,social,imagenes","2014-01-03 021:37:20",3);

insert into channel (title,description,tags,created_at,user_id) value ("Tortilleria la Playita","Venta de tortillas de maiz hechas con mucho amor directamente a su mesa","tortillas,harina","2014-01-09 17:37:20",4);
insert into channel (title,description,tags,created_at,user_id) value ("NeoWelder Lab","Desarrollo de software tecnologia, redes sociales, robotica, construimos soluciones a problemas de cualquier magnitud","software,hasrdware,robotica,soluciones","2014-01-09 00:12:20",5);
insert into channel (title,description,tags,created_at,user_id) value ("MineDeck Directory","Directorio telefonico universal hecho para negocios grandes y pequenios","directorio,telefono,telefonico","2014-01-09 021:37:20",6);


create table follower(
	user_id int not null,
	channel_id int not null,
	created_at datetime not null,
	foreign key (user_id) references user(id),
	foreign key (channel_id) references channel(id)
);


create table privacy(
	id int not null auto_increment primary key,
	name varchar(100) not null
);

insert into privacy (name) value ("Publico");
insert into privacy (name) value ("Privado");
insert into privacy (name) value ("Secreto");

create table category(
	id int not null auto_increment primary key,
	name varchar(100) not null
);

insert into category (name) value ("Comedia");
insert into category (name) value ("Accion");
insert into category (name) value ("Deportes");
insert into category (name) value ("Entretenimientos");
insert into category (name) value ("Musica");
insert into category (name) value ("Naturaleza");
insert into category (name) value ("Lugares");
insert into category (name) value ("Gente");
insert into category (name) value ("Cine");
insert into category (name) value ("Consejos");
insert into category (name) value ("Miscelanea");



create table image(
	id int not null auto_increment primary key,
	name varchar(255),
	title varchar(200) not null,
	description varchar(1000) not null,
	tags varchar(500) not null,
	created_at datetime not null,
	channel_id int not null,
	category_id int,
	privacy_id int not null,
	foreign key (privacy_id) references privacy(id),
	foreign key (category_id) references category(id),
	foreign key (channel_id) references channel(id)
);

create table album(
	id int not null auto_increment primary key,
	name varchar(255),
	title varchar(200) not null,
	description varchar(1000) not null,
	tags varchar(500) not null,
	created_at datetime not null,
	channel_id int not null,
	privacy_id int not null,
	foreign key (privacy_id) references privacy(id),
	foreign key (channel_id) references channel(id)
);

create table album_image(
	album_id int not null,
	image_id int not null,
	created_at datetime not null,
	foreign key (album_id) references album(id),
	foreign key (image_id) references image(id)
);

create table comment(
	id int not null auto_increment primary key,
	content varchar(255),
	created_at datetime not null,
	user_id int not null,
	image_id int not null,
	foreign key (image_id) references image(id),
	foreign key (user_id) references user(id)
);

create table is_like(
	id int not null auto_increment primary key,
	is_like boolean not null default 1,
	created_at datetime not null,
	user_id int not null,
	image_id int not null,
	foreign key (image_id) references image(id),
	foreign key (user_id) references user(id)
);


create table notification_type(
	id int not null auto_increment primary key,
	name varchar(100) not null
);

insert into notification_type (name) value ("Nuevo Comentario");
insert into notification_type (name) value ("Nuevo Seguidor");
insert into notification_type (name) value ("Nuevo Like");
insert into notification_type (name) value ("Nuevo Dislike");


create table notification(
	id int not null auto_increment primary key,
	brief varchar(100),
	content varchar(100),
	channel_id int,
	image_id int,
	comment_id int,
	album_id int,
	user_id int not null,
	notification_type_id int not null,
	created_at datetime not null,
	is_read boolean not null default 0,
	foreign key (channel_id) references channel(id),
	foreign key (image_id) references image(id),
	foreign key (user_id) references user(id),
	foreign key (comment_id) references comment(id),
	foreign key (album_id) references album(id),
	foreign key (notification_type_id) references notification_type(id)
);

create table image_view(
	id int not null auto_increment primary key,
	image_id int not null,
	realip varchar(100) not null,
	user_id int,
	created_at int not null,
	foreign key (image_id) references image(id),
	foreign key (user_id) references user(id)
);