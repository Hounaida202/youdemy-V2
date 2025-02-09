<?php
namespace App\Controllers;

use App\models\users;

class UserController {
    public function index() {


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    $nom = $_POST["firstname"];
    $prenom = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirm-password"];
    $user_type = $_POST["role"];

    $errors = [];

    if (users::verifieremail($email)===true) {
        $errors[] = "L'email existe déjà.";
        echo "<script>alert('ixiste !');</script>";
    }

    if ($password !== $confirmpassword) {
        $errors[] = "Les mots de passe ne sont pas identiques.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $hashedconfirmPassword = password_hash($confirmpassword, PASSWORD_DEFAULT);
        $inscription = users::inscrireStudent($nom, $prenom, $email, $hashedPassword, $hashedconfirmPassword, $user_type);

        if (!$inscription) {
            echo "<script>alert('Merci , veuillez attendre 24 h jusqu'à ce que l'admin vous accepte!');</script>";
        } else {
            echo "<script>alert('Une erreur est survenue lors de l\'inscription.');</script>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
}

        require_once __DIR__ . '/../views/signup.php';
    }
}