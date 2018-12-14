CREATE DATABASE aarjocar
GO

USE aarjocar
go

DROP TABLE users

CREATE TABLE users (
	id			int				identity,
	username	varchar(25)		NOT NULL,
	password	varchar(50)		NOT NULL,
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