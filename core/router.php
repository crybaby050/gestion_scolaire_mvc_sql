<?php
if ($page !== 'login') {
    require_once __DIR__ . '/../other/header.php'; 
    $nameUser = $_SESSION['userConnect']['prenom']." ".$_SESSION['userConnect']['nom'];
    require_once __DIR__ . '/../other/sidebare.php';   
}

switch ($page) {
    case 'login':
        loginPage(); 
        break;
    case 'dashboard':
        if (!isset($_SESSION['userConnect'])) {
            redirect('?page=login');
            exit;
        }
        afficherDashboard();
        break;
    case 'etudiant':
    $etudiants = affiheEtudiant();
    $classes = tableClasse();
    require_once __DIR__ . '/../view/etudiant/etudiant.php';
    break;
    case 'logout':
        session_destroy();
        header("Location: " . WEBROOT . "?page=login");
        exit;
    default:
        echo "Page introuvable.";
        break;
}



