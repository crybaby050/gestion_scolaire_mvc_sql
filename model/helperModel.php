<?php
function is_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function redirect($url) {
    header("Location: $url");
    exit;
}
function uniqueElement($nom){
    $pdo = getPDO();
    $sql = "SELECT * FROM article WHERE nom =:nom LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nom'=>$nom]);
    return $stmt->fetch();
}
function sanitize($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES);
}