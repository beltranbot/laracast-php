create table notes (
    id int not null primary key auto_increment,
    body text
);

create table users (
    id int not null primary key auto_increment,
    name varchar(255),
    email varchar(255)
);

create unique index index_email on users(email);

alter table notes add column user_id int;

alter table notes add constraint fk_notes_users_id foreign key (user_id) references users(id);



-- inserts

---- posts
insert into posts (title) values ("My first blog post");
insert into posts (title) values ("My second blog post");
