<?php
require_once __DIR__ . '/../other/auth.php';
function loginPage()
{
    $errors = [];
    if (isset($_POST['log'])) {
        $errors = loginUser($_POST['mail'], $_POST['mdp']);
    }
    require_once __DIR__ . '/../view/login.php';
}
