<?php
require "cnx.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Proyecto Mixto</title>
</head>
<body>
    <h1>Hola desde PHP</h1>
    <p>Este sitio se conecta a la BD usando <code>.env</code></p>

    <script>
        const socket = new WebSocket("ws://localhost:<?=$_ENV['WS_PORT']?>/ws");
        socket.onopen = () => console.log("Conectado al WebSocket ✅");
        socket.onmessage = (msg) => console.log("Mensaje recibido:", msg.data);
    </script>
</body>
</html>
