<?php
$SQL = <<< END_OF_SQL

DROP DATABASE IF EXISTS {$DBNAME};
CREATE DATABASE IF NOT EXISTS {$DBNAME};
USE {$DBNAME};

DROP TABLE IF EXISTS {$TABNAME};
CREATE TABLE IF NOT EXISTS {$TABNAME} (
	id			INT	PRIMARY KEY	AUTO_INCREMENT,
	firstname	VARCHAR(24) NOT NULL,
	lastname	VARCHAR(24) NOT NULL,
	gender		CHAR(1) NOT NULL DEFAULT 'm',
	username	VARCHAR(48) NOT NULL UNIQUE KEY,
	password	CHAR(128)	NOT NULL,
	lastAccess	DATETIME	NOT NULL DEFAULT CURRENT_TIME,
	CONSTRAINT	UNIQUE KEY(firstname, lastname, gender)
) DEFAULT CHARSET=utf8;

INSERT INTO {$TABNAME} (username, password, firstname, lastname, gender) VALUES
	('admin@admin.com',		SHA2('admin', 512),		'Amministratore',	'Admin',		'm'),
	('birg81@gmail.com',	SHA2('ilovejava', 512),	'Biagio Rosario',	'Greco',		'm'),
	('prota@iti.re',		SHA2('atorp', 512),		'Alessandra',		'Prota',		'f'),
	('andrea@iti.re',		SHA2('andrea', 512),	'Andrea',			'Aprea',		'm'),
	('prof@futurama.tv',	SHA2('qbert', 512),		'Hubert J.',		'Farnsworth',	'm'),
	('fry@futurama.tv',		SHA2('3000', 512),		'Philip J.',		'Fry',			'm'),
	('leela@futurama.tv',	SHA2('turanga', 512),	'Leela',			'Turanga',		'f'),
	('amy@futurama.tv',		SHA2('mars', 512),		'Amy',				'Wong',			'f'),
	('bender@futurama.tv',	SHA2('unit22', 512),	'Bender',			'Rodriguez',	'm');

SELECT *
FROM
	{$TABNAME}
WHERE
	email='admin@admin.com' AND
	password=SHA2('admin',512);

END_OF_SQL;