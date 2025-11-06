<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'PHP Kontaktformular' ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include __DIR__ . '/partials/header.php'; ?>

    <main>
        <?= $content ?>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>