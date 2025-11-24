<?php
require_once __DIR__ . '/../model/helperModel.php';
$user = verifUser('benthiam@gmail.com');
    $nameUser = $user['prenom'];

?>
<input type="checkbox" id="toggle">
<header class="header">
    <label for="toggle" class="menu-btn">☰</label>
    <div class="header-search">
        <h2>INSITIUE SUPERIEUR D'INFORMATIQUE</h2>
        <div class="profil">
            <p>Bonjour <strong><?= $nameUser ?></strong></p>
            <button>
                <img src="/../image/school logo.jpg" alt="">
            </button>
        </div>
    </div>
</header>

<aside class="sidebar">
    <div class="sidebar-header">
        <div>
            <img src="/../image/school logo.jpg" alt="">
        </div>
        <h2>ECOLE 221</h2>
    </div>
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Déconnexion</a></li>
    </ul>
</aside>

