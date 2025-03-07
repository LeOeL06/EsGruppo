<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Inserisci Nuova Bolletta</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Inserisci Nuova Bolletta</h1>
    <!-- Form per l'inserimento di una nuova bolletta -->
    <form action="inserisci_bolletta.php" method="post">
        <label for="cod_utente">Codice Utente:</label>
        <input type="text" id="cod_utente" name="cod_utente" required><br>
        <label for="data">Data:</label>
        <input type="date" id="data" name="data" required><br>
        <label for="importo">Importo:</label>
        <input type="number" id="importo" name="importo" step="0.01" required><br>
        <label for="consumo">Consumo:</label>
        <input type="number" id="consumo" name="consumo" required><br>
        <input type="submit" value="Salva">
    </form>

    <?php
    // Controlla se il form è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connessione al database
        $conn = new mysqli("localhost", "root", "", "utenze");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Recupera i dati dal form
        $cod_utente = $_POST["cod_utente"];
        $data = $_POST["data"];
        $importo = $_POST["importo"];
        $consumo = $_POST["consumo"];

        // Costruisce la query SQL
        $sql = "INSERT INTO bollette (CodUtente, Data, Importo, Consumo) VALUES ('$cod_utente', '$data', '$importo', '$consumo')";

        // Esegue la query e visualizza il risultato
        if ($conn->query($sql) === TRUE) {
            echo "Nuova bolletta inserita con successo.";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }

        // Chiude la connessione al database
        $conn->close();
    }
    ?>
    <a href="index.php">Ritorna alla homepage</a>
</body>
</html>
