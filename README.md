# swiffy-ticket-system#
## Setup Instructions
1. Clone the repository.
2. Run `composer install`.
3. Configure the `.env` file.
4. Run migrations: `php artisan migrate`.
5. Run `npm install && npm run dev`.
6. Start the server: `php artisan serve`.

## prject structure
- blades are in the tickets directory of the resources, they are : -
  - index.blade.php
  - create.blade.php
  - edit.blade.php
  - show.blade.php

- Controller is named TicketController.php
- Model is named Ticket.php

## Author : Vincent-Mogale 
