<?php
$errors = [];
if (isset($_POST['log'])) {
    $errors = loginUser($_POST['mail'], $_POST['mdp']);
}
