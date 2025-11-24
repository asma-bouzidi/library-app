# Library Management App

A Laravel-based web application for managing a library's book collection, user borrowing, reservations, and administrative tasks.

## Features

- **Book Management**: Add, update, delete, and search books by title, author, category, and year.
- **User Authentication**: Register and login users with role-based access (admin/regular).
- **Borrowing System**: Users can borrow books with due dates and fines for overdue returns.
- **Reservations**: Reserve books that are currently unavailable.
- **Admin Panel**: Admins can manage users, books, borrows, and reservations.
- **Search & Filtering**: Paginated search and filtering for books.
- **API Endpoints**: RESTful API for all core functionalities.
- **Notifications**: Planned reminders for due dates and fines.
- **Frontend UI**: Blade templates for web interface.

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd library-app
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Set up environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure database in `.env` file.

5. Run migrations and seeders:
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. Build assets:
   ```bash
   npm run build
   ```

7. Start the application:
   ```bash
   php artisan serve
   ```

## Usage

### API Endpoints

#### Authentication
- `POST /api/register` - Register a new user
- `POST /api/login` - Login user
- `POST /api/logout` - Logout user

#### Books
- `GET /api/books` - List books (with optional search/filter: title, author, category, year)
- `POST /api/books` - Create a new book (Admin only)
- `GET /api/books/{id}` - Get a specific book
- `PUT /api/books/{id}` - Update a book (Admin only)
- `DELETE /api/books/{id}` - Delete a book (Admin only)

#### Borrowing
- `POST /api/borrows` - Borrow a book
- `GET /api/borrows` - List user's borrows
- `PUT /api/borrows/{id}/return` - Return a borrowed book

#### Reservations
- `POST /api/reservations` - Reserve a book
- `GET /api/reservations` - List user's reservations
- `DELETE /api/reservations/{id}` - Cancel a reservation

### Web Interface
- Visit `/` for the welcome page.
- `/books` to view and manage books (UI routes).

## Testing

Run tests with:
```bash
php artisan test
```

Feature tests are available for Auth, Book, Borrow, and Reservation functionalities.

## Technologies Used

- **Laravel 12**: PHP framework
- **MySQL/SQLite**: Database
- **Laravel Sanctum**: API authentication
- **Tailwind CSS**: Styling (via Vite)
- **PHPUnit**: Testing

## Contributing

1. Fork the repository.
2. Create a feature branch.
3. Commit changes.
4. Push to the branch.
5. Open a Pull Request.

## License

This project is licensed under the MIT License.
