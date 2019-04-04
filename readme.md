# User Admin

## About

This is a very simple user administration web application implementing the CREATE and READ functions from CRUD. It uses the Laravel framework for easy input validation and user list pagination.
The data is stored in an SQLite embedded database.

## Installation

The hosting web server must have PHP >= 7.0.0 installed with the following extensions (from the Laravel documentation):

- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

The server root should be the */public* directory which is inside the application root directory.
Directories within the */storage* and the */bootstrap/cache* directories should be writable by the web server.
The SQLite database file have the required structure (with some test data), no additional setup needed.
The default 5 rows per page can be changed in the *app/Http/Controllers/HomeController.php* file by setting the __private $perPage__ variable.

## Usage

The webapp starts with the home page which have all the functions. User registration/authentication is not used, anyone can add users to the database.
The user creation form is always visible above the user list table. All input fields must be filled to add a new entity. Any user can have any number of email addresses. The email field format is a comma separated list, the date of birth format is YYYY-MM-DD and between 1900-01-01 and the actual date, the user name must be unique and can only contain alphabet characters.
