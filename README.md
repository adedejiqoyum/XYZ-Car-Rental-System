**XYZ Car Rental System**

**Project Overview**
This is a car rental system built with HTML, PHP, and MySQL.
The system allows users to enter their details, choose a car size, and calculate the total rental cost based on the number of days the car is rented.

**Features**
- User input for name, email, phone number, and rental details.
- Selection of car size (Full, Medium, Small) with associated rental costs.
- Calculation of total rental cost.
- Storage of user responses and rental selections in a MySQL database.

**Code Used**
- HTML
- CSS
- PHP
- MySQL
  
**How to Run**
1. Ensure you have a web server like MySQL, PHPMYAdmin, or XAMPP installed.
2. Place the project files in the web server's root directory (htdocs for XAMPP).
3. Import the SQL script to create the database and table.
4. Access the project via the browser using localhost
   
**Database Setup**
1. Create Database: Run the below SQL script to create a database and a table for storing user responses.

```sql
CREATE DATABASE car_rental;

USE car_rental;

CREATE TABLE rentals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    days INT NOT NULL,
    car_size ENUM('Full', 'Medium', 'Small') NOT NULL,
    total_cost DECIMAL(10, 2) NOT NULL,
    rental_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
