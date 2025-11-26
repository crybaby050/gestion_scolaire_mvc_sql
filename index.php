<?php
// define("WEBROOT", "http://localhost:8000/");
// require_once __DIR__ . '/config/data.php';
// require_once __DIR__ . '/other/header.php';
// require_once __DIR__ . '/other/sidebare.php';
// require_once __DIR__ . '/view/etudiant/detail.php';

session_start();

require_once __DIR__ . "/config/constants.php";
require_once __DIR__ . "/core/loader.php";
require_once __DIR__ . "/core/authGuard.php";
require_once __DIR__ . "/core/router.php";
