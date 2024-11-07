SET FOREIGN_KEY_CHECKS=0;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(32) NOT NULL,
	last_name VARCHAR(32),
	gender TINYINT(1) NOT NULL,
	phone VARCHAR(12) NOT NULL UNIQUE,
	username VARCHAR(64) NOT NULL UNIQUE,
	password VARCHAR(128) NOT NULL,
	image_url VARCHAR(256),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

	INDEX(first_name, last_name),
	INDEX(phone),
	INDEX(username),

	PRIMARY KEY(id)
);



--
-- This is a single line comment
-- 

/*

Multi line comment

*/


--
-- account tables
-- status: 1 = active, 2 = inactive, 3 = blocked, 4 = freeze
--
DROP TABLE IF EXISTS accounts;
CREATE TABLE accounts (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    account_number VARCHAR(20) UNIQUE,
    account_type TINYINT(1),
    status TINYINT(1),
	user_id INT UNSIGNED NOT NULL,
    balance DECIMAL(15, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

DROP TABLE IF EXISTS transactions;
CREATE TABLE transactions(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    amount DECIMAL(15, 2),
    narration VARCHAR(255),
    transaction_date TIMESTAMP,
    transaction_type TINYINT(1),
    user_id INT UNSIGNED NOT NULL,
    account_id INT UNSIGNED NOT NULL,

    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (account_id) REFERENCES accounts(id)
);




















SET FOREIGN_KEY_CHECKS=1;