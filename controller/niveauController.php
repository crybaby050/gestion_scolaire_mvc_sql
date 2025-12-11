<?php
function theNiveau(){
    if(isset($_POST['add_fil'])){
        $lib = sanitize($_POST['lib']);
        $error = "";
        if(empty($lib)){
            $error = 'Champ Obligatoire';
        }
        $test = verifUniqueUniversel($lib,'libelle','niveau');
        if($test){
            $error = 'Filiere déja présent';
        }
        // $succes = "";
        if(empty($error)){
            // $succes = "Filière enregistrer avec succée !";
            ajoutFiliere($lib);
            // return [$error,$succes];
            redirect('?page=niveau&msg=add-success');
        }
    }
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        deleteNiveau($id);
        redirect('?page=niveau&msg=rm-success');
    }
    $niveaux = getAllNiveau();
    require_once __DIR__ . '/../view/niveau/niveau.php';
}