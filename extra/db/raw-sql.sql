CREATE DATABASE `code_review`

CREATE TABLE user
(
	uid INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(50) UNIQUE,
	name VARCHAR(100),
	company VARCHAR(50),
	location VARCHAR(50),
	github_id VARCHAR(50),
	github_username VARCHAR(50),
	profile_image TEXT,
	github_url TEXT
);

CREATE TABLE repo(
	rid INT PRIMARY KEY AUTO_INCREMENT,
	url VARCHAR(100),
	username VARCHAR(50),
	repo VARCHAR(50),
	uid INT,
	date_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY(uid) REFERENCES user(uid)
);