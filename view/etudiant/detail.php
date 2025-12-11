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
            <a href="?page=etudiant" class="btn return">Retour à la liste</a>
            <a href="?page=update_etudiant&id=<?= $etudiant['id'] ?>" class="btn edit">Modifier</a>
            <a href="?page=etudiant&delete=<?= $etudiant['id'] ?>" class="btn delete" onclick="return confirm('Êtes-vous sur de vouloir supprimer cette etudiants ?')">Supprimer</a>
        </div>
    </div>
</div>
