<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora - Historial</title>
</head>
<body>
    <h1>Calculadora - Historial</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $operation = $_POST["operation"];
        $result = eval('return ' . $operation . ';');
        
        // Conexión a la base de datos (reemplaza con tus propios datos)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "calculadora";
        
        $con = new mysqli($servername, $username, $password, $dbname);
        
        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }
        
        // Guardar la operación en el historial
        $sql = "INSERT INTO calculator_history (operation, result) VALUES ('$operation', '$result')";
        $con->query($sql);
        
        echo "Resultado: $result";
        
        $con->close();
    }
    ?>
    <br>
    <a href="index.html">Volver a la calculadora</a>
</body>
</html>
