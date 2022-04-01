[![Codacy Badge](https://app.codacy.com/project/badge/Grade/91b7cd500fd64368bb58878729c7abd7)](https://www.codacy.com/gh/olpok/bilemo_api/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=olpok/bilemo_api&amp;utm_campaign=Badge_Grade)

# bilemo_api

About the project

RESTful API made with Symfony 5 and API Platform.
BileMo is a fake enterprise which offers mobile phones. This API give possibility to BileMo clients (BtoB) to consult BileMo products and to manage their own clients

This API :

- Offers Swagger doc

- Accepts and returns content in json format

- Offers a possibility to BileMo clients to consult BileMo products

- Offers the possibility to BileMo clients (Users) to create/read/delete their own clients (Customers)

 - Implements JWT token system to authenticate users

  - Is RESTful, respects level 1, 2 and 3 of Richardson Maturity Model
  - Is monitored by Codacy 

Requirements

PHP 8.0.13

Symfony 6.0.4 

MySQL 5.7.36 

Composer 2.2.6

1. Clone the repository: https://github.com/olpok/bilemo_api.git
2. Install dependencies: composer install
3. Create a .env.local file at the root of the project
4. Copy .env code and past in .env.local
5. Modify the line DATABASE_URL= with your login/password and your database name.
6. Create the database: php bin/console doctrine:database:create
7. Run first php bin/console make:migration then run php bin/console doctrine:migrations:migrate
8. Run php bin/console doctrine:fixtures:load
9. Generate your own SSL keys running (if needed see Lexik Documentation)
php bin/console lexik:jwt:generate-keypair
10. Start the internal server: php bin/console server:start
11. Go to "/api" to see the API documentation

Enjoy!
