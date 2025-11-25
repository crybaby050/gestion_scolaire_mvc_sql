<?php
require_once __DIR__ . '/../model/helperModel.php';
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
        <!-- Dashboard -->
        <li>
    <a href="?page=dashboard">
        <i class="fa-solid fa-house"></i>
        <span>Accueil</span>
    </a>
</li>

        <!-- Etudiants -->
        <li>
            <a href="?page=etudiant">
                <i class="fa-solid fa-users"></i>
                <span>Étudiants</span>
            </a>
        </li>

        <li>
            <a href="?page=add_etudiant">
                <i class="fa-solid fa-user-plus"></i>
                <span>Ajouter Étudiant</span>
            </a>
        </li>

        <!-- Classe -->
        <li>
            <a href="?page=classe">
                <i class="fa-solid fa-chalkboard"></i>
                <span>Classe</span>
            </a>
        </li>

        <li>
            <a href="?page=add_classe">
                <i class="fa-solid fa-plus"></i>
                <span>Ajouter Classe</span>
            </a>
        </li>

        <!-- Filière -->
        <li>
            <a href="?page=filiere">
                <i class="fa-solid fa-diagram-project"></i>
                <span>Filière</span>
            </a>
        </li>

        <!-- Niveau -->
        <li>
            <a href="?page=niveau">
                <i class="fa-solid fa-layer-group"></i>
                <span>Niveau</span>
            </a>
        </li>

        <!-- Déconnexion -->
        <li class="logout">
    <a href="?page=logout">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Déconnexion</span>
    </a>
</li>
    </ul>
</aside>
