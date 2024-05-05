<p align="center"><a href="https://gametime.ee" target="_blank"><img src="test/gametime_logo_orange.svg" width="280" height="280" alt="GameTime logo"></a></p>

<p align="center">
    <a href="https://github.com/avrokj/gametime/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
</p>

## Lühidalt GameTime-st / GameTime Overview

Täiustamisel / It will come...

## Lingid / Links

-   **[Taskutabloo GitHub BT_Scoreboard - ](https://github.com/avrokj/BT_Scoreboard)**
-   **[Test - test.gametime.ee](https://test.gametime.ee/)**
-   **[Webpage - gametime.ee](https://gametime.ee/)**

## Pildid / Pictures

![Pocket Scoreboard](test/gallery/images/new_old.png)
_Uus ja vana tabloo / New and old scoreboard_

![New and Old](test/gallery/images/pocket_scoreboard.png)
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
