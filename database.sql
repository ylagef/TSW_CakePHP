drop database if exists areufree;
create database areufree;

use areufree;

grant all privileges on *.* to 'root'@'localhost';
flush privileges;

create table users (
		user_id int auto_increment,
		username VARCHAR(50),
		name varchar(255) not null,
		email varchar(255) not null,
		password varchar(255) not null, /* PASSWORD HASHED */

		primary key (user_id)
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;

create table polls (
	poll_id int auto_increment,
	title varchar(255) not null,
	place varchar(255),
	author int not null,
	url varchar(255) not null,

	primary key (poll_id),
	foreign key (author) references users(user_id) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;

create table gaps (
	gap_id int auto_increment,
	poll_id int not null,
	start_date datetime not null,
	end_date datetime not null,	 

	primary key (gap_id),
	foreign key (poll_id) references polls(poll_id) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;

create table assignations (
	assignation_id int auto_increment,
	user_id int not null,
	gap_id int not null,

	primary key (assignation_id),
	foreign key (gap_id) references gaps(gap_id) on delete cascade,
	foreign key (user_id) references users(user_id) on delete cascade
) ENGINE=INNODB DEFAULT CHARACTER SET = utf8;


-- INSERTS

INSERT INTO users(name, username, email, password) VALUES
("Yeray Lage", "ylagef", "yeray@gmail.com", "$2y$10$NWXfQL3CA7d93l32kCZCMuz/1LNon/veLN7wO7I9lKw0whXgqpRI6"), /* Password=yeray*/
("Iván Fernández", "ivanf", "ivan@gmail.com", "$2y$10$A3tAwSKvEw6Y64LrMI02vur7OKKOZVPi68afxi6FErams1E/sVL0y	"); /* Password=ivan*/

INSERT INTO `polls` (`poll_id`, `title`, `place`, `author`,`url`) VALUES
(1, 'Encuesta de birras', 'Graduado', 1,'localhost/polls/view/33F426550092097FF39B31878124D4EC'),
(2, 'Encuesta de exámenes', 'ESEI', 2,'localhost/polls/view/EC9C3919917A16B9660F00C942E69533');

INSERT INTO `gaps` (`gap_id`, `poll_id`, `start_date`, `end_date`) VALUES
(1, 1, '2018-10-06 09:35:00', '2018-10-06 10:35:00'),
(2, 1, '2018-10-06 11:35:00', '2018-10-06 12:35:00'),
(3, 1, '2018-10-07 09:35:00', '2018-10-07 12:35:00');
