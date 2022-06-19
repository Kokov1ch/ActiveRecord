<?php
    use App\Core;
    require_once dirname(__DIR__).'/vendor/autoload.php';
    $response = new Core\application();
    $response->run();