<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . "/Core/Controller.php");
require_once(__DIR__ . "/Core/Orm.php");
require_once(__DIR__ . "/Services/Database.php");
require_once(__DIR__ . "/router.php");
require_once(__DIR__ . "/config.php");