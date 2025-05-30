<!doctype html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= BASE_URL ?>/output.css" rel="stylesheet">
    <title><?= $title ?> | Health Connection</title>
    <script src="https://kit.fontawesome.com/c88d790515.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= BASE_URL ?>/Js/editUserModal.js"></script>
</head>

<body class="min-h-screen flex flex-col bg-orange-50">
    <?php
    require_once(__DIR__ . "/../Components/header.php");
    ?>
    <main class="flex-1 container mx-auto px-4 py-6">
        <?= $content; ?>
    </main>
    <?php
    require_once(__DIR__ . "/../Components/footer.php");
    ?>
</body>

</html>