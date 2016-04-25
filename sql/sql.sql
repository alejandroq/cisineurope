/* 

CIS in Europe MVP 

Designer / Developer: Alejandro Quesada

Instructions: 
	1) Create Database called DB in MySQL. 
	2) Create new user for DB with the following credentials:
		user = dbuser 
		pwd = careycole
	3) Execute queries below
	4) Execute PROCEDURE in procedure.sql doc
	4) SQL portion complete. 

*/

CREATE TABLE linguaFranca(
	ID int NOT NULL PRIMARY KEY IDENTITY(1,1),
	english VARCHAR(140) NULL,
	spanish VARCHAR(140) NULL
	);

CREATE TABLE country(
	abbreviation CHAR(2) NOT NULL PRIMARY KEY,
	name VARCHAR(30)
);

CREATE TABLE city(
	cityID int NOT NULL IDENTITY(1,1) PRIMARY KEY,
	cityName VARCHAR(25) NOT NULL,
	countryAbbreviation CHAR(2) NOT NULL
);

CREATE TABLE reviews(
	ID int NOT NULL PRIMARY KEY IDENTITY(1,1),
	countryAbbreviation CHAR(2) NOT NULL,
	cityID int NULL,
	price int NOT NULL,
	rating int NOT NULL,
	note VARCHAR(140) NOT NULL,
	post_date TIMESTAMP NOT NULL,
	Constraint review_lccountry_FK foreign key (countryAbbreviation) References country (abbreviation),
	Constraint review_city_FK foreign key (cityID) References city (cityID)
	);

CREATE TABLE img(
	ID int NOT NULL PRIMARY KEY IDENTITY(1,1),
	imgPath VARCHAR(2) NOT NULL
	);

CREATE TABLE category(
	ID int NOT NULL PRIMARY KEY IDENTITY(1,1),
	name VARCHAR(30) NOT NULL,
);

CREATE TABLE wikiEntry(
	ID int NOT NULL PRIMARY KEY IDENTITY(1,1),
	title VARCHAR(25) NULL,
	content TEXT NULL,
	categoryID int NOT NULL,
	Constraint c_fk foreign key (categoryID) References category (ID)
);


--CONTENT
INSERT INTO category (name) VALUES 
	('General'), ('Content'), ('Design'), ('Development'); 

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


INSERT INTO country VALUES ('US', 'United States');
INSERT INTO country VALUES ('AF', 'Afghanistan');
INSERT INTO country VALUES ('AL', 'Albania');
INSERT INTO country VALUES ('DZ', 'Algeria');
INSERT INTO country VALUES ('DS', 'American Samoa');
INSERT INTO country VALUES ('AD', 'Andorra');
INSERT INTO country VALUES ('AO', 'Angola');
INSERT INTO country VALUES ('AI', 'Anguilla');
INSERT INTO country VALUES ('AQ', 'Antarctica');
INSERT INTO country VALUES ('AG', 'Antigua and Barbuda');
INSERT INTO country VALUES ('AR', 'Argentina');
INSERT INTO country VALUES ('AM', 'Armenia');
INSERT INTO country VALUES ('AW', 'Aruba');
INSERT INTO country VALUES ('AU', 'Australia');
INSERT INTO country VALUES ('AT', 'Austria');
INSERT INTO country VALUES ('AZ', 'Azerbaijan');
INSERT INTO country VALUES ('BS', 'Bahamas');
INSERT INTO country VALUES ('BH', 'Bahrain');
INSERT INTO country VALUES ('BD', 'Bangladesh');
INSERT INTO country VALUES ('BB', 'Barbados');
INSERT INTO country VALUES ('BY', 'Belarus');
INSERT INTO country VALUES ('BE', 'Belgium');
INSERT INTO country VALUES ('BZ', 'Belize');
INSERT INTO country VALUES ('BJ', 'Benin');
INSERT INTO country VALUES ('BM', 'Bermuda');
INSERT INTO country VALUES ('BT', 'Bhutan');
INSERT INTO country VALUES ('BO', 'Bolivia');
INSERT INTO country VALUES ('BA', 'Bosnia and Herzegovina');
INSERT INTO country VALUES ('BW', 'Botswana');
INSERT INTO country VALUES ('BV', 'Bouvet Island');
INSERT INTO country VALUES ('BR', 'Brazil');
INSERT INTO country VALUES ('IO', 'British Indian Ocean Territory');
INSERT INTO country VALUES ('BN', 'Brunei Darussalam');
INSERT INTO country VALUES ('BG', 'Bulgaria');
INSERT INTO country VALUES ('BF', 'Burkina Faso');
INSERT INTO country VALUES ('BI', 'Burundi');
INSERT INTO country VALUES ('KH', 'Cambodia');
INSERT INTO country VALUES ('CM', 'Cameroon');
INSERT INTO country VALUES ('CA', 'Canada');
INSERT INTO country VALUES ('CV', 'Cape Verde');
INSERT INTO country VALUES ('KY', 'Cayman Islands');
INSERT INTO country VALUES ('CF', 'Central African Republic');
INSERT INTO country VALUES ('TD', 'Chad');
INSERT INTO country VALUES ('CL', 'Chile');
INSERT INTO country VALUES ('CN', 'China');
INSERT INTO country VALUES ('CX', 'Christmas Island');
INSERT INTO country VALUES ('CC', 'Cocos (Keeling) Islands');
INSERT INTO country VALUES ('CO', 'Colombia');
INSERT INTO country VALUES ('KM', 'Comoros');
INSERT INTO country VALUES ('CG', 'Congo');
INSERT INTO country VALUES ('CK', 'Cook Islands');
INSERT INTO country VALUES ('CR', 'Costa Rica');
INSERT INTO country VALUES ('HR', 'Croatia (Hrvatska)');
INSERT INTO country VALUES ('CU', 'Cuba');
INSERT INTO country VALUES ('CY', 'Cyprus');
INSERT INTO country VALUES ('CZ', 'Czech Republic');
INSERT INTO country VALUES ('DK', 'Denmark');
INSERT INTO country VALUES ('DJ', 'Djibouti');
INSERT INTO country VALUES ('DM', 'Dominica');
INSERT INTO country VALUES ('DO', 'Dominican Republic');
INSERT INTO country VALUES ('TP', 'East Timor');
INSERT INTO country VALUES ('EC', 'Ecuador');
INSERT INTO country VALUES ('EG', 'Egypt');
INSERT INTO country VALUES ('SV', 'El Salvador');
INSERT INTO country VALUES ('GQ', 'Equatorial Guinea');
INSERT INTO country VALUES ('ER', 'Eritrea');
INSERT INTO country VALUES ('EE', 'Estonia');
INSERT INTO country VALUES ('ET', 'Ethiopia');
INSERT INTO country VALUES ('FK', 'Falkland Islands (Malvinas)');
INSERT INTO country VALUES ('FO', 'Faroe Islands');
INSERT INTO country VALUES ('FJ', 'Fiji');
INSERT INTO country VALUES ('FI', 'Finland');
INSERT INTO country VALUES ('FR', 'France');
INSERT INTO country VALUES ('FX', 'France, Metropolitan');
INSERT INTO country VALUES ('GF', 'French Guiana');
INSERT INTO country VALUES ('PF', 'French Polynesia');
INSERT INTO country VALUES ('TF', 'French Southern Territories');
INSERT INTO country VALUES ('GA', 'Gabon');
INSERT INTO country VALUES ('GM', 'Gambia');
INSERT INTO country VALUES ('GE', 'Georgia');
INSERT INTO country VALUES ('DE', 'Germany');
INSERT INTO country VALUES ('GH', 'Ghana');
INSERT INTO country VALUES ('GI', 'Gibraltar');
INSERT INTO country VALUES ('GK', 'Guernsey');
INSERT INTO country VALUES ('GR', 'Greece');
INSERT INTO country VALUES ('GL', 'Greenland');
INSERT INTO country VALUES ('GD', 'Grenada');
INSERT INTO country VALUES ('GP', 'Guadeloupe');
INSERT INTO country VALUES ('GU', 'Guam');
INSERT INTO country VALUES ('GT', 'Guatemala');
INSERT INTO country VALUES ('GN', 'Guinea');
INSERT INTO country VALUES ('GW', 'Guinea-Bissau');
INSERT INTO country VALUES ('GY', 'Guyana');
INSERT INTO country VALUES ('HT', 'Haiti');
INSERT INTO country VALUES ('HM', 'Heard and Mc Donald Islands');
INSERT INTO country VALUES ('HN', 'Honduras');
INSERT INTO country VALUES ('HK', 'Hong Kong');
INSERT INTO country VALUES ('HU', 'Hungary');
INSERT INTO country VALUES ('IS', 'Iceland');
INSERT INTO country VALUES ('IN', 'India');
INSERT INTO country VALUES ('IM', 'Isle of Man');
INSERT INTO country VALUES ('ID', 'Indonesia');
INSERT INTO country VALUES ('IR', 'Iran (Islamic Republic of)');
INSERT INTO country VALUES ('IQ', 'Iraq');
INSERT INTO country VALUES ('IE', 'Ireland');
INSERT INTO country VALUES ('IL', 'Israel');
INSERT INTO country VALUES ('IT', 'Italy');
INSERT INTO country VALUES ('CI', 'Ivory Coast');
INSERT INTO country VALUES ('JE', 'Jersey');
INSERT INTO country VALUES ('JM', 'Jamaica');
INSERT INTO country VALUES ('JP', 'Japan');
INSERT INTO country VALUES ('JO', 'Jordan');
INSERT INTO country VALUES ('KZ', 'Kazakhstan');
INSERT INTO country VALUES ('KE', 'Kenya');
INSERT INTO country VALUES ('KI', 'Kiribati');
INSERT INTO country VALUES ('KP', 'Korea, Democratic People''s Republic of');
INSERT INTO country VALUES ('KR', 'Korea, Republic of');
INSERT INTO country VALUES ('XK', 'Kosovo');
INSERT INTO country VALUES ('KW', 'Kuwait');
INSERT INTO country VALUES ('KG', 'Kyrgyzstan');
INSERT INTO country VALUES ('LA', 'Lao People''s Democratic Republic');
INSERT INTO country VALUES ('LV', 'Latvia');
INSERT INTO country VALUES ('LB', 'Lebanon');
INSERT INTO country VALUES ('LS', 'Lesotho');
INSERT INTO country VALUES ('LR', 'Liberia');
INSERT INTO country VALUES ('LY', 'Libyan Arab Jamahiriya');
INSERT INTO country VALUES ('LI', 'Liechtenstein');
INSERT INTO country VALUES ('LT', 'Lithuania');
INSERT INTO country VALUES ('LU', 'Luxembourg');
INSERT INTO country VALUES ('MO', 'Macau');
INSERT INTO country VALUES ('MK', 'Macedonia');
INSERT INTO country VALUES ('MG', 'Madagascar');
INSERT INTO country VALUES ('MW', 'Malawi');
INSERT INTO country VALUES ('MY', 'Malaysia');
INSERT INTO country VALUES ('MV', 'Maldives');
INSERT INTO country VALUES ('ML', 'Mali');
INSERT INTO country VALUES ('MT', 'Malta');
INSERT INTO country VALUES ('MH', 'Marshall Islands');
INSERT INTO country VALUES ('MQ', 'Martinique');
INSERT INTO country VALUES ('MR', 'Mauritania');
INSERT INTO country VALUES ('MU', 'Mauritius');
INSERT INTO country VALUES ('TY', 'Mayotte');
INSERT INTO country VALUES ('MX', 'Mexico');
INSERT INTO country VALUES ('FM', 'Micronesia, Federated States of');
INSERT INTO country VALUES ('MD', 'Moldova, Republic of');
INSERT INTO country VALUES ('MC', 'Monaco');
INSERT INTO country VALUES ('MN', 'Mongolia');
INSERT INTO country VALUES ('ME', 'Montenegro');
INSERT INTO country VALUES ('MS', 'Montserrat');
INSERT INTO country VALUES ('MA', 'Morocco');
INSERT INTO country VALUES ('MZ', 'Mozambique');
INSERT INTO country VALUES ('MM', 'Myanmar');
INSERT INTO country VALUES ('NA', 'Namibia');
INSERT INTO country VALUES ('NR', 'Nauru');
INSERT INTO country VALUES ('NP', 'Nepal');
INSERT INTO country VALUES ('NL', 'Netherlands');
INSERT INTO country VALUES ('AN', 'Netherlands Antilles');
INSERT INTO country VALUES ('NC', 'New Caledonia');
INSERT INTO country VALUES ('NZ', 'New Zealand');
INSERT INTO country VALUES ('NI', 'Nicaragua');
INSERT INTO country VALUES ('NE', 'Niger');
INSERT INTO country VALUES ('NG', 'Nigeria');
INSERT INTO country VALUES ('NU', 'Niue');
INSERT INTO country VALUES ('NF', 'Norfolk Island');
INSERT INTO country VALUES ('MP', 'Northern Mariana Islands');
INSERT INTO country VALUES ('NO', 'Norway');
INSERT INTO country VALUES ('OM', 'Oman');
INSERT INTO country VALUES ('PK', 'Pakistan');
INSERT INTO country VALUES ('PW', 'Palau');
INSERT INTO country VALUES ('PS', 'Palestine');
INSERT INTO country VALUES ('PA', 'Panama');
INSERT INTO country VALUES ('PG', 'Papua New Guinea');
INSERT INTO country VALUES ('PY', 'Paraguay');
INSERT INTO country VALUES ('PE', 'Peru');
INSERT INTO country VALUES ('PH', 'Philippines');
INSERT INTO country VALUES ('PN', 'Pitcairn');
INSERT INTO country VALUES ('PL', 'Poland');
INSERT INTO country VALUES ('PT', 'Portugal');
INSERT INTO country VALUES ('PR', 'Puerto Rico');
INSERT INTO country VALUES ('QA', 'Qatar');
INSERT INTO country VALUES ('RE', 'Reunion');
INSERT INTO country VALUES ('RO', 'Romania');
INSERT INTO country VALUES ('RU', 'Russian Federation');
INSERT INTO country VALUES ('RW', 'Rwanda');
INSERT INTO country VALUES ('KN', 'Saint Kitts and Nevis');
INSERT INTO country VALUES ('LC', 'Saint Lucia');
INSERT INTO country VALUES ('VC', 'Saint Vincent and the Grenadines');
INSERT INTO country VALUES ('WS', 'Samoa');
INSERT INTO country VALUES ('SM', 'San Marino');
INSERT INTO country VALUES ('ST', 'Sao Tome and Principe');
INSERT INTO country VALUES ('SA', 'Saudi Arabia');
INSERT INTO country VALUES ('SN', 'Senegal');
INSERT INTO country VALUES ('RS', 'Serbia');
INSERT INTO country VALUES ('SC', 'Seychelles');
INSERT INTO country VALUES ('SL', 'Sierra Leone');
INSERT INTO country VALUES ('SG', 'Singapore');
INSERT INTO country VALUES ('SK', 'Slovakia');
INSERT INTO country VALUES ('SI', 'Slovenia');
INSERT INTO country VALUES ('SB', 'Solomon Islands');
INSERT INTO country VALUES ('SO', 'Somalia');
INSERT INTO country VALUES ('ZA', 'South Africa');
INSERT INTO country VALUES ('GS', 'South Georgia South Sandwich Islands');
INSERT INTO country VALUES ('ES', 'Spain');
INSERT INTO country VALUES ('LK', 'Sri Lanka');
INSERT INTO country VALUES ('SH', 'St. Helena');
INSERT INTO country VALUES ('PM', 'St. Pierre and Miquelon');
INSERT INTO country VALUES ('SD', 'Sudan');
INSERT INTO country VALUES ('SR', 'Suriname');
INSERT INTO country VALUES ('SJ', 'Svalbard and Jan Mayen Islands');
INSERT INTO country VALUES ('SZ', 'Swaziland');
INSERT INTO country VALUES ('SE', 'Sweden');
INSERT INTO country VALUES ('CH', 'Switzerland');
INSERT INTO country VALUES ('SY', 'Syrian Arab Republic');
INSERT INTO country VALUES ('TW', 'Taiwan');
INSERT INTO country VALUES ('TJ', 'Tajikistan');
INSERT INTO country VALUES ('TZ', 'Tanzania, United Republic of');
INSERT INTO country VALUES ('TH', 'Thailand');
INSERT INTO country VALUES ('TG', 'Togo');
INSERT INTO country VALUES ('TK', 'Tokelau');
INSERT INTO country VALUES ('TO', 'Tonga');
INSERT INTO country VALUES ('TT', 'Trinidad and Tobago');
INSERT INTO country VALUES ('TN', 'Tunisia');
INSERT INTO country VALUES ('TR', 'Turkey');
INSERT INTO country VALUES ('TM', 'Turkmenistan');
INSERT INTO country VALUES ('TC', 'Turks and Caicos Islands');
INSERT INTO country VALUES ('TV', 'Tuvalu');
INSERT INTO country VALUES ('UG', 'Uganda');
INSERT INTO country VALUES ('UA', 'Ukraine');
INSERT INTO country VALUES ('AE', 'United Arab Emirates');
INSERT INTO country VALUES ('GB', 'United Kingdom');
INSERT INTO country VALUES ('UM', 'United States minor outlying islands');
INSERT INTO country VALUES ('UY', 'Uruguay');
INSERT INTO country VALUES ('UZ', 'Uzbekistan');
INSERT INTO country VALUES ('VU', 'Vanuatu');
INSERT INTO country VALUES ('VA', 'Vatican City State');
INSERT INTO country VALUES ('VE', 'Venezuela');
INSERT INTO country VALUES ('VN', 'Vietnam');
INSERT INTO country VALUES ('VG', 'Virgin Islands (British)');
INSERT INTO country VALUES ('VI', 'Virgin Islands (U.S.)');
INSERT INTO country VALUES ('WF', 'Wallis and Futuna Islands');
INSERT INTO country VALUES ('EH', 'Western Sahara');
INSERT INTO country VALUES ('YE', 'Yemen');
INSERT INTO country VALUES ('YU', 'Yugoslavia');
INSERT INTO country VALUES ('ZR', 'Zaire');
INSERT INTO country VALUES ('ZM', 'Zambia');
INSERT INTO country VALUES ('ZW', 'Zimbabwe');

--INITIAL CONTENT
INSERT INTO city (cityName, countryAbbreviation) VALUES ('Stockholm', 'SE');

INSERT INTO reviews (countryAbbreviation, cityID, price, rating, note) VALUES
('SE', 1, 3, 3,	'Stockholm, Sweden is full of enough brilliant architecture and pretty people to supplement "purposeful lostfullness" for 5+ hours.');

INSERT INTO img (imgPath) VALUES 
('i1'), ('i2'), ('i3'), ('i4'), ('i5'), ('i6'), ('i7'), ('i8'), ('i9'), ('i10'), ('i11'), 
('i12'), ('i13'), ('i14'), ('i15'), ('i16'), ('i17'), ('i18'), ('i19'), ('i20'), ('i21'), 
('i22'), ('i23'), ('i24'), ('i25'), ('i26'), ('i27'), ('i28'), ('i29'), ('i30'), ('i31'), 
('i32'), ('i33'), ('i34');



-- DELETE FROM wikiEntry;

--wikiEntry Modification
ALTER TABLE wikiEntry
ALTER COLUMN title VARCHAR(50) NULL;
ALTER TABLE wikiEntry
ALTER COLUMN content TEXT NULL;

--wikiEntry Reseed
-- DBCC CHECKIDENT (wikiEntry, RESEED, 0)

--WIKI
INSERT INTO wikiEntry (title, content, categoryID) VALUES
('File Paths', '<img style="max-height:25em; width:auto" src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide1.png"><p>This file distribution improves readability and modularizes components. My recommendation would be to <b>Replicate</b> this websites file structure. For example: "header.php" is included in the primary file, "index.php" as the navigation bar. More on this later.</p>', 1),
('Roles', '<p>My recommendation would be to, at a minimum, maintain a <b>Content Developer</b>, a <b>Designer</b> and <b>Developer</b>. The Developer would handle back-end logic (PHP) and SQL, The Designer would handle wireframing and the HTML/CSS development. The Content Developer would develop content.</p>', 1),
('Image Optimization', '<p>Images are the heaviest of downloads when viewing a website (especially on a mobile devices data plan). Optimize image file sizes here: <a href="http://webresizer.com/resizer/">Image Resizer</a>.</p>', 2),
('Collaboration with Designer', '<img src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide2.jpg"> <p>Content is king of any website/application. Work with your designer for the best distribution and display of content (whether text, image, video, etc). The aforementioned heavily influences the flow of a website. The following graphic depicts how users scan a website (property of <a href="https://www.smashingmagazine.com/2008/01/10-principles-of-effective-web-design">Smashing Magazine</a>.)</p>', 2),
('Process', '<img src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide5.png"><p>Design is a process. Initially you discover requirements (speak to your client). Strategize your approach by creating personas. Personas are imaginary users that help provide context for certain design cues you will utilize. This step helps you design more empathetically. The final step in design is the development of wireframes given all of the information you have collected. Always check with your client! This is an iterative process.</p>', 3),
('Collaboration', '<p>It is imperative as the designer that you collaborate with your Content Developers and Developers. The first for content and information architecture (discussed below). The second for feasibility. Can we code this in "X" time?</p> ', 3),
('Information Architecture', '<p>Usability is driven by ease of use. When an inexperienced user enters your application, they should find their way naturally. A proper IA is imperative for this (books have been written on the subject). This websites IA is pictured below:</p> <img src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide4.png">', 3),
('Wireframing', '<p>Plan your product through wireframing. The more you plan, the easier it will be to develop. Work on the wireframes with your team members and take into account your personas, information architecture and all information gathered to this point. Wireframes are not meant to be detailed and an example is below:</p><img src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide7.png">', 3),
('Mobile-First', '<p>Design your website to be responsive and prioritize functions based on what would work best on a mobile device. It is the new standard of development and helps your craft your digital product around its true intention rather than gimmickry. This website was initially designed for the mobile platform. A wireframe is below:</p><img style="max-height:25em; width:auto" src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide6.png">', 3),
('Database ERD', '<p>The ERD below is the back-end foundation of this website.</p><img src="https://dl.dropboxusercontent.com/u/59744229/CIS%20Images/guide3.png">', 4),
('Client-Size vs Back-End', '<p>PHP interacts with your Database each Server reload (form action when a submission of GET or POST instance occurs). Javascript, in contrast, works client-side. It runs code live and enables neat animations and interactions within a website. The majority of the animations on this website are accomplished through a Javascript Library by the name of jQuery.</p>', 4),
('Javascript vs jQuery', '<p>More of this can be found in the main.js file.</p><code style="text-align:left">//Javascript object <br>var foo = document.getElementByClassName("bar");<br><br>//The Same Object in jQuery<br>var foo = $(".bar");</code><p>jQuery selectors are the same as CSS selectors. More information can be found at <a href="http://www.w3schools.com/jquery/">W3!</a></p>', 4),
('Responsive Web Design', '<p>My two personal recommendations on successful Responsive Web Design: 1) Beware the percent. Meant for fluid design. 2) Use ems instead. They are fantastic. External CSS code required to render exclusive screen size CSS attributes:</p><code style="text-align:left"> @media screen and (max-width: 629px) { <br>/* Attributes for screens with a maximum size of 629px. Used for mobile responsiveness in this website. */<br> }</code><p>This will be difficult at first, but is extremely valuable. Work with your Designer to maintain feasibility.', 4),
('Code', '<p>We highly encourage you to look through this websites code files. We have gone out of our way to properly comment and modularize code to best enable readability! Primary files include: index.php, header.php, footer.php, main.css, main.js and functions.php. Neat features include: Twitter Character Count, numerous database queries of differing styles and complexity, etc.</p>', 4);
