<?php
function is_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function redirect($url) {
    header("Location:".WEBROOT."$url");
    exit;
}
function sanitize($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES);
}
function verifUser($mail){
    $pdo = getPDO();
    $sql = "SELECT * FROM users WHERE mail =:mail LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':mail'=>$mail]);
    return $stmt->fetch();
}
function countElement($string){
    $pdo = getPDO();
    $sql = "SELECT COUNT(*) FROM $string";
    $stmt = $pdo->query($sql);
    return $stmt->fetchColumn();
}