# SuperBlog

This is the most secure Blog CMS on the planet.

SuperBlog has been designed from the ground up using PHP. You'll find no bloated frameworks or libraries here, because everyone knows the most secure way to build a web application is to write all the code yourself. Using other people's code just creates problems...

CAUTION: This is NOT the most secure blog cms on the planet. SuperBlog is an intentionally vulnerable Web Application used for security testing. Created in the spirit of DVWA and WebGoat, SuperBlog is meant to be hacked!
Please don't expose SuperBlog to any Internet connected hosts or sensitive data.

## Features of SuperBlog

- Database SQL queries are handwritten for MAXIMUM speed and flexibility. No heavy ORMs here!
- Easy user management with ULTRA SECURE md5 hashing to protect your passwords...
- Hand-written templating system to allow you to easily modify the front-end UI of your blog.

## Requirements

- PHP
- MySQL
- Apache or Nginx
- Composer

## Installation

Put the code somewhere your Web Server can find it. If you have Docker installed you can run 'docker-compose up -d' to run
the application in a Docker container.

For now you'll need to create the database manually. There's methods that will create the tables in the SuperBlog class.

## TODO

I'm still building an installer script for setting up the database tables
Also, everything else :-/
