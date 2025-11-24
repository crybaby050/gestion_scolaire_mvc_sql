<?php
require_once __DIR__ . '/../model/etudiantModel.php';
function tableClasse(){
    return $classes = getAllClasse();
}
function affiheEtudiant(){
    if(isset($_GET['filt'])){
        $fil = sanitize($_GET['fil']);
        if(empty($fil)){
            return $etudiants = getAllEtudiant();
        }
        return $etudiants = filterEtudiantByClasse($fil);
    }else{
        return $etudiants = getAllEtudiant();
    }
}