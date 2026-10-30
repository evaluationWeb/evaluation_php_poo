<div class="container">
    <h1><?= isset($title) ? $title : 'Liste des jeux vidéo' ?></h1>

    <?php if (!empty($data['games'])): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type / Genre</th>
                    <th>Date de publication</th>
                    <th>Console</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['games'] as $game): ?>
                    <tr>
                        <td><?= htmlspecialchars($game['title']) ?></td>
                        <td><?= htmlspecialchars($game['type']) ?></td>
                        <td><?= htmlspecialchars($game['publish_at']) ?></td>
                        <td><?= htmlspecialchars($game['console_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun jeu vidéo n'a été enregistré pour le moment.</p>
    <?php endif; ?>

    <br>
   <a href="/game/add" class="btn btn-primary">Ajouter un jeu</a>
</div>