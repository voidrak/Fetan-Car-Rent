 
# Laravel-Vue Template

A ready-to-use template for building modern web applications with Laravel as the backend framework and Vue.js for the frontend. This template provides a clean starting point for projects, with pre-configured integration between Laravel and Vue.

 
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/laravel-vue-template.git
   cd laravel-vue-template
   ```

2. Install PHP dependencies:
   ```bash
   cd server composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   cd client npm install
   ```

4. Copy and configure the `.env` file:
   ```bash
   cp .env.example .env
   ```
   Update the database credentials and other environment variables.

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run migrations:
   ```bash
   php artisan migrate
   ```

7. Build frontend assets:
   ```bash
   cd client npm run dev
   ```

8. Start the development server:
   ```bash
   cd server php artisan serve
   ```

 

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a feature branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add a new feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Open a Pull Request.

 
