<?php
if ($page !== 'login') {
    require_once __DIR__ . '/../other/header.php';
    $nameUser = $_SESSION['userConnect']['prenom'] . " " . $_SESSION['userConnect']['nom'];
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
    case 'add_etudiant':
        
        newEtudiant();
        break;
    case 'etudiant':
        SupprimerEtudiant();
        $etudiants = affiheEtudiant();
        $classes = tableClasse();
        require_once __DIR__ . '/../view/etudiant/etudiant.php';
        break;
        case 'update_etudiant':
            editEtudiant();
            break;
    case 'detail_etudiant':
        detailEtudiant();
        break;
    
    case 'add_classe':
        $niveaux = tableNiveau();
        $filieres = tableFiliere();
        list($error, $success) = newClasse();
        require_once __DIR__ . '/../view/classe/ajout.php';
        break;
    case 'classe':
        afficheClasse();
        break;
        case 'update_classe':
            editClasse();
            break;
    case 'detail_classe':
        detailClasse();
        break;
    case 'logout':
        session_destroy();
        header("Location: " . WEBROOT . "?page=login");
        exit;
    case 'filiere':
        theFiliere();
        break;
    case 'niveau':
        theNiveau();
        break;
    default:
        echo "Page introuvable.";
        break;
}
