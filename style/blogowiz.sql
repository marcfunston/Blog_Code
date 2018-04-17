# ---------
# Blogowiz Generator
# Author Marc Funston
# Updated 4/05/2018
# Class Server side
# ---------

DROP DATABASE IF EXISTS blogowiz;

CREATE DATABASE blogowiz;

USE blogowiz;

CREATE TABLE users (
user_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20),
last_name VARCHAR(40),
admin BOOL,
user_name VARCHAR(40) NOT NULL,
email VARCHAR(60) NOT NULL,
password VARCHAR(40) NOT NULL,
registration_date DATETIME NOT NULL,
PRIMARY KEY (user_id)
);


CREATE TABLE posts (
entry_number INT UNSIGNED NOT NULL AUTO_INCREMENT,
user_id TINYINT UNSIGNED,
entry_title VARCHAR(40) NOT NULL,
short_text VARCHAR(60),
long_text VARCHAR(255),
image_name VARCHAR(60),
views INT UNSIGNED,
entry_date DATETIME NOT NULL,
PRIMARY KEY (entry_number),
INDEX (user_id),
INDEX (entry_date)
);

CREATE TABLE messages (
user_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
email TINYINT UNSIGNED NOT NULL,
message VARCHAR(255) NOT NULL,
contact_date DATETIME NOT NULL,
PRIMARY KEY (user_id)
);

CREATE TABLE pictures(
picture_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
user_id TINYINT UNSIGNED NOT NULL,
title VARCHAR(20),
description VARCHAR(20),
link VARCHAR(128),
PRIMARY KEY(picture_id)
);

CREATE TABLE map_users_to_posts(
user_id TINYINT UNSIGNED NOT NULL, #fk
entry_number INT UNSIGNED NOT NULL, #fk
PRIMARY KEY(user_id,entry_number)
);

CREATE TABLE comments(
comment_id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
comment VARCHAR(144),
user_id TINYINT UNSIGNED,
entry_number INT UNSIGNED NOT NULL,
entry_date DATETIME NOT NULL,
PRIMARY KEY(comment_id)
);

CREATE TABLE views(
entry_number INT UNSIGNED NOT NULL AUTO_INCREMENT,
total INT UNSIGNED NOT NULL,
PRIMARY KEY(entry_number)
);

alter table views
add foreign key(entry_number)
references posts(entry_number)
on delete cascade;

alter table comments
add foreign key(entry_number)
references posts(entry_number)
on delete cascade;

alter table comments
add foreign key(user_id)
references users(user_id)
on delete cascade;

alter table map_users_to_posts
add foreign key(user_id)
references users(user_id)
on delete cascade;

alter table map_users_to_posts
add foreign key(entry_number)
references posts(entry_number)
on delete cascade;

alter table messages
add foreign key(user_id)
references users(user_id)
on delete cascade;

alter table pictures
add foreign key(user_id)
references users(user_id)
on delete cascade;

INSERT INTO users (first_name, last_name, admin, user_name, email, password, registration_date) VALUES
('Marc', 'Funston', true, 'admin', 'admin@blogowiz.com', SHA1('pass'), '2017-08-28 12:42:06'),
('Marc', 'Funston', false, 'pheo', 'marc@blogowiz.com', SHA1('pass'), '2017-08-28 12:42:06'),
('Beverly', 'Funston', false, 'pyro',  'beverly@blogowiz.com', SHA1('pass'), '2017-09-10 11:05:29'),
('Atilla', 'Hun', false, 'barbarian', 'butterfly@blogowiz.com', SHA1('pass'), '2017-10-11 10:16:10'),	
('Walter', 'Freeman', false, 'lobotomy', 'brain@blogowiz.com', SHA1('pass'), '2017-11-06 11:17:54'),	
('Carl', 'Clauberg', false, 'jerk', 'jerk@blogowiz.com', SHA1('pass'), '2018-01-05 10:20:21'),	
('Henry', 'Holmes', false, 'hh', 'hh@blogowiz.com', SHA1('pass'), '2018-03-21 11:20:43');


INSERT INTO posts (user_id, entry_title, short_text, long_text, image_name, views, entry_date)VALUES
(1, 'Ye Old Bridge', 'Is it Stable?.', 'I would think, not at all, then run across the bridge as fast as I could.', 'bridge.jpg', 0, '2018-03-23 12:22:06'),
(1, 'NoIR Module', 'Infrared camera', 'A unique module that can be attached to the Raspberry Pi. It does not have a infrared filter so it picks up infrared radiation resulting in the unique photos', 'red.jpg', 0, '2018-04-01 21:24:14'),	
(1, 'Photographer', 'Hang Chen in kayak.', 'Hang Chen takes some amazing photographs. His skill is augmented by his determination to get the perfect shot. This was his first trip out in a kayak.', 'chen_1.jpg', 0, '2018-04-01 21:26:00'),	
(1, 'State Fair', 'Historical Structures', 'This is an old building at the State Fair Grounds. It seemed to call for a black and white photo when I took the picture.', 'old_bldg.jpg', 0, '2018-04-01 21:27:43'),	
(1, 'Horse Arena', 'Training for a show', 'A horse is training for an upcoming show in an arena at State Fair. The black and white gives the textures a chance to shine. A color photograph would not be nearly as nice here.', 'arena.jpg', 0, '2018-04-01 21:30:23'),
(1, 'Tackle Box', 'Not for fishing..', 'Well I find my self fishing for components some times. But it is not for fish, just electronic storage.', 'tackle.jpg', 0, '2018-04-01 21:31:44');

INSERT INTO comments(comment, entry_number, entry_date) VALUES
('No way!', 1, '2017-11-28 12:42:06');


