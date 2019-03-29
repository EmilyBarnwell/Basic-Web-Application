CREATE DATABASE snake_tracker;

use snake_tracker;

CREATE TABLE mealrecording (
	id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	foodtype VARCHAR(50) NOT NULL,
    fooddate VARCHAR(50) NOT NULL,
    sheddate VARCHAR(50) NOT NULL,
    weight VARCHAR(50) NOT NULL,
    weightdate VARCHAR(50) NOT NULL,
	date TIMESTAMP
    );
