<?php
function theFiliere(){
    if(isset($_POST['add_fil'])){
        $lib = sanitize($_POST['lib']);
        $error = "";
        if(empty($lib)){
            $error = 'Champ Obligatoire';
        }
        $test = verifUniqueUniversel($lib,'libelle','filiere');
        if($test){
            $error = 'Filiere déja présent';
        }
        $succes = "";
        if(empty($error)){
            $succes = "Filière enregistrer avec succée !";
            redirect('?page=filiere&msg=add-success');
        }
        return [$error,$succes];
    }
    $filieres = getAllFiliere();
    require_once __DIR__ . '/../view/filiere/filiere.php';
}