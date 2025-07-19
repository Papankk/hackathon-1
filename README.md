# Hackathon Voting App

## Introduction

Voting app created for education purposes

## Installation

Make sure you have Laravel 11 installed

### Step 1: Clone the Repository

```bash
git clone https://github.com/Papankk/hackathon-1.git
cd hackathon-1
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Set Up Environment File

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

### Step 4: Configure the Database

Open the `.env` file and update the database connection settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=voting_app
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Run Database Migrations

```bash
php artisan migrate
```

### Step 6: Seed the Database

```bash
php artisan db:seed
```

### Step 7: Start the Development Server

```bash
php artisan serve
```

Your Pegasus application should now be up and running. You can access it at `http://127.0.0.1:8000`.

### Step 8: Tes Login

```bash
Email: admin1
Password: admin123
```

## License
```This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.```


