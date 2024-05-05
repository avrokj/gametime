<p align="center"><a href="https://gametime.ee" target="_blank"><img src="test/gametime_logo_orange.svg" width="280" height="280" alt="GameTime logo"></a></p>

<p align="center">
    <a href="https://github.com/avrokj/gametime/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
</p>

## Lühidalt GameTime-st / GameTime Overview

GameTime is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Lingid / Links

-   **[Taskutabloo GitHub BT_Scoreboard - ](https://github.com/avrokj/BT_Scoreboard)**
-   **[Test - test.gametime.ee](https://test.gametime.ee/)**
-   **[Webpage - gametime.ee](https://gametime.ee/)**

## Pildid / Pictures

![Pocket Scoreboard](assets/new_old.png)
_Uus ja vana tabloo / New and old scoreboard_

![New and Old](assets/pocket_scoreboard.png)
_Taskutabloo prototüübid / Pocket scoreboard prototypes_

## Paigaldamine / Installation

Clone the repository to your local machine:

`git clone <repository-url>`

Navigate to the project directory:

`cd gametime`

Install Composer dependencies:

`composer install`

Install NPM dependencies:

`npm install`

Copy the .env.example file to .env and configure your environment variables:

`cp .env.example .env`

Generate an application key:

`php artisan key:generate`

Run database migrations and seeders:

`php artisan migrate --seed`

Start the development server:

`php artisan serve`

Compile your project's assets:

`npm run dev`

Visit [http://localhost:8000](http://localhost:8000) in your web browser to view the application.

## Usage

The application allows users to make teams, add players, create games and make a schedule with statistics of each game.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
