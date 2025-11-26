<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?></title>
</head>

<body>
    <?php include 'component/navbar.php' ?>
    <main class="container">
        <h1>Ajouter un jeu</h1>
        <form action="" method="post">
            <fieldset>

                <label>Saisir le titre du jeu
                    <input type="text" name="title" placeholder="Saisir le titre du jeu">
                </label>

                <label>Saisir le type du jeu
                    <input type="text" name="type" placeholder="Saisir le type de jeu">
                </label>

                <label>Saisir la date de sortie

                    <input type="date" name="publish_at" aria-label="Choix de la date de sortie">
                </label>

                <label>Choisir la console
                    <select name="console_id" aria-label="Choisir la console">
                        <option disabled selected>Choisir une console...</option>


                        <?php foreach ($data["consoles"] as $console) : ?>
                            <option value="<?= $console["id"] ?>">
                                <?= $console["name"] ?> (<?= $console["manufacturer"] ?>)
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>

            </fieldset>

            <input type="submit" value="Ajouter" name="submit">
        </form>

        <p><?= $data["error"] ?? "" ?></p>
        <p><?= $data["valid"] ?? "" ?></p>
    </main>
</body>

</html>