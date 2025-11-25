<?php
require_once __DIR__ . '/../other/init.php';
function tableClasse()
{
    return $classes = getAllClasse();
}
function affiheEtudiant()
{
    if (isset($_GET['filt'])) {
        $fil = sanitize($_GET['fil']);

        if (empty($fil)) {
            return getAllEtudiant();
        } else {
            return filterEtudiantByClasse($fil);
        }
    } else {
        return getAllEtudiant();
    }
}

function listerEtudiants(){
    $etudiants = affiheEtudiant();
    $classes = tableClasse();
    require_once __DIR__ . '/../view/etudiant/etudiant.php';
}
function newEtudiant()
{
    if (isset($_POST['add-etu'])) {
        $nom = sanitize($_POST['nom']);
        $pre = sanitize($_POST['pre']);
        $mail = sanitize($_POST['mail']);
        $cls = sanitize($_POST['cls']);
        $tel = sanitize($_POST['tel']);
        $ads = sanitize($_POST['ads']);
        $error = [];
        // Validation
        if (empty($nom)) $error['nom'] = 'Champ obligatoire';
        if (empty($pre)) $error['pre'] = 'Champ obligatoire';
        if (empty($cls)) $error['cls'] = 'Champ obligatoire';
        if (empty($tel)) $error['tel'] = 'Champ obligatoire';
        if (empty($ads)) $error['ads'] = 'Champ obligatoire';
        if (empty($mail)) {
            $error['mail'] = 'Champ obligatoire';
        } else if (!is_email($mail)) {
            $error['mail'] = 'Mail invalide';
        }
        // Vérification des doublons
        $user_mail = verifUniqueUniversel($mail, 'email', 'etudiant');
        if ($user_mail) {
            $error['mail'] = 'Utilisateur déjà enregistré';
        }
        $user_tel = verifUniqueUniversel($tel, 'telephone', 'etudiant');
        if ($user_tel) {
            $error['tel'] = 'Numéro déjà occupé';
        }
        // Transformation de la classe
        $id_classe = getIdClasseByLibelle($cls);
        if (!$id_classe) {
            $error['cls'] = 'Classe invalide';
        }
        $success = "";
        if (empty($error)) {
            ajoutEtudiant($nom, $pre, $id_classe, $mail, $tel, $ads);
            $success = "Étudiant enregistré avec succès !";
        }
        return [$error, $success];
    }
}
