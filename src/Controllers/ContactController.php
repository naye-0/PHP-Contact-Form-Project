<?php

namespace App\Controllers;

use App\Models\Contact;
use PDOException;

class ContactController
{
    private $db;

    public function __construct()
    {
        // Datenbankverbindung laden
        require_once __DIR__ . '/../config/database.php';
        $this->db = $pdo;
    }

    public function showContactForm()
    {
        // Leere Variablen für sauberes Formular
        $name = $email = $message = "";
        $errors = [];
        
        // Prüfe auf success-Parameter für Erfolgsmeldung
        if (isset($_GET['success']) && $_GET['success'] == '1') {
            $successMessage = "Vielen Dank! Ihre Nachricht wurde erfolgreich gesendet!";
        }
        
        // Sammle Formular-Content
        ob_start();
        include __DIR__ . '/../views/contact-form.php';
        $formContent = ob_get_clean();
        
        // Sammle Tabellen-Content
        ob_start();
        $this->showContactsTable();
        $tableContent = ob_get_clean();
        
        // Kombiniere Content
        $content = $formContent . $tableContent;
        $pageTitle = "PHP Kontaktformular";
        
        // Zeige mit Layout
        include __DIR__ . '/../views/layout.php';
    }

    public function handleFormSubmission($postData)
    {
        $name = $email = $message = "";
        $errors = [];

        $name = trim($postData['name']);
        $email = trim($postData['email']);
        $message = trim($postData['message']);

        // Validation
        if (empty($name)) {
            $errors[] = "Name ist erforderlich.";
        }
        if (empty($email)) {
            $errors[] = "E-Mail ist erforderlich.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "E-Mail ist ungültig.";
        }
        if (empty($message)) {
            $errors[] = "Nachricht darf nicht leer sein.";
        }

        // If no errors, save to database
        if (empty($errors)) {
            $contact = new Contact($this->db);
            $contact->setName($name);
            $contact->setEmail($email);
            $contact->setMessage($message);

            try {
                $contact->save();
                // Nach erfolgreicher Speicherung: Redirect um POST-Daten zu löschen
                header('Location: ' . $_SERVER['PHP_SELF'] . '?success=1');
                exit();
            } catch (PDOException $e) {
                $errors[] = "Fehler beim Speichern der Nachricht: " . $e->getMessage();
            }
        }

        // Bei Fehlern: Zeige Formular mit Fehlern und erhaltenen Eingaben
        ob_start();
        include __DIR__ . '/../views/contact-form.php';
        $formContent = ob_get_clean();
        
        // Sammle Tabellen-Content
        ob_start();
        $this->showContactsTable();
        $tableContent = ob_get_clean();
        
        // Kombiniere Content
        $content = $formContent . $tableContent;
        $pageTitle = "PHP Kontaktformular - Fehler";
        
        // Zeige mit Layout
        include __DIR__ . '/../views/layout.php';
    }

    public function showContactsTable()
    {
        $contact = new Contact($this->db);
        $contacts = $contact->getAllContacts();
        include __DIR__ . '/../views/contacts-table.php';
    }
}