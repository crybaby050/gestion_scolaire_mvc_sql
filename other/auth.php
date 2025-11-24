<?php
session_start();
session_unset();
require_once __DIR__ . '/../other/init.php';
function loginUser($mail, $mdp)
{
    $mail = sanitize($mail);
    $mdp = sanitize($mdp);
    $errors = [];
    if (empty($mail)) {
        $errors['mail'] = 'Champ obligatoire';
    } else if (!is_email($mail)) {
        $errors['mail'] = 'Email invalide';
    }
    if (empty($mdp)) {
        $errors['mdp'] = 'Champ obligatoire';
    }
    if (empty($errors)) {
        $user = verifUser($mail);
        if ($user && $mdp === $user['mdp']) {
            $_SESSION['userConnect'] = $user;
            redirect('?page=dashboard');
        } else {
            $errors['verif'] = "Utilisateur introuvable ou mot de passe incorrect";
        }
    }
    return $errors;
}
function isLogged() {
    return isset($_SESSION['userConnect']);
}