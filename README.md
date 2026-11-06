# Controle de Finanças

Personal finance web app for recording income and expenses and viewing monthly balances, built with plain PHP and MySQL. It is an older project from 2016 that predates current security practices and should not be deployed as is. The interface is in Portuguese.

## Technology

- **PHP without a framework:** each page handles its own request and mixes HTML with server-side logic.
- **MySQL through `mysqli`:** stores data in two tables, `usuarios` for users and `receita_despesas` for income and expense records.
- **PHP sessions:** keep users signed in, and a shared include checks the session on protected pages.
- **PHP GD:** generates the captcha image.
- **SQL queries for reports:** the monthly balance pages query fixed and variable income and expenses separately.

## Features

- Login and logout.
- Adding, editing and deleting income and expense records.
- Monthly balance reports.

## Running locally

You need PHP with the `mysqli` and GD extensions and MySQL, for example through XAMPP.

1. Copy the project to your web server folder.
2. Create a database and import `gerenciador_de_financas.sql`.
3. Update the database connection settings to match your environment.
4. Open `index.php` through your local server.
