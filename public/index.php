<?php
// Composer Autoloader laden
require_once '../vendor/autoload.php';

// Klassen mit den Namespaces
use App\Controllers\ContactController;

$controller = new ContactController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->handleFormSubmission($_POST);
} else {
    $controller->showContactForm();
}   
