# Teachers portal

A web application basic model for Teachers portal.

![Teachers portal](https://github.com/filamentphp/demo/assets/171715/899161a9-3c85-4dc9-9599-13928d3a4412)

[Open in Gitpod](https://gitpod.io/#https://github.com/filamentphp/demo) to edit it and preview your changes with no setup required.

## Installation

Clone the repo locally:

```sh
git clone https://github.com/laravel-filament/demo.git filament-demo && cd filament-demo
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an SQLite database. You can also use another database (MySQL, Postgres), simply update your configuration accordingly.

```sh
touch database/database.sqlite
```

Run database migrations:

```sh
php artisan migrate
```

Run database seeder:

```sh
php artisan db:seed
```


Run the dev server (the output will give the address):

```sh
php artisan serve
```

You're ready to go! Visit the url in your browser, and login with:

-   **Username:** admin@admin.com
-   **Password:** password
