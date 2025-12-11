<?php
// require_once __DIR__ . '/../other/init.php';
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

function listerEtudiants()
{
    $etudiants = affiheEtudiant();
    $classes = tableClasse();
    require_once __DIR__ . '/../view/etudiant/etudiant.php';
}
function newEtudiant()
{
    $classes = tableClasse();
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
        if (empty($error)) {
            ajoutEtudiant($nom, $pre, $id_classe, $mail, $tel, $ads);
            // return [$error, $success];
            redirect('?page=etudiant&msg=add-succes');
        }
    }
    require_once __DIR__ . '/../view/etudiant/ajout.php';
}
function detailEtudiant()
{
    $id = $_GET['id'];
    $etudiant = findOneEtudiant($id);
    require_once __DIR__ . '/../view/etudiant/detail.php';
}

function SupprimerEtudiant()
{
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        deleteEtudiant($id);
        redirect('?page=classe&msg=success');
    }
}

function editEtudiant()
{
    $id = intval($_GET['id']);
    $etudiant = findOneEtudiant($id); // Charger l'étudiant actuel
    $classes = tableClasse(); // Pour la liste déroulante
    $error = [];
    $success = "";
    if (isset($_POST['mod-etu'])) {
        $nom = sanitize($_POST['nom']);
        $pre = sanitize($_POST['pre']);
        $mail = sanitize($_POST['mail']);
        $cls = sanitize($_POST['cls']);
        $tel = sanitize($_POST['tel']);
        $ads = sanitize($_POST['ads']);
        // -------- VALIDATION --------
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
        // -------- VERIFICATION DOUBLONS --------
        $existsEmail = verifUniqueUniverselUpdate($mail, 'email', 'etudiant', $id);
        if ($existsEmail) {
            $error['mail'] = 'Email déjà utilisé par un autre étudiant';
        }
        $existsTel = verifUniqueUniverselUpdate($tel, 'telephone', 'etudiant', $id);
        if ($existsTel) {
            $error['tel'] = 'Numéro déjà utilisé par un autre étudiant';
        }
        // -------- TRANSFORMATION DE LA CLASSE --------
        $id_classe = getIdClasseByLibelle($cls);
        if (!$id_classe) {
            $error['cls'] = 'Classe invalide';
        }
        // -------- SI PAS D'ERREURS -> UPDATE --------
        if (empty($error)) {
            updateEtudiant($id, $nom, $pre, $mail, $id_classe, $tel, $ads);
            redirect('?page=etudiant&msg=update-success');
            exit;
        }
    }
    // Charger la vue
    require_once __DIR__ . '/../view/etudiant/edit.php';
}
