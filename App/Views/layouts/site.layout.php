<!doctype html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c88d790515.js" crossorigin="anonymous"></script>
</head>

<body class="bg-orange-50">
    <?php
    require_once(__DIR__ . "/../Components/header.php");
    ?>
    <?=
        $content;
    ?>
    <?php
    require_once(__DIR__ . "/../Components/footer.php");
    ?>
</body>

</html>