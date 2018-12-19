USE master
DROP DATABASE aarjocar

CREATE DATABASE aarjocar
GO

USE aarjocar
go

CREATE TABLE users (
	id			int				identity,
	username	varchar(25)		NOT NULL,
	password	text			NOT NULL,
)

ALTER TABLE users
ADD CONSTRAINT PK_USERS
PRIMARY KEY (id)

ALTER TABLE users
ADD CONSTRAINT UQ_USERS
UNIQUE (username)

INSERT INTO users VALUES
 ('Aaron', 'password')

 INSERT INTO users VALUES
 ('Joris', 'password')

SELECT * FROM users


/* Joris gupdate ff naar kijken aaron denk ik */


USE master
DROP DATABASE aarjocar

CREATE DATABASE aarjocar
GO

USE aarjocar
go

CREATE TABLE users (
	id			int				identity,
	username	varchar(25)		NOT NULL,
	password	text			NOT NULL,
)

CREATE TABLE page_content(
	pageId		int			identity,
	titel		varchar(255)	NOT NULL,
	tekst		text			NOT NULL,
)


ALTER TABLE page_content
ADD CONSTRAINT PK_pageId
PRIMARY KEY (pageId)

ALTER TABLE users
ADD CONSTRAINT PK_USERS
PRIMARY KEY (id)

ALTER TABLE users
ADD CONSTRAINT UQ_USERS
UNIQUE (username)

INSERT INTO users VALUES
 ('Aaron', 'password')

 INSERT INTO users VALUES
 ('Joris', 'password')

INSERT INTO page_content values
 ('Welkom bij Aarjocar Bv', 'Test')

SELECT * FROM users

SELECT * FROM page_content