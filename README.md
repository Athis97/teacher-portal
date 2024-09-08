# Teachers portal

A web application - basic model for Teachers portal.

![home](https://github.com/user-attachments/assets/e5137e9f-6a5a-4b06-ac21-cca5d5804918)
![login](https://github.com/user-attachments/assets/008eb23d-e9e8-4c2b-b64a-b1c864b5402c)
![menu](https://github.com/user-attachments/assets/5e884e8d-1d9e-40c8-998f-53ac55c4a5f8)
![model](https://github.com/user-attachments/assets/fed4ec67-5c90-47be-9648-cb3c16874cc6)

[Open in Gitpod](https://gitpod.io/#https://github.com/Athis97/teacher-portal) to edit it and preview your changes with no setup required.

## Installation

Clone the repo locally:

```sh
git clone https://github.com/Athis97/teacher-portal.git teacher-portal && cd teacher-portal
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
