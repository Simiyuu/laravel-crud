# Laravel Student CRUD Application

A full-stack Laravel web application that implements a complete CRUD (Create, Read, Update, Delete) system to manage student records. It connects an SQLite database to custom user interfaces using Eloquent models, RESTful controllers, and Blade template forms protected by built-in security features.

## Features

It provides complete management of student profiles through four core capabilities:

- **Create** — a secure registration form with data validation and CSRF protection to register new students into the system.
- **Read** — a centralized dashboard that uses a Blade loop to display all student records, alongside individual detailed profile pages for each student.
- **Update** — a pre-filled modification form utilizing HTTP method spoofing (`@method('PUT')`) and smart field retention (`old()`) to safely edit existing student records.
- **Delete** — a secure deletion mechanism using method spoofing (`@method('DELETE')`) to safely and permanently remove student records from the database.

## Tech Stack

- **Backend / Framework:** Laravel (PHP) managing routing, controller logic, and request validation.
- **Database / ORM:** SQLite handles data storage, managed smoothly through Laravel's Eloquent ORM and database migrations.
- **Frontend Template Engine:** Blade, Laravel's native templating system, utilizing inheritance layouts, security helpers (`@csrf`), and dynamic loops (`@foreach`).

## What I Learned

The tutorial code I used was written for an older version of Laravel than the one I installed. This meant I had to work around several real Laravel version-compatibility issues.

One of the main ones being the tutorial's validation pattern, `$this->validate($request, [...])`, no longer works in Laravel 13. Older Laravel versions included a trait on the base `Controller` class that provided this method automatically, but that trait is no longer included by default. The present approach is to call `validate()` directly on the `$request`.

I also debugged a non-crashing bug where a student's first name wasn't displaying in the index table despite being correctly saved to the database. I traced the error by checking the browser's Network tab to confirm the form was sending correct data, then querying the database directly via `php artisan tinker` to confirm the data was saved correctly, which isolated the bug to a single typo in the Blade view (`frist_name` instead of `first_name`).

This project deepened my understanding of Laravel's MVC architecture end to end — migrations defining database structure, Eloquent models with `$fillable` protecting against mass-assignment vulnerabilities, resource controllers mapping HTTP verbs to CRUD operations, and Blade's template inheritance system (`@extends`, `@section`, `@include`, `@yield`) for building a consistent layout across pages.

## Getting Started

### Prerequisites
- PHP
- Composer

### Installation Steps

1. Clone the repository
   ```bash
   git clone <repository-url>
   cd laravel-crud-app
   ```

2. Install dependencies
   ```bash
   composer install
   ```

3. Create the environment file
   ```bash
   cp .env.example .env
   ```

4. Generate the application security key
   ```bash
   php artisan key:generate
   ```

5. Create the SQLite database file
   ```bash
   # Windows
   type nul > database/database.sqlite

   # Mac/Linux
   touch database/database.sqlite
   ```

6. Run the database migrations
   ```bash
   php artisan migrate
   ```

7. Start the development server
   ```bash
   php artisan serve
   ```

8. Visit `http://127.0.0.1:8000/students` in your browser