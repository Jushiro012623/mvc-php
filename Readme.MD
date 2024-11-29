# PHP MVC Project

Welcome to my PHP MVC project! This project follows the MVC (Model-View-Controller) architecture and provides a simple structure for developing web applications.

## Prerequisites

Before running this project, make sure you have the following installed:

- PHP (7.x or higher)
- Composer (for dependency management)

## Installation
1. Clone this repository to your local machine:
   ```bash
   git clone https://github.com/Jushiro012623/mvc-php.git
2. Navigate to the project directory:
    ```bash
    cd <project_directory>
3. Update Composer dependencies by running the following command:
    ```bash
    composer update
4. Regenerate the Composer autoloader to ensure that the application can properly locate all namespaces:

    ```bash
    composer dump-autoload --optimize
## Usage
1. Once the dependencies are installed, you can run the application locally using a PHP built-in server or configure it with your web server.
    ```bash
    cd <project_directory>/public

    php -S localhost:8000
    ```

2. Open your web browser and navigate to the following URL to access the application:
    ```bash
    http://localhost:8000 
    ```
## Key Points:
- The step to run `composer update` **immediately after cloning** the repository is emphasized.
- This ensures that users know they need to update the Composer dependencies before proceeding.

<!-- ## Additional information
### Database Migration Command
1. **Create a New Table**

    ```bash
    composer migrate    
    ```
    - The `composer migrate` command will run the migrations and create the necessary tables in the database

2. This `composer rollback` command is going to drop a table in the data base

    ```bash
    composer migrate    
    ```
    - The composer rollback command will revert the most recent migration, effectively dropping the table(s) in the database that were created by the last migration.

3. This `composer migrate:fresh` command is going to drop a table in the database `if exists` and then migrate the table

    ```bash
    composer migrate    
    ```
    - The composer migrate:fresh command will first drop all tables in the database (if they exist) and then re-run all migrations to recreate the tables from scratch.

### Explanation:
- The commands are clearly outlined with their purpose described before the code block.
- Each section includes a brief note on how and when to use each command (create, rollback, and refresh migrations).
- The commands are separated for better readability, and appropriate headings are used to structure the content.

This refined version helps users easily understand the migration commands and when to use them, making the section both informative and easy to navigate.
 -->


<!-- ## Contributing
We welcome contributions to this project! If you want to contribute, please follow these steps:

1. Fork the repository.
    ```bash
    Create a new branch (git checkout -b feature-name).

    Commit your changes (git commit -am 'Add new feature').

    Push the branch (git push origin feature-name).

    Create a new Pull Request. -->