# Recruitment Hop Larakech Test Application

This project is a recruitment test for the Web Developer position. It involves developing a mini-application using the Laravel framework and MySQL database to manage contacts and companies.

## Table of Contents

- [Objective](#objective)
- [Requirements](#requirements)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Deliverables](#deliverables)
- [Contact](#contact)

## Objective

The objective of this test is to validate the candidate's ability to develop a mini-application using the Laravel framework. The application should include features for managing contacts and companies, with functionalities such as adding, viewing, editing, deleting, searching, sorting, and pagination.

## Requirements

- PHP 8.x
- Laravel 11
- MySQL
- Composer
- Node.js and npm (for front-end development)
- Tailwind CSS (optional for front-end styling)

## Features

- Contact management: Add, view, edit, delete contacts
- Company management
- Search and filter contacts by name and company
- Sort contacts by name, company name, and status
- Pagination of contact list
- Status display with colored badges
- Data validation and formatting
- Duplicate detection

## Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/Aissam-Ait-Ahmed-Ouhammou/HopTest-Larakech.git
   cd cd HopTest-Larakech

2. **Install PHP dependencies:**
   ```sh
   composer install

3. **Install JavaScript dependencies:**
   ```sh
   npm install

4. **Set up environment variables:**
   
   Copy the .env.example file to .env and update the database configuration.
   
   ```sh
   cp .env.example .env

5. **Generate application key:**
   ```sh
   php artisan key:generate

6. **Run migrations:**
   ```sh
   php artisan migrate

7. **Compile front-end assets using Tailwind CSS:**
   ```sh
   npm run dev


## usage

1. **Run the development server:**
   ```sh
   php artisan serve

2. **(Optional) for genertae 100 contacts by seeder:**
   ```sh
   php artisan db:seed

## deliverables

- Push the code to a GitHub repository.
- public URL for testing the mini-application: https://tech-spatium.online/
