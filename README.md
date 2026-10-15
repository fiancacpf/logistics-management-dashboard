# Logistics Management Dashboard

A standalone dashboard for a logistics management system focused on warehouse operations, inventory movements, and beneficiary management.

This project demonstrates a full-stack implementation using Laravel, TypeScript, and PostgreSQL. It provides interactive data visualizations and a centralized overview of key logistics indicators.

[![Logistics Management Dashboard](http://cfianca.com/assets/systems/logistics-management-dashboard.png)](https://cfianca.com/)

## Features

- **Stock Movement Analytics** — Monthly visualization of stock entries and outputs, categorized by movement type.
- **Beneficiary Statistics** — Visualization of beneficiary data by gender and age group.
- **Interactive Charts** — Dynamic charts with built-in zoom, navigation, and data export capabilities.
- **Record Details** — Interactive modals for viewing additional information about individual records.
- **Asynchronous Data Loading** — Retrieves data from Laravel endpoints without requiring full page reloads.
- **Relational Database** — PostgreSQL integration for structured data storage and retrieval.

## Tech Stack

| Technology | Purpose |
|---|---|
| PHP | Backend programming language |
| Laravel | Backend framework |
| Laravel Blade | Server-rendered views |
| TypeScript | Typed frontend logic and interactions |
| jQuery | AJAX requests and DOM interactions |
| Bootstrap | UI components and responsive layout |
| ApexCharts | Data visualization |
| PostgreSQL | Relational database |

## Architecture

The application uses Laravel to handle backend requests and retrieve data from PostgreSQL. Blade renders the dashboard interface, while TypeScript manages interactive behavior, including chart initialization, asynchronous data loading, and modal interactions.

ApexCharts visualizes stock movements and beneficiary statistics. The frontend communicates with Laravel endpoints to retrieve chart data and record details.

The project is a standalone demonstration of the dashboard component of a larger logistics management system. It focuses on the interaction between the backend, database, and frontend rather than reproducing the entire original application.

## Requirements

Before running the project, ensure you have the following installed:

- PHP (compatible with the Laravel version used by the project)
- Composer
- Node.js and npm
- PostgreSQL

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd <project-directory>
```

### 2. Install backend dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Configure the environment

Create your local environment file:

```bash
cp .env.example .env
```

Configure the PostgreSQL connection in `.env`:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Run database migrations and seeders

```bash
php artisan migrate
php artisan db:seed
```

### 7. Build frontend assets

For a production build:

```bash
npm run build
```

For development:

```bash
npm run dev
```

### 8. Start the application

```bash
php artisan serve
```

Open the local URL displayed by Laravel in your browser.

## Project Scope

This repository focuses on the dashboard and its supporting functionality. The broader logistics system includes additional operational workflows that are outside the scope of this demonstration.

The project showcases practical full-stack development, database integration, asynchronous communication, and interactive data visualization within an existing Laravel-based architecture.

## License

Unless otherwise specified in the repository, all rights are reserved by the author. No permission to redistribute or commercially reuse this code is granted by this notice.