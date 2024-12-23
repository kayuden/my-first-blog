# my-first-blog

Project 5 : Creating your first blog - OpenClassrooms training: Application developer - PHP/Symfony

This project involves the development of a professional blog in PHP, structured according to the MVC (Model-View-Controller) architecture. The application is object-oriented (OOP) for a modular and scalable design. It includes a user-friendly interface for visitors and a secure administration section for managing posts, comments and users.

## Prerequisites

To run this project, ensure you have the following installed:

- **XAMPP** or another local web server (Apache, MySQL, PHP)
- **Git** for cloning the repository
- A modern web browser

## Installation

Follow these steps to set up the project on your local environment:

### 1. Clone the Repository
Open your terminal or Git Bash and run the following command to clone the repository:
```bash
git clone https://github.com/kayuden/my-first-php-blog.git
```

### 2. Move the Project to the XAMPP Directory
Move the cloned project folder to the `htdocs` directory of your XAMPP installation:
```bash
mv my-first-blog /path-to-xampp/htdocs
```

### 3. Configure the Database
1. Start the **Apache** and **MySQL** modules from the XAMPP Control Panel.
2. Open [phpMyAdmin](http://localhost/phpmyadmin).
3. Import the database schema:
   - Import the `my_first_blog.sql` file using phpMyAdmin.

### 4. Configure Environment Variables
Edit the `public/index.php` file to match your local environment:
```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'my_first_blog');
define('DB_USER', 'your-database-username');
define('DB_PASS', 'your-database-password');
```

### 5. Run the Application
1. Open your web browser and go to:
   ```
   http://localhost/my-first-blog/
   ```
2. Log in with an admin account to access the admin panel:
   ```
   http://localhost/my-first-blog/login
   ```

## Contact

For questions or feedback, feel free to contact kbartholomot@gmail.com