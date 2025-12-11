<div class="fil-content">
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'add-success'): ?>
        <div class="popup-success">
            Niveau enregistrer avec succès !
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'rm-success'): ?>
        <div class="popup-success">
            Niveau supprimer avec succès !
        </div>
    <?php endif; ?>
    <div class="filajout">
        <h3>Ajouter un niveau</h3>
        <div class="filform">
            <form action="" method="post">
                <div>
                    <input type="text" placeholder="Nouveau niveau" name="lib">
                <p><?= $error ?? "" ?></p>
                </div>
                <!-- bcGtdMil08    ne pas supprimer mot de passe de compte -->
                <button type="submit" name="add_fil">Ajouter</button>
            </form>
        </div>
    </div>
    <div class="filist">
        <h3>Liste des niveaux</h3>
        <div class="filcard">
            <?php foreach($niveaux as $niveau): ?>
            <div class="fil-card">
                <div class="fil-elem">
                    <div class="nivicone">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <div class="fil-info">
                        <div class="filem">
                            <span><strong>Libelle :</strong><?= $niveau['libelle'] ?></span>
                            <span><strong>Nombre de classe Associer :</strong><?= countClasseFromNiveau($niveau['id']) ?></span>
                        </div>
                        <div class="detail-fil">
                            <!-- <a href="#" class="det-fil"><i class="fas fa-eye"></i></a> -->
                            <a href="?page=niveau&delete=<?= $niveau['id'] ?>" class="rem-fil"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>