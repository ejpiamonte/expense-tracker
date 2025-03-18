# Expense Tracker CRUD Project

A simple Expense Tracker web application built using CodeIgniter 4, PHP, and XAMPP. This project allows users to create, read, update, and delete (CRUD) expense records with an intuitive visual dashboard powered by Chart.js.

## Features
✅ CRUD Operations: Add, edit, and delete expense entries.

✅ Visual Dashboard: Track expenses via interactive bar charts.

✅ Clear Data Presentation: Color-coded categories and percentage labels for better expense distribution visibility.

✅ User-Friendly Design: Clean and responsive interface.

✅ Secure Framework: Built with CodeIgniter 4 standards.

## Prerequisites
Ensure you have the following installed:
- **XAMPP** (Apache and MySQL server)
- **Composer** (Dependency manager)
- **PHP 8.0 or later**

## Installation

### Step 1: Clone the Repository
```bash
git clone https://github.com/your-username/expense-tracker.git
cd expense-tracker
```

### Step 2: Install Dependencies
Run the following to install project dependencies:
```bash
composer install
```

### Step 3: Set Up Environment
Copy `.env.example` and rename it to `.env`:
```bash
cp .env.example .env
```
Update the database credentials in the `.env` file:
```env
database.default.hostname = 127.0.0.1
database.default.database = expense_tracker
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### Step 4: Import the Database
Open phpMyAdmin at `http://localhost/phpmyadmin`.

Create a new database named `expense_tracker`.

Import the `expense_tracker.sql` file located in the `/database` folder.

### Step 5: Start the Application
Start Apache and MySQL servers via XAMPP.

Serve the application using:
```bash
php spark serve
```
Access the app at `http://localhost:8080`.

## Usage
- **Add Expenses:** Create new entries for tracking.
- **Visual Analysis:** Bar charts display expense categories and their percentages.
- **Manage Entries:** Use the edit and delete functions for full control over your data.

## Folder Structure
```
/app
├── Controllers      # Handles business logic
├── Models           # Database interactions
├── Views            # Frontend templates
/public
├── assets           # Static files like CSS and JS
/database
├── expense_tracker.sql  # Database schema
```

## Improvements in Progress
🔹 Enhanced data validation and error handling

🔹 Improved UI responsiveness and design

🔹 User authentication for secure data access

## Contributing
Contributions are welcome! If you’d like to suggest changes or add features, feel free to open a pull request. Please discuss major updates through issues first.

## License
This project is licensed under the MIT License.
