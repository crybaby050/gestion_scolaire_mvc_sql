<?php
require_once __DIR__ . '/../model/etudiantModel.php';
require_once __DIR__ . '/../model/helperModel.php';
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
function newEtudiant(){
    if(isset($_POST['add-etu'])){
        $nom = sanitize($_POST['nom']);
        $pre = sanitize($_POST['pre']);
        $mail = sanitize($_POST['mail']);
        $id_classe = sanitize($_POST['cls']);
        $tel = sanitize($_POST['tel']);
        $ads = sanitize($_POST['ads']);
        $error = [];
        $verif = is_email($mail);
        if(!$verif){
            $error['mail'] = 'Mail invalide';
        }else if(empty($mail)){
            $error['mail'] = 'Champ obligatoire';
        }
        if(empty($nom)){
            $error['nom'] = 'Champ obligatoire';
        }
        if(empty($pre)){
            $error['pre'] = 'Champ obligatoire';
        }
        if(empty($id_classe)){
            $error['cls'] = 'Champ obligatoire';
        }
        if(empty($tel)){
            $error['tel'] = 'Champ obligatoire';
        }
        if(empty($ads)){
            $error['ads'] = 'Champ obligatoire';
        }
        if (empty($errors)) {
        $user = verifUser($mail);
        if ($user) {
            $error['mail']='Utilisateur déja enregistrer';
        } else {
            $errors['verif'] = "Utilisateur introuvable ou mot de passe incorrect";
        }
    }
    }
}