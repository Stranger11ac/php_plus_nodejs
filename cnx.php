<?php
require __DIR__ . '/vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/.."); // lee el .env desde la raíz
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db   = $_ENV['DB_NAME'];

$connStr = "host=$host dbname=$db user=$user password=$pass";

$conn = pg_connect($connStr);

if (!$conn) {
    die("❌ Error al conectar a PostgreSQL");
}

echo "✅ Conectado a la base de datos PostgreSQL desde PHP";
?>
