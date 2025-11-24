<?php
require_once __DIR__ . '/../../controller/etudiantController.php';
$etudiant = findOneEtudiant(8) ?>
<div class="etu-details-wrapper">
    <div class="banner"></div>
    <div class="etu-details-card">
        <!-- Image décorative -->
        <div class="etu-details-decor">
            <img src="/../image/school logo.jpg" alt="Décor" class="etu-details-img">
        </div>
        <!-- Nom + Matricule -->
        <div class="etu-details-header">
            <h2 class="etu-details-name"><?= $etudiant['prenom'] . " " . $etudiant['nom'] ?></h2>
            <span class="etu-details-id"><?= $etudiant['matricule'] ?></span>
        </div>
        <!-- Informations -->
        <div class="etu-details-info">
            <div class="etu-details-group">
                <h3>Informations Académiques</h3>
                <p><strong>Classe :</strong> <?= $etudiant['classe'] ?></p>
                <p><strong>Filière :</strong> <?= $etudiant['filiere'] ?></p>
                <p><strong>Niveau :</strong> <?= $etudiant['niveau'] ?></p>
            </div>
            <div class="etu-details-group">
                <h3>Informations Personnelles</h3>
                <p><strong>Email :</strong>  <?= $etudiant['email'] ?></p>
                <p><strong>Téléphone :</strong> <?= $etudiant['telephone'] ?></p>
                <p><strong>Adresse :</strong> <?= $etudiant['adresse'] ?></p>
            </div>
        </div>
        <!-- Boutons d'action -->
        <div class="etu-details-actions">
            <a href="liste.php" class="btn return">Retour à la liste</a>
            <a href="edit.php?id=1" class="btn edit">Modifier</a>
            <a href="delete.php?id=1" class="btn delete">Supprimer</a>
        </div>
    </div>
</div>
