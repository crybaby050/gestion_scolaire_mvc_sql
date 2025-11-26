<?php
function is_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function redirect($url) {
    header("Location:".WEBROOT.$url);
    exit;
}
function sanitize($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES);
}
function verifUser($mail){
    $pdo = getPDO();
    $sql = "SELECT * FROM users WHERE mail =:mail LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mail'=>$mail]);
    return $stmt->fetch();
}
function countElement($string){
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) FROM $string";
    $stmt = $pdo->query($sql);
    return $stmt->fetchColumn();
}
function verifUniqueUniversel($str,$var,$tab){
    $pdo = getPDO();
    $sql = "SELECT * FROM $tab WHERE $var =:value LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['value'=>$str]);
    return $stmt->fetch();
}
function verifUniqueUniverselUpdate($value, $column, $table, $id) {
    $pdo = getPDO();
    $sql = "SELECT * FROM $table 
            WHERE $column = :value 
            AND id != :id
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'value' => $value,
        'id'    => $id
    ]);

    return $stmt->fetch();
}
function getAllEtudiant()
{
    $pdo = getPDO();
    $sql = "SELECT e.id,e.matricule,e.nom,e.prenom,e.email,e.telephone,e.adresse,c.libelle
    FROM etudiant AS e
    INNER JOIN classe AS c
    ON e.id_classe = c.id
    ORDER BY prenom ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllClasse()
{
    $pdo = getPDO();

    $sql = "SELECT 
                c.id,
                c.code,
                c.libelle,
                f.libelle AS filiere_libelle,
                n.libelle AS niveau_libelle
            FROM classe AS c
            INNER JOIN filiere AS f ON c.id_filiere = f.id
            INNER JOIN niveau AS n ON c.id_niveau = n.id
            ORDER BY c.libelle ASC";

    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllNiveau()
{
    $pdo = getPDO();
    $sql = "SELECT *FROM niveau";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllFiliere()
{
    $pdo = getPDO();
    $sql = "SELECT *FROM filiere";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function tableClasse()
{
    return $classes = getAllClasse();
}
function tableNiveau()
{
    return $niv = getAllNiveau();
}
function tableFiliere()
{
    return $fil = getAllFiliere();
}