<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Visualizza Bollette</title>
</head>
<body>
    <h1>Visualizza Bollette</h1>
    <form action="visualizza_bollette.php" method="get">
        <label for="data_inizio">Data Inizio:</label>
        <input type="date" id="data_inizio" name="data_inizio" required><br>
        <label for="data_fine">Data Fine:</label>
        <input type="date" id="data_fine" name="data_fine" required><br>
        <label for="cognome">Cognome Utente:</label>
        <input type="text" id="cognome" name="cognome"><br>
        <input type="submit" value="Cerca">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["data_inizio"]) && isset($_GET["data_fine"])) {
        // Connessione al database
        $conn = new mysqli("localhost", "root", "", "utenze");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $data_inizio = $_GET["data_inizio"];
        $data_fine = $_GET["data_fine"];
        $cognome = $_GET["cognome"];

        $sql = "SELECT * FROM bollette WHERE data BETWEEN '$data_inizio' AND '$data_fine'";
        if (!empty($cognome)) {
            $sql .= " AND utente_id IN (SELECT id FROM utenti WHERE Cognome='$cognome')";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'><tr><th>ID</th><th>Utente ID</th><th>Data</th><th>Importo</th><th>Consumo</th></tr>";
            $totale_importo = 0;
            $totale_consumo = 0;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["utente_id"] . "</td><td>" . $row["data"] . "</td><td>" . $row["importo"] . "</td><td>" . $row["consumo"] . "</td></tr>";
                $totale_importo += $row["importo"];
                $totale_consumo += $row["consumo"];
            }
            echo "</table>";
            echo "<p>Totale Importo: €" . $totale_importo . "</p>";
            echo "<p>Totale Consumo: " . $totale_consumo . " kWh</p>";
        } else {
            echo "Nessuna bolletta trovata.";
        }

        $conn->close();
    }
    ?>
</body>
</html>
