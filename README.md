# Sistem Informasi Madrasah Terpadu (SIMADU)

## Case Study

Coming soon.

## Getting Started

### Pre-requisite

-   [XAMPP](https://www.apachefriends.org/download.html) PHP 7.2.5 ++
-   [NPM](https://nodejs.org/en/download/)
-   [Git / Git Bash](https://git-scm.com/downloads)
-   [Composer](https://getcomposer.org/download/)
-   Familiar with mySQL and PHP

### Installation

1. [Clone the Repository](#clone-repo)
2. [Setting up a Virtual Host](#vhost)
3. [Database Configuration](#database)
4. [Populating the Database with some dummy data (optional)](#seeder)
5. [Check the App](#check)

#### 1. Clone the Repository <a name="clone-repo"></a>

a. Go to `C:/xampp/htdocs`

```bash
cd 'C:/xampp/htdocs'
```

b. Clone the Repository

```bash
git clone https://github.com/BakulApps/simadu.git
```

c. Go to the `sumadu` directory

```bash
cd 'spccweb'
```

d. Install Dependencies

```bash
composer install
```

#### 2. Setting up a Virtual Host <a name="vhost"></a>

a. Go to `C:/xampp/apache/conf/extra/httpd-vhosts.conf`. Edit then save.

```
# At the bottom of the file

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/spccweb/public"
    ServerName simadu.sch.id
</VirtualHost>
```

b. Open Notepad as **Administrator**. Then Open File: `C:/Windows/System32/drivers/etc/hosts`. Edit then save.

```
# At the bottom of the file

127.0.0.1 localhost
127.0.0.1 simadu.sch.id
```

#### 3. Database Configuration <a name="database"></a>

a. Run both `Apache` and `mySQL` in the XAMPP Control Panel.

b. Go to `localhost/phpmyadmin` in your browser. Then login and create a database named `madrasah_simadu`. In the main directory of `simadu`, find `.env.example`. Open it and update the database information below. After that, save it as `.env`.

> **Note**
>
> The default credentials for the phpMyAdmin are:
>
> username: root
>
> password:
>
> _You can leave the password blank._

```
APP_NAME='Sistem Informasi Madrasah Terpadu (SIMADU)'
...
DB_DATABASE=madrasah_simadu
DB_USERNAME=myUsername
DB_PASSWORD=myPassword
```

c. Generate the Application Key

```bash
php artisan key:generate
```

d. Reset the Database if you have already ran the Database Migration at least once, else proceed to the next step.

```bash
php artisan migrate:reset
```

e. Run the Database Migration

```
php artisan migrate
```

#### 4. Populating the Database with some dummy data (optional) <a name="seeder"></a>

a. Populate the Database by running the Database Seeder. A dummy data has been provided.

```
composer dump-autoload
```

```
php artisan db:seed
```

b. Create a symbolic link:

```bash
php artisan storage:link
```

c. In the root directory of the repository, go to `public/storage/`. create both `sites/graduate/images/qr`.

d After that you're all set! You may now use the dummy accounts.

##### Dummy Accounts

**Admin**

username: administrator

password: admin12345

#### 5. Check the App <a name="check"></a>

a. Open a browser and go to `simadu.sch.id`. Make sure that both `Apache` and `MySQL` are running on the XAMPP Control Panel.

b. Try to login.

c. Congrats! You're all set.


## Built With

### Main Techs

-   HTML, CSS, JavaScript, PHP and MySQL
-   [Laravel](https://laravel.com/) - The web framework used
-   [jQuery](https://jquery.com/) - JavaScript library
-   [Bootstrap](https://getbootstrap.com/) - CSS Framework

### OS Techs

- BakulApps
