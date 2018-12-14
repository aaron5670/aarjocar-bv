CREATE DATABASE aarjocar
GO

USE aarjocar
go

CREATE TABLE users (
	userID		int				NOT NULL,
	username	varchar(50)		NOT NULL,
	password	varchar(50)		NOT NULL,
)