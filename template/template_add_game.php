<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?? "" ?></title>
</head>

<body>
    <?php include 'component/navbar.php' ?>
    <main class="container">
        <h1>Ajouter un jeu</h1>
        <form action="" method="post">
            <fieldset>
                <label>Saisir le titre du jeu
                    <input type="text" name="title" placeholder="Saisir le titre du jeu"
                        aria-label="titre du jeu">
                </label>
                <label>Saisir le type du jeu
                    <textarea name="type" placeholder="Saisir le type de jeu"
                        aria-label="type du jeu">
                </textarea>
                </label>
                <label>Saisir la date de sortie
                    <input type="datetime-local" name="publish_at" aria-label="Choix de la date de sortie">
                </label>
                <select aria-label="Sélectionner les consoles..." multiple size="4" name="consoles[]">
                    <option disabled>Sélectionner les consoles...</option>
                    <?php foreach ($data["consoles"] as $console): ?>
                        <option value="<?= $console->getId() ?>">
                            <?= htmlspecialchars($console->getName()) ?> (<?= htmlspecialchars($console->getManufacturer()) ?>)
                        </option>
                    <?php endforeach ?>
                </select>
            </fieldset>
            <fieldset>
                <input type="submit" value="Ajouter" name="submit">
            </fieldset>
        </form>
        <p><?= $data["error"] ?? "" ?></p>
        <p><?= $data["valid"] ?? "" ?></p>
    </main>
</body>

</html>