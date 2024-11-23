<?php

function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception('.env file not found');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

// Load environment variables from .env file
loadEnv(__DIR__ . '/../../.env');

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('ROOT', 'http://localhost/test/remed-1.0/public');
} else {
    define('ROOT', 'http://example.com');
}

define('DBHOST', getenv('DBHOST'));
define('DBUSER', getenv('DBUSER'));
define('DBPASS', getenv('DBPASS'));
define('DBNAME', getenv('DBNAME'));

define('APP_NAME', "ReMed");
define('APP_DESC', "Healthcare solution");

// Define the base path
define('BASE_PATH', realpath(dirname(__FILE__) . '/../../'));

// true means debug mode on
define('DEBUG', true);
