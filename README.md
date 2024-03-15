# Vehicle Booking Web Application

## Tags

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/subodhdhyani/Vehicle-Booking-Web-Application/blob/master/LICENSE)
[![Laravel](https://img.shields.io/badge/Laravel-v10.0.0-red.svg)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-v8.0-blue.svg)](https://www.mysql.com/)
[![Stripe](https://img.shields.io/badge/Stripe-v13.13.0-blue.svg)](https://stripe.com/)
[![HTML](https://img.shields.io/badge/HTML-5-orange.svg)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)


## Application Name : Corbett Car Booking

## Introduction
This repository contains the source code for a web application built with Laravel in the backend, MySQL database, jQuery, Bootstrap, and Laravel Blade templates in the frontend. The application allows users to book vehicles online and includes admin functionalities such as adding vehicles and managing bookings etc.

## Requirements
- PHP v>=8.0(wamp or xampp)
- Laravel v10
- Composer
- MySQL v>=8.0
- Stripe account (for payment gateway integration)

## Usage
### User
- Users can visit the web application and browse available vehicles.
- Users can book a vehicle online by providing necessary details and make a Payment.
- User can download the booking Receipt.

### Admin
- Admin can log in to the admin panel using credentials.
- Once logged in, admin can manage vehicles (add, edit, delete).
- Admin can view and manage bookings made by users.
- Admin can accept and reject the booking.
- Admin can refund the payment to the user if booking is canceled.
- Admin can configure settings such as payment gateway, send newsletters, etc.

## Technologies Used
- Laravel: Backend framework for PHP.
- MySQL: Relational database management system.
- jQuery: JavaScript library for DOM manipulation.
- Bootstrap: Frontend framework for responsive design.
- Laravel Blade Template: Templating engine for Laravel.
- Stripe: Payment gateway for processing payments securely.

## Authentication
- Admin authentication is handled using Laravel's built-in authentication system (created Custom Guard).
- Only authenticated admin users can access the admin panel.

## Payment Gateway Integration (Stripe)
- Payment gateway integration is done using the Stripe PHP library.
- Users can make payments securely using Stripe's checkout.

## Changes in Project:
- Set the Stripe key inside `.env`.
- Create Database named `Corbett_Car_Booking`.
- Set/Change the WhatsApp, email, and contact details in UI.
- For the admin credentials setup, it has a signup route and form. After setting the admin cred, remove/hide this from the application.

## Installation

1. **Clone the repository:**
    ```sh
    https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application.git
    ```

2. **Install Composer dependencies:**
    ```sh
    composer install
    ```

3. **Copy `.env.example` to `.env` and update the environment variables:**
    ```sh
    cp .env.example .env
    ```

4. **link storage directory to the public director:**
    ```sh
   php artisan storage:link
    ```
5. **Generate application key:**
    ```sh
    php artisan key:generate
    ```

6. **Update `.env` with your database and Stripe API keys.**

7. **Run database migrations:**
    ```sh
    php artisan migrate
    ```

8. **Serve the application:**
    ```sh
    php artisan serve
    ```

9. **Access the application in your browser at [http://localhost:8000](http://localhost:8000).**



## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributors
- [Subodh Dhyani](https://github.com/subodhdhyani)

## Snapshot
- [Home Page Small Screen](https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application/assets/84286795/2f83ef6c-5933-4a1f-ae73-901788aa9f4b)
- [Home Page Large Screen](https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application/assets/84286795/268ccf17-4702-4092-b7e4-872f52ff6329)
- [Booking Page Small Screen](https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application/assets/84286795/2a46b254-9a72-4fde-92e1-e84e95ed8432)
- [Booking Page Large Screen](https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application/assets/84286795/df4ac135-c02a-4e58-a6e7-df577569d482)
- [Admin Dashboard Small Screen](https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application/assets/84286795/7e7024d1-02fa-4101-9b73-0cd5879fe007)
- [Admin Dashboard Large Screen](https://github.com/Subodhdhyani/Vehicle-Booking-Web-Application/assets/84286795/cb2d9a86-bced-4186-9e80-75ed99774abd)
