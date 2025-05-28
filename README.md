# Laravel JSONPlaceholder User List

This Laravel project demonstrates how to fetch user data from the [JSONPlaceholder API](https://jsonplaceholder.typicode.com/users), display it in a Blade view, filter users by name, handle API errors, and (optionally) store/update the data in a database using the Laravel Scheduler.

## Features

- Fetches users from JSONPlaceholder API
- Displays user name, email, and address in a table
- Search bar to filter users by name
- Handles API errors and displays messages
- **Bonus:** Stores users in the database and updates them periodically via scheduler

## Requirements

- PHP >= 8.1
- Composer
- MySQL or other supported database
- Laravel 10+
