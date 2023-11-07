<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Historial de la Calculadora</title>
    <style>
        h1 {
            font-size: 24px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            font-size: 18px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
        }

        a {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Historial de la Calculadora</h1>
    <ul>
        <?php
        // Conexión a la base de datos (reemplaza con tus propios datos)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "calculadora";

        $con = new mysqli($servername, $username, $password, $dbname);

        if ($con->connect_error) {
            die("Conexión fallida: " . $con->connect_error);
        }

        // Consulta para obtener el historial
        $sql = "SELECT * FROM calculator_history";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $operation = $row["operation"]; // Debe coincidir con el nombre de la columna de operación en tu base de datos
                echo "<li>" . $operation . " = " . $row["result"] . "</li>";
            }
            
        } else {
            echo "No hay historial disponible.";
        }

        $con->close();
        ?>
    </ul>
    <br>
    <a href="index.html">Volver a la calculadora</a>
</body>
</html>
