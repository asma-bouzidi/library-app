# TODO: Finish Library App

## 1. Update LibraryController
- [ ] Modify `booksIndex` method to fetch paginated books with filters and pass `$books` to the view.
- [ ] Modify `bookEdit` method to fetch the specific book by ID and pass `$book` to the view.

## 2. Add Web Routes for Book Management
- [ ] Add POST `/books` route pointing to `BookController@store` with 'auth' and 'admin' middleware.
- [ ] Add PUT `/books/{id}` route pointing to `BookController@update` with 'auth' and 'admin' middleware.
- [ ] Optionally add DELETE `/books/{id}` route for book deletion.

## 3. Implement Session-Based Authentication UI
- [ ] Create login blade view (`resources/views/auth/login.blade.php`).
- [ ] Create register blade view (`resources/views/auth/register.blade.php`).
- [ ] Add web routes for GET/POST login and register.
- [ ] Create or modify controllers to handle web session login/register/logout.
- [ ] Add logout route and link in layout.

## 4. Update Blade Views and Forms
- [ ] Ensure create and edit forms submit to the new web routes.
- [ ] Add flash message display for success/errors in views.

## 5. Seed Admin User
- [ ] Update UserSeeder to create an admin user for initial access.

## 6. Testing and Final Touches
- [ ] Run tests to ensure functionality works.
- [ ] Check for any missing dependencies or configurations.
