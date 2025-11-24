<?php
// Affichage du header et sidebar si l'utilisateur est connecté
if ($page !== 'login') {
    require_once '/../other/header.php';        // <-- adapte le chemin
    $nameUser = $_SESSION['userConnect'];
    require_once '/../other/sidebare.php';     // <-- adapte le chemin
}

// Routeur principal
switch ($page) {
    // Page de connexion
    case 'login':
        require_once 'controllers/loginController.php'; // inclut ton controller
        loginUser(); // fonction à définir dans le controller pour afficher le formulaire
        break;
    // Dashboard
    case 'dashboard':
        if (!isset($_SESSION['userConnect'])) {
            header("Location: " . WEBROOT . "?page=login");
            exit;
        }
        afficherDashboard(); // fonction du controllerDashboard.php
        break;
    // Déconnexion
    case 'logout':
        session_destroy();
        header("Location: " . WEBROOT . "?page=login");
        exit;
    // Pages non trouvées
    default:
        echo "Page introuvable.";
        break;
}