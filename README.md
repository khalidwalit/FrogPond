<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

This project is using Laravel Sail v8.

## Prerequisites

In order to get started with Laravel Sail, all that you need is to have Docker and Docker Compose installed on your Laptop or your server.

## Installing And Setting Up Laravel Sail

Clone and pull this project to ur machine.

Run this command :
curl -s https://laravel.build/frogpond | bash

By default, Sail commands are invoked using the vendor/bin/sail

Run:
alias sail='bash vendor/bin/sail'

What this does is it sets sail to point to the vendor/bin/sail script, so that you can execute Sail commands without having to type vendor/bin each time.

## Laravel Sail Commands

sail up :to run the docker container.
sail up -d :to run in detact mode. -d stand for detached
sail down :to turn down the docker container.

Normally will use php artisan migrate.
By using sail, can easily just use command like
example:
sail php --version
sail artisan migrate

### API Available

- **[get] /frogs** Retreive all frogs registered in the app.
- **[get] /frogs/{id}** Retreive specific frog by send an id.
- **[post] /frogs** Save new frog to app.
- **[Parameters require:]**
- name [string]
- gender [string]
- date_of_birth [date]
- date_of_death [date] [nullable]
- pond_number [int]
- **[put] /frogs/{id}** Update frog information based on id.
- **[Parameters require:]**
- name [string]
- gender [string]
- date_of_birth [date]
- date_of_death [date] [nullable]
- pond_number [int]
- **[delete] /frogs/{id}** Delete frog information.

- **[get] /ponds** Retreive all ponds registered in the app.
- **[get] /ponds/{id}** Retreive specific ponds by send an id.
- **[post] /ponds** Save new pond to app.
- **[Parameters require:]**
- pond_name [string]
- capacity [int]
- current_size [int]
- **[put] /ponds/{id}** Update ponds information based on id.
- **[Parameters require:]**
- pond_name [string]
- capacity [int]
- current_size [int]
- **[delete] /ponds/{id}** Delete pond information. *note: pond must be empty before be deleted.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
