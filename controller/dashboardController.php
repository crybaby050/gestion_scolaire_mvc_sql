<?php 
    require_once __DIR__ . '/../other/init.php' ;
    
    function afficherDashboard(){
    $etu = countElement('etudiant');
    $classe = countElement('classe');
    $niv = countElement('niveau');
    $fil = countElement('filiere');
    require_once __DIR__ . "/../view/dashboard/dashboard.php";
    }