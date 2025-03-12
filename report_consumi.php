<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Report Consumi per Città</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Report Consumi per Città</h1>
    <!-- Form per la selezione del periodo -->
    <form action="report_consumi.php" method="post">
        <label for="data_inizio">Data Inizio:</label>
        <input type="date" id="data_inizio" name="data_inizio" required><br>
        <label for="data_fine">Data Fine:</label>
        <input type="date" id="data_fine" name="data_fine" required><br>
        <input type="submit" value="Genera Report">
    </form>

    <?php
    // Controlla se il form è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connessione al database
        $conn = new mysqli("localhost", "root", "", "utenze");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Recupera le date dal form
        $data_inizio = $_POST["data_inizio"];
        $data_fine = $_POST["data_fine"];

        // Costruisce la query SQL
        $sql = "SELECT u.Citta, SUM(b.Consumo) AS ConsumoTotale 
                FROM bollette b 
                JOIN utenti u ON b.CodUtente = u.Codice 
                WHERE b.Data BETWEEN '$data_inizio' AND '$data_fine' 
                GROUP BY u.Citta";

        // Esegue la query e visualizza il risultato
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>Città</th><th>Consumo Totale</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Citta"] . "</td><td>" . $row["ConsumoTotale"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "Nessun risultato trovato.";
        }

        // Chiude la connessione al database
        $conn->close();
    }
    ?>
    <a href="index.php">Ritorna alla homepage</a>
</body>
</html>
