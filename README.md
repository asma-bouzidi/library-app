# Library Management System

A comprehensive Laravel-based web application designed to streamline library operations, providing an intuitive interface for managing book collections, user interactions, and administrative tasks. Built with modern web technologies, this system offers both a responsive web interface and a robust RESTful API.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Testing](#testing)
- [Technologies](#technologies)
- [Contributing](#contributing)
- [License](#license)

## Features

### Core Functionality
- **Comprehensive Book Management**: Full CRUD operations for books including title, author, category, publication year, and available copies tracking
- **User Authentication & Authorization**: Secure registration and login with role-based access control (Admin/User)
- **Advanced Borrowing System**: Book borrowing with due date tracking, overdue fines calculation, and return processing
- **Reservation Management**: Users can reserve unavailable books with automatic queue management
- **Admin Dashboard**: Complete administrative control over users, books, borrowings, and reservations

### User Experience
- **Powerful Search & Filtering**: Multi-criteria search with pagination for efficient book discovery
- **Responsive Web Interface**: Modern, mobile-friendly UI built with Blade templates and Tailwind CSS
- **RESTful API**: Complete API coverage for all system functionalities with JSON responses
- **Real-time Status Updates**: Live tracking of book availability and reservation queues

### Technical Features
- **Secure API Authentication**: Token-based authentication using Laravel Sanctum
- **Database Optimization**: Efficient queries with proper indexing and relationships
- **Comprehensive Testing**: Feature tests covering all major functionalities
- **Modular Architecture**: Clean, maintainable code structure following Laravel best practices

## Requirements

- **PHP**: ^8.2
- **Composer**: Latest stable version
- **Node.js**: ^18.0 (with npm)
- **Database**: MySQL 8.0+ or SQLite 3.0+
- **Web Server**: Apache/Nginx with mod_rewrite or equivalent

## Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd library-app
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install Node.js Dependencies
```bash
npm install
```

### 4. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Database Configuration
Configure your database connection in the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_app
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Database Migration and Seeding
```bash
# Run migrations
php artisan migrate

# Seed the database with sample data
php artisan db:seed
```

### 7. Build Frontend Assets
```bash
# For production
npm run build

# For development
npm run dev
```

### 8. Start the Application
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Configuration

### Environment Variables
Key configuration options in `.env`:

- `APP_NAME`: Application name
- `APP_URL`: Base URL for the application
- `DB_*`: Database connection settings
- `SANCTUM_STATEFUL_DOMAINS`: Domains for Sanctum authentication

### Additional Setup
- **Queue System**: Configure queue driver for background processing (optional)
- **Mail Configuration**: Set up SMTP for email notifications (optional)
- **File Storage**: Configure storage disks for file uploads (optional)

## Usage

### Web Interface
Access the application through your browser:

- **Home Page**: `http://localhost:8000`
- **Book Catalog**: Browse and search available books
- **User Dashboard**: Manage personal borrowings and reservations
- **Admin Panel**: Administrative functions (admin users only)

### User Roles
- **Regular Users**: Browse books, borrow, reserve, and manage their account
- **Administrators**: Full system access including user management and book administration

## API Documentation

The API provides RESTful endpoints for all system functionalities. All requests should include the `Accept: application/json` header.

### Authentication Endpoints

#### Register User
```http
POST /api/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```

#### Login
```http
POST /api/login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password123"
}
```

**Response:**
```json
{
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "role": "user"
  },
  "token": "bearer_token_here"
}
```

#### Logout
```http
POST /api/logout
Authorization: Bearer {token}
```

### Book Management Endpoints

#### List Books
```http
GET /api/books?page=1&per_page=10&search=laravel&author=john&category=programming&year=2023
Authorization: Bearer {token}
```

#### Create Book (Admin Only)
```http
POST /api/books
Authorization: Bearer {token}
Content-Type: application/json

{
  "title": "Laravel Best Practices",
  "author": "John Smith",
  "category": "Programming",
  "year": 2023,
  "available_copies": 5
}
```

#### Get Book Details
```http
GET /api/books/{id}
Authorization: Bearer {token}
```

#### Update Book (Admin Only)
```http
PUT /api/books/{id}
Authorization: Bearer {token}
Content-Type: application/json

{
  "title": "Updated Title",
  "available_copies": 3
}
```

#### Delete Book (Admin Only)
```http
DELETE /api/books/{id}
Authorization: Bearer {token}
```

### Borrowing Endpoints

#### Borrow a Book
```http
POST /api/borrows
Authorization: Bearer {token}
Content-Type: application/json

{
  "book_id": 1
}
```

#### List User Borrows
```http
GET /api/borrows
Authorization: Bearer {token}
```

#### Return a Book
```http
PUT /api/borrows/{id}/return
Authorization: Bearer {token}
```

### Reservation Endpoints

#### Create Reservation
```http
POST /api/reservations
Authorization: Bearer {token}
Content-Type: application/json

{
  "book_id": 1
}
```

#### List User Reservations
```http
GET /api/reservations
Authorization: Bearer {token}
```

#### Cancel Reservation
```http
DELETE /api/reservations/{id}
Authorization: Bearer {token}
```

### Error Responses
All endpoints return appropriate HTTP status codes and error messages:

```json
{
  "message": "Validation failed",
  "errors": {
    "email": ["The email field is required."]
  }
}
```

## Testing

Run the test suite using PHPUnit:

```bash
# Run all tests
php artisan test

# Run specific test file
php artisan test tests/Feature/AuthTest.php

# Run with coverage
php artisan test --coverage
```

### Available Test Suites
- **Authentication Tests**: User registration, login, logout
- **Book Management Tests**: CRUD operations for books
- **Borrowing Tests**: Borrowing and returning books
- **Reservation Tests**: Reservation creation and cancellation

## Technologies

- **Backend Framework**: Laravel 12.0
- **Authentication**: Laravel Sanctum
- **Database**: MySQL/SQLite with Eloquent ORM
- **Frontend Styling**: Tailwind CSS
- **Build Tool**: Vite
- **Testing Framework**: PHPUnit
- **API Documentation**: RESTful JSON API
- **Development Tools**: Composer, npm

## Contributing

We welcome contributions to improve the Library Management System!

### Development Workflow
1. Fork the repository
2. Create a feature branch: `git checkout -b feature/your-feature-name`
3. Make your changes and add tests
4. Ensure all tests pass: `php artisan test`
5. Commit your changes: `git commit -am 'Add new feature'`
6. Push to the branch: `git push origin feature/your-feature-name`
7. Submit a Pull Request

### Code Standards
- Follow PSR-12 coding standards
- Write comprehensive tests for new features
- Update documentation for API changes
- Ensure code is well-commented

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

**Built with ❤️ using Laravel**
