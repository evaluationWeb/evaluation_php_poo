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
        <h1>Ajouter un jeu</h1>

        <?php if (!empty($data['error'])): ?>
            <p><?= htmlspecialchars($data['error'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <?php if (!empty($data['valid'])): ?>
            <p><?= htmlspecialchars($data['valid'], ENT_QUOTES, 'UTF-8') ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <div>
                <label for="title">Titre</label>
                <input type="text" id="title" name="title">
            </div>

            <div>
                <label for="type">Type</label>
                <input type="text" id="type" name="type">
            </div>

            <div>
                <label for="publish_at">Date de publication</label>
                <input type="date" id="publish_at" name="publish_at">
            </div>

            <div>
                <label for="id_console">Console</label>
                <select id="id_console" name="id_console">
                    <?php if (!empty($data['consoles'])): ?>
                        <?php foreach ($data['consoles'] as $console): ?>
                            <option value="<?= htmlspecialchars($console['id'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($console['name'], ENT_QUOTES, 'UTF-8') ?> (<?= htmlspecialchars($console['manufacturer'], ENT_QUOTES, 'UTF-8') ?>)
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>

            <div>
                <button type="submit" name="submit">Ajouter</button>
            </div>
        </form>
    </main>
</body>

</html>

