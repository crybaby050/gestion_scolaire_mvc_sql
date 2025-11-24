<?php

$page = $_GET['page'] ?? 'login';

if (!isset($_SESSION["userConnect"]) && $page !== 'login') {
    header("Location: " . WEBROOT . "?page=login");
    exit;
}
