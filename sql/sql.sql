/* 

CIS in Europe MVP 
11/20/15 SQL Deliverable

Designer / Developer: Alejandro Quesada

Instructions: 
	1) Create Database called DB in MySQL.
	3) Run lines 15-92 below in a query. 
	4) SQL portion complete. 
*/

CREATE TABLE linguaFranca(
	ID int NOT NULL PRIMARY KEY Auto_Increment,
	english VARCHAR(140) NULL,
	spanish VARCHAR(140) NULL
	);

CREATE TABLE location(
	ID int NOT NULL PRIMARY KEY Auto_Increment,
	city VARCHAR(20) NULL,
	country VARCHAR(25) NULL
	);

CREATE TABLE reviews(
	ID int NOT NULL PRIMARY KEY Auto_Increment,
	locationID int NOT NULL,
	price int NOT NULL,
	rating int NOT NULL,
	note VARCHAR(140) NOT NULL,
	Constraint Reviews_FK foreign key (locationID) References Location (id)
	);

CREATE TABLE img(
	ID int NOT NULL PRIMARY KEY Auto_Increment,
	imgPath VARCHAR(2) NOT NULL
	);

INSERT INTO linguaFranca (english, spanish) VALUES
	('CIS in Europe', 'CIS en Europa'),
	('About', 'Sobre'), 
	('Study','Estudiar'), 
	('Abroad','Extranjero'), 
	('Language', 'Idioma'), 
	('English','Ingl&eacute;s'), 
	('Spanish', 'Espa&ntilde;ol'),
	('View in English', 'Mira en Ingles'),
	('View in Spanish', 'Mira en Espa&ntilde;ol'),
	('Magical Moments in Malm&ouml;', 'Momentos M&aacute;gicos en Malm&ouml;'), 
	('A CIS Students Guide to Studying Abroad', 'Gu&iacute;a Del Estudiante Para Estudiar en el Extranjero'),
	('Content goes here.' , 'Contento va aqui.'), 
	('Anonymous Notes', 'Notas Mysterios'), 
	('Post your own Note below!', '&iexcl;Publica tu propio a continuaci&oacute;n!'),
	('Share your experiences anonymously!', '&iexcl;Publica tu experencias an&oacute;nimo!'),
	('What city did you visit?', '&iquest;En qu&eacute; ciudad visita?'),
	('In what country?','&iquest;En que pais?'),
	('How expensive?', '&iquest;Cuanto caro?'),
	('How would you rate it?','&iquest;C&oacute;mo se calificar&iacute;a?'),
	('Leave a Note','Deja una Nota'),
	('Submit', 'Entregar'),
	('Please Fill All Fields & Try Again', 'Por favor la forma completo'),
	('Thank You for Your Submission! :)','&iexcl;Gracias por tu ubmission! :)'),
	('Studied Abroad?', '&iquest;Estudi&oacute; en el Extranjero?'), 
	('An Integrated Approach', 'Un Enfoque Integrado'), 
	('Between Web Design & Database Development', 'Entre Dise&ntilde;o y Desarrollo de Base de Datos'),
	('Content goes here.', 'Contento va aqui.'),
	('My Abroad Experiences', 'Mis Experiencias Extranjero'),
	('Next', 'Pr&oacute;ximo'), 
	('Previous', 'Previo'),
	('140 characters remaining', '140 caracteres restantes'),
	('Select..', 'Seleccionar..'),
	('Cheap', 'Barato'),
	('Modest', 'Modesto'),
	('Expensive', 'Caro');

--for purposes of instilling CIS in Europe w/ initial content
INSERT INTO location (city, country) VALUES 
('Stockholm', 'Sweden'),
('Malm&ouml;', 'Sweden'),
('Barcelona', 'Spain');


INSERT INTO reviews (locationID, price, rating, note) VALUES
(1,	3,	3,	'Stockholm, Sweden is full of enough brilliant architecture and pretty people to supplement "purposeful lostfullness" for 5+ hours.'),
(2,	2,	3,	'MalmÃ¶, Sweden was an incredible place. Never there be a place it more appropriate for the operations of a bicycle sans a seat.'),
(3,	1,	3,	'The nightlife was visceral. The people truly indulge in more libre lives outlined with Sangria, Familia, Futbol & Funny Lisps.');


INSERT INTO img (imgPath) VALUES 
('i1'), ('i2'), ('i3'), ('i4'), ('i5'), ('i6');
