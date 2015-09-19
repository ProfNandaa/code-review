CREATE DATABASE `code_review`

CREATE TABLE user
(
	id INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(50) UNIQUE,
	name VARCHAR(100),
	company VARCHAR(50),
	location VARCHAR(50),
	github_id VARCHAR(50),
	github_username VARCHAR(50),
	profile_image TEXT,
	github_url TEXT
); 