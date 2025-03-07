<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Visualizza Bollette</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Visualizza Bollette</h1>
    <!-- Form per la ricerca delle bollette -->
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
    // Controlla se il form è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["data_inizio"]) && isset($_GET["data_fine"])) {
        // Connessione al database
        $conn = new mysqli("localhost", "root", "", "utenze");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Recupera i dati dal form
        $data_inizio = $_GET["data_inizio"];
        $data_fine = $_GET["data_fine"];
        $cognome = $_GET["cognome"];

        // Costruisce la query SQL
        $sql = "SELECT * FROM bollette WHERE Data BETWEEN '$data_inizio' AND '$data_fine'";
        if (!empty($cognome)) {
            $sql .= " AND CodUtente IN (SELECT Codice FROM utenti WHERE Cognome='$cognome')";
        }

        // Esegue la query e visualizza i risultati
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'><tr><th>Numero</th><th>CodUtente</th><th>Data</th><th>Importo</th><th>Consumo</th></tr>";
            $totale_importo = 0;
            $totale_consumo = 0;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Numero"] . "</td><td>" . $row["CodUtente"] . "</td><td>" . $row["Data"] . "</td><td>" . $row["Importo"] . "</td><td>" . $row["Consumo"] . "</td></tr>";
                $totale_importo += $row["Importo"];
                $totale_consumo += $row["Consumo"];
            }
            echo "</table>";
            echo "<p>Totale Importo: €" . $totale_importo . "</p>";
            echo "<p>Totale Consumo: " . $totale_consumo . " kWh</p>";
        } else {
            echo "Nessuna bolletta trovata.";
        }

        // Chiude la connessione al database
        $conn->close();
    }
    ?>
    <a href="index.php">Ritorna alla homepage</a>
</body>
</html>
