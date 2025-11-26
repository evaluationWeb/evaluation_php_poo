<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php include 'component/navbar.php'?>
    <main class="container">
        <h1>Liste des jeux</h1>

        <?php if (!empty($data['games'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Date de publication</th>
                        <th>Console</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['games'] as $game): ?>
                        <tr>
                            <td><?= htmlspecialchars($game['title'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($game['type'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($game['publish_at'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($game['console_name'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Aucun jeu enregistré pour le moment.</p>
        <?php endif; ?>
    </main>
</body>

</html>

