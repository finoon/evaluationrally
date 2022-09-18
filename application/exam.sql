CREATE TABLE admin(
	id SERIAL NOT NULL PRIMARY KEY,
	email VARCHAR(255),
	password VARCHAR(255)
);

CREATE TABLE users(
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(255),
	surname VARCHAR(255),
	email VARCHAR(255),
	password VARCHAR(255)
);

CREATE TABLE category(
	category VARCHAR(255),
	id SERIAL NOT NULL PRIMARY KEY
);

CREATE TABLE participant(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(255),
	pseudo VARCHAR(255)
);

CREATE TABLE rally(
	id SERIAL NOT NULL PRIMARY KEY,
	nomrally VARCHAR(20) NOT NULL,
	coefficientrally int NOT NULL,
	nbjour INT NOT NULL,
	idcategory int not null,
	daty date,
	FOREIGN KEY (idcategory) REFERENCES category(id)
);

CREATE TABLE vehicule(
	idcategory int not null,
	numero SERIAL NOT NULL PRIMARY KEY,
	FOREIGN KEY (idcategory) REFERENCES category(id)
);

CREATE TABLE pointrally(
	idrally INT NOT NULL,
	pilote INT NOT NULL,
	copilote INT NOT NULL,
	numerovehicule INT NOT NULL,
	id SERIAL NOT NULL PRIMARY KEY,
	FOREIGN KEY (pilote) REFERENCES participant(id),
	FOREIGN KEY (copilote) REFERENCES participant(id),
	FOREIGN KEY (numerovehicule) REFERENCES vehicule(numero),
	FOREIGN KEY (idrally) REFERENCES rally(id),
);

CREATE TABLE jour(
	idjour SERIAL NOT NULL PRIMARY KEY,
	idpointrally INT NOT NULL,
	temps time,
	jour INT NOT NULL,
	point INT,
	FOREIGN KEY (idpointrally) REFERENCES pointrally(id)
);

CREATE TABLE totalpointjour(
	id SERIAL NOT NULL PRIMARY KEY,
	idjour INT NOT NULL,
	point INT,
	FOREIGN KEY (idjour) REFERENCES jour(idjour)
);
