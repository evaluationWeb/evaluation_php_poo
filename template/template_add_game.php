<div class="container mt-4">
    <h2>Ajouter un jeu vidéo</h2>

    <!-- Affichage d'un message de succès ou d'erreur si défini dans le contrôleur -->
    <?php if (isset($data['valid'])): ?>
        <div class="alert alert-success"><?= $data['valid']; ?></div>
    <?php endif; ?>

    <?php if (isset($data['error'])): ?>
        <div class="alert alert-danger"><?= $data['error']; ?></div>
    <?php endif; ?>

    <!-- Formulaire avec action vide et méthode POST[cite: 5] -->
    <form action="" method="POST">
        
        <!-- Champ Titre -->
        <div class="mb-3">
            <label for="title" class="form-label">Titre du jeu</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <!-- Champ Type (Genre) -->
        <div class="mb-3">
            <label for="type" class="form-label">Type / Genre</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>

        <!-- Champ Date de publication -->
        <div class="mb-3">
            <label for="publish_at" class="form-label">Date de publication</label>
            <input type="date" class="form-control" id="publish_at" name="publish_at" required>
        </div>

        <!-- Liste déroulante pour choisir la console[cite: 5] -->
        <div class="mb-3">
            <label for="id_console" class="form-label">Console</label>
            <select class="form-control" id="id_console" name="id_console" required>
                <option value="">Sélectionner une console</option>
                <?php if (isset($data['consoles'])): ?>
                    <?php foreach ($data['consoles'] as $console): ?>
                        <option value="<?= $console['id']; ?>">
                            <?= htmlspecialchars($console['name']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <!-- Bouton de soumission[cite: 5] -->
        <button type="submit" class="btn btn-primary">Enregistrer le jeu</button>
    </form>
</div>