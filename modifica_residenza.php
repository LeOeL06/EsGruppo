<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Residenza</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Modifica Residenza</h1>
    <!-- Form per la modifica della residenza -->
    <form action="modifica_residenza.php" method="post">
        <label for="codice_utente">Codice Utente:</label>
        <input type="text" id="codice_utente" name="codice_utente" required><br>
        <label for="nuovo_indirizzo">Nuovo Indirizzo:</label>
        <input type="text" id="nuovo_indirizzo" name="nuovo_indirizzo" required><br>
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
        $codice_utente = $_POST["codice_utente"];
        $nuovo_indirizzo = $_POST["nuovo_indirizzo"];

        // Costruisce la query SQL
        $sql = "UPDATE utenti SET Indirizzo='$nuovo_indirizzo' WHERE Codice='$codice_utente'";

        // Esegue la query e visualizza il risultato
        if ($conn->query($sql) === TRUE) {
            echo "Residenza aggiornata con successo.";
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
