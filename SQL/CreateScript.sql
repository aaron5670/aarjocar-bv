create database aarjocar
  collate SQL_Latin1_General_CP1_CI_AS
go

create table users (
  id        int identity,
  username  varchar(25)                                                   not null,
  password  text                                                          not null,
  user_role varchar(50) constraint users_user_role_default default 'user' not null,
  firstname varchar(50),
  lastname  varchar(100),
  email     varchar(150),
  constraint PK_USERS
  primary key (id),
  constraint UQ_USERS
  unique (username)
)
go

alter table users
  add constraint users_user_role_default default 'user' for user_role
go

create table rubrieken (
  id           int identity,
  rubriek      varchar(255) not null,
  omschrijving text,
  primary key (id)
)
go

create unique index rubrieken_rubriek_uindex
  on rubrieken (rubriek)
go

create table posts (
  id                int  identity,
  rubriek           int  not null,
  userid            int  not null,
  post_titel        text not null,
  post_omschrijving text not null,
  keer_bekeken      int  not null,
  gemaakt_op        date constraint posts_gemaakt_op_default default getdate(),
  primary key (id),
  constraint fk_post_rubriek
  foreign key (rubriek) references rubrieken
    on update cascade
    on delete cascade,
  constraint posts_users_id_fk
  foreign key (userid) references users
    on update cascade
    on delete cascade
)
go

alter table posts
  add constraint posts_gemaakt_op_default default getdate() for gemaakt_op
go

create table categorieen (
  categorie varchar(255) not null,
  constraint categorieen_pk
  primary key (categorie)
)
go

create table page_iframe (
  id              int identity,
  iframe_url      text         not null,
  categorie       varchar(255) not null,
  titel           varchar(255) not null,
  omschrijving    text         not null,
  afbeelding      varchar(255),
  publicatiedatum date,
  primary key (id),
  constraint page_iframe_categorieen__fk
  foreign key (categorie) references categorieen
    on update cascade
    on delete cascade
)
go

create table content (
  id      int identity,
  page_id int not null,
  titel   text,
  tekst   text,
  primary key (id)
)
go

