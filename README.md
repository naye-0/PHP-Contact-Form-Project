# PHP Contact Form Project

This project is a simple PHP contact form application that allows users to submit their contact information, which is then saved to a database. The application uses PDO for database interactions and follows the MVC (Model-View-Controller) architecture.

## Project Structure

```
php-contact-form-project
├── src
│   ├── config
│   │   └── database.php          # Database connection settings
│   ├── models
│   │   └── Contact.php           # Contact model class
│   ├── controllers
│   │   └── ContactController.php  # Handles form submission and validation
│   └── views
│       │-- layout.php            # Main layout file
│       │-- contact-table.php     # Displays the list of contacts
│       ├── contact-form.php      # HTML structure for the contact form
│       └── partials
│           ├── header.php        # Header section of the HTML document
│           └── footer.php        # Footer section of the HTML document
├── public
│   ├── index.php                 # Entry point of the application
│   ├── css
│   │   └── styles.css            # CSS styles for the project
│   └── js
│       └── scripts.js            # JavaScript code for interactivity
├── database
│   └── migrations
│       └── create_contacts_table.sql # SQL statement to create contacts table
├── vendor                         # Dependencies installed via Composer
├── composer.json                  # Composer configuration file
└── README.md                      # Project documentation
```

## Setup Instructions

1. **Clone the Repository**: Clone this repository to your local machine.

2. **Install Dependencies**: Navigate to the project directory and run:
   ```
   composer install
   ```

3. **Database Configuration**: Update the database connection settings in `src/config/database.php` to match your database credentials.

4. **Create Database**: Run the SQL migration to create the contacts table. You can execute the SQL file located at `database/migrations/create_contacts_table.sql` in your database management tool.

5. **Run the Application**: Start a local server (e.g., using PHP's built-in server) and navigate to `public/index.php` to access the contact form.

## Usage Guidelines

- Fill out the contact form with your name, email, and message.
- Upon submission, the form will validate the input and display any errors.
- If the submission is successful, the contact information will be saved to the database.

## License

This project is open-source and available under the MIT License.# PHP-Contact-Form-Project
# PHP-Contact-Form-Project
