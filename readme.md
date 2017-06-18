README

Setup:
	Create a new database named "c1" and run the following commands to create the required tables:

CREATE TABLE `users` (
  `id` bigint(64) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `notes` (
  `id` bigint(64) NOT NULL AUTO_INCREMENT,
  `title` varchar(255),
  `body` varchar(512),
  `created_by` bigint(64) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `loggedInUsers` (
  `id` bigint(64) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

*****Remember to update .env file to use your database configs*****

	Create a user using the following command:

INSERT INTO `c1`.`users`
(`id`,
`name`,
`email`,
`password`,
`updated_at`,
`created_at`)
VALUES
(1,
'test',
'test@test.com',
'$2y$10$Q7hi.IQlFFY3A96BJveDtOPQ9Nf40i2Vf4QV0g8IoDYA8RZtgTD06',
'2015-10-12 02:40:15',
'2015-10-12 02:40:15');	


Startup:
	Open cmd
	Change directory to the SharpSpring project folder
	Run "php -S localhost:8080 -t public"

-You can log in with the test account credentials test@test.com / $sh4rpspr1nG$

-Clicking the New Note button shows a modal window for creating a new note. Newly added notes are added to the list

-Logout logs out the current user

-Each note can be edited in the view and has a Save and Delete button. 
	-Save stores any changes to the note to the database (currently doesn't set the "updated_at" timestamp). 
	-Delete removes it from the database and then from the view.