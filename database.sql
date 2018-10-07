drop database if exists areufree;
create database areufree;

use areufree;

grant all privileges on *.* to 'root'@'localhost';
flush privileges;

create table users (
		idUser int auto_increment,
		username VARCHAR(50),
		name varchar(255) not null,
		email varchar(255) not null,
		password varchar(255) not null, /* PASSWORD HASHED */
		primary key (idUser)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;

create table polls (
	idPoll int auto_increment,
	title varchar(255) not null,
	place varchar(255),
	author int not null,
	url varchar(255) not null

	primary key (idPoll),
	foreign key (author) references users(idUser) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;

create table gaps (
	idGap int auto_increment,
	idPoll int not null,
	startDate datetime not null,
	endDate datetime not null,	 

	primary key (idGap),
	foreign key (idPoll) references polls(idPoll) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;

create table assignations (
	idUser int not null,
	idGap int not null,

	primary key (idGap, idUser),
	foreign key (idGap) references gaps(idGap) on delete cascade,
	foreign key (idUser) references users(idUser) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;


-- INSERTS

INSERT INTO users(name, username, email, password) VALUES
("Yeray Lage", "ylagef", "yeray@gmail.com", "$2y$10$NWXfQL3CA7d93l32kCZCMuz/1LNon/veLN7wO7I9lKw0whXgqpRI6"), /* Password=yeray*/
("Iván Fernández", "ivanf", "ivan@gmail.com", "$2y$10$A3tAwSKvEw6Y64LrMI02vur7OKKOZVPi68afxi6FErams1E/sVL0y	"); /* Password=ivan*/

INSERT INTO `polls` (`idPoll`, `title`, `place`, `author`,`url`) VALUES
(1, 'Encuesta de birras', 'Graduado', 1,'www.encuestas.com/1'),
(2, 'Encuesta de exámenes', 'ESEI', 2,'www.encuestas.com/2');

INSERT INTO `gaps` (`idGap`, `idPoll`, `startDate`, `endDate`) VALUES
(1, 1, '2018-10-06 09:35:00', '2018-10-06 10:35:00'),
(2, 1, '2018-10-06 11:35:00', '2018-10-06 12:35:00'),
(3, 1, '2018-10-07 09:35:00', '2018-10-07 12:35:00');
