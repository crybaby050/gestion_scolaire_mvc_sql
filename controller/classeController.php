<?php
function afficheClasse()
{
    if (isset($_GET['filt-niv'])) {
        $fil = sanitize($_GET['filniv']);
        if (empty($fil)) {
            return getAllClasse();
        } else {
            return filterClasseByNiveau($fil);
        }
    } else if(isset($_GET['filt-fil'])) {
        $fil = sanitize($_GET['filfil']);
        if (empty($fil)) {
            return getAllClasse();
        } else {
            return filterClasseByFiliere($fil);
        }
    }else{
        return getAllClasse();
    }
}

function listerClasse()
{
    // $etudiants = affiheEtudiant();
    $classes = tableClasse();
    $niveaux = tableNiveau();
    $filiere = tableFiliere();
    require_once __DIR__ . '/../view/classe/classe.php';
}
function newClasse()
{
    if (isset($_POST['add-cls'])) {
        $lib = sanitize($_POST['lib']);
        $code = sanitize($_POST['code']);
        $niv = sanitize($_POST['niv']);
        $fil = sanitize($_POST['fil']);
        $error = [];
        // Validation
        if (empty($lib)) $error['lib'] = 'Champ obligatoire';
        if (empty($code)) $error['code'] = 'Champ obligatoire';
        if (empty($niv)) $error['niv'] = 'Champ obligatoire';
        if (empty($fil)) $error['fil'] = 'Champ obligatoire';
        // Vérification des doublons
        $name_fil = verifUniqueUniversel($lib, 'libelle', 'classe');
        if ($name_fil) {
            $error['lib'] = 'classe déjà enregistré';
        }
        // Transformation de la classe
        $id_niveau = getIdNiveauByLibelle($niv);
        $id_filiere = getIdFiliereByLibelle($fil);
        if (!$id_niveau) {
            $error['niv'] = 'Niveau invalide';
        }
        if (!$id_filiere) {
            $error['fil'] = 'Filiere invalide';
        }
        $success = "";
        if (empty($error)) {
            ajoutClasse($lib,$code,$id_niveau,$id_filiere);
            $success = "Étudiant enregistré avec succès !";
        }
        return [$error, $success];
    }
}
function detailClasse()
{
    $id = $_GET['id'];
    $classe = findOneClasse($id);
    require_once __DIR__ . '/../view/classe/detail.php';
}

function SupprimerClasse()
{
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        deleteClasse($id);
        redirect('?page=etudiant&msg=success');
    }
}

function editClasse()
{
        $id = intval($_GET['id']);
        $classe = findOneClasse($id);
        $filieres = tableFiliere();
        $niveaux = tableNiveau();
        $error = [];
        $success = "";
    if (isset($_POST['mod-cls'])) {
        $lib = sanitize($_POST['lib']);
        $code = sanitize($_POST['code']);
        $niv = sanitize($_POST['niv']);
        $fil = sanitize($_POST['fil']);
        $error = [];
        // Validation
        if (empty($lib)) $error['lib'] = 'Champ obligatoire';
        if (empty($code)) $error['code'] = 'Champ obligatoire';
        if (empty($niv)) $error['niv'] = 'Champ obligatoire';
        if (empty($fil)) $error['fil'] = 'Champ obligatoire';
        // Vérification des doublons
        $existsClasse = verifUniqueUniverselUpdate($lib,'libelle','classe',$id);
        if ($existsClasse) {
            $error['lib'] = 'Nom déjà utilisé par une autre classe';
        }
        // Transformation de la filiere et niveau
        $id_niveau = getIdNiveauByLibelle($niv);
        $id_filiere = getIdFiliereByLibelle($fil);
        if (!$id_niveau) {
            $error['niv'] = 'Niveau invalide';
        }
        if (!$id_filiere) {
            $error['fil'] = 'Filiere invalide';
        }
        // -------- SI PAS D'ERREURS -> UPDATE --------
        if (empty($error)) {
            updateClasse($id,$lib,$code,$id_niveau,$id_filiere);
            redirect('?page=classe&msg=update-success');
            exit;
        }
    }
    require_once __DIR__ . '/../view/classe/edit.php';
}