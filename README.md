# SovTech Laravel blog

Full Working Demo is available at :
 http://sovtech-blog.hellencp.com
 
Demo user 1
email: john@sovtech.com
password: secret123
 
Demo user 2
email: lily@sovtech.com
password: secret456

## Table of Contents

- [Downloading](#downloading)
- [Installation](#installation)
- [Database Migration and Seeding](#database-migration-and-seeding)
- [Running The Demo](#running-the-demo)

## Downloading
Navigate to Your Webroot ie. www or htdocs and create a folder with your desired name eg blog

pull repository from github with the following commands:

git init

git pull https://github.com/kinate/Laravel-SovTech-Blog.git


## Installation

In Your Root Directory Rename .env.example to .env

Then Fill in Your database username and password as well as your database name

Example:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_blog
DB_USERNAME=your_user
DB_PASSWORD=your_password

> Then in your terminal type:

 - composer install

## Database Migration and Seeding

In Your Terminal type the following commands for migrating and then seeding the database:

 - php artisan migrate --seed
 > this command will create database tables and seed user and post for demo.

## Running The Demo
Make Sure You set appropriate permissions for your directory! Permission denied is common case here
Go to your browser and type the address of the application :
example:
http://localhost/blog/public
or
Run the following command in your terminal to start laravel application:
- php artisan serve
>Laravel application will start at address http://127.0.0.1:port
>Example: http://127.0.0.1:8000

## Demo login details
To login, Please enter the following credentials
Email : john@sovtech.com
password : secret101

 