
### Steps

1. Clone the repository or use the zip 

   ```bash
   git clone https://github.com/TimothyTakudzwa/todo-app.git
   ```

2. Open the project directory

   ```bash
   cd todo-app
   ```

3. Install dependencies

   ```bash
   composer install
   ```


4. Create the database and user

   Open XAMPP and start the Apache and MySQL services. Access `phpMyAdmin` through your web browser (usually at `http://localhost/phpmyadmin`) and execute the following SQL commands:

   ```sql
   CREATE DATABASE todo;
   CREATE USER 'todo'@'localhost' IDENTIFIED BY 'timothytest';
   GRANT ALL PRIVILEGES ON your_database_name.* TO 'todo'@'localhost';
   FLUSH PRIVILEGES;
   ```


5. Run the migrations

   ```bash
   php artisan migrate
   ```

6. Seed the database

   ```bash
   php artisan db:seed
   ```

7. Start the development server

    ```bash
    php artisan serve
    ```

8. Access the application

    Open your web browser and visit `http://localhost:8000` to access the Todo App.


## Usage

Once the Laravel Todo App is up and running, you can start using it to manage your tasks. Here are the basic steps:

1. Register a new user account

   - Click on the "Register" button on the homepage.
   - Fill in the required information, including your desired email and password.
   - Click the "Register" button to create your account.

2. Log in to the application

   - After registering, you will be redirected to the login page.
   - Enter your email and password.
   - Click the "Log in" button to access your account.

3. Access the admin portal (for user management)

   - If you want to access the admin portal for user management, use the following credentials:
     - Email: admin@admin.com
     - Password: admin123
   - Log in using the provided admin credentials.
   - Once logged in as an admin, you will have access to additional features for managing users.

4. Create and manage tasks

   - After logging in, you will be directed to the homepage where you can see your task list.
   - To create a new task, click on the "New Task" button and fill in the task details.
   - To mark a task as completed, simply click on the checkbox next to the task.
   - To edit or delete a task, click on the task itself to open the task details page. From there, you can make the desired changes.


