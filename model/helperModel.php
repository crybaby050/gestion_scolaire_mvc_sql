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