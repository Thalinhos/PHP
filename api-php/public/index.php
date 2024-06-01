<?php
require __DIR__ . '/../src/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
route($uri, null);

