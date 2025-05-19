create table posts (
    id int not null primary key auto_increment,
    title varchar(255)
);


-- inserts

---- posts
insert into posts (title) values ("My first blog post");
insert into posts (title) values ("My second blog post");
