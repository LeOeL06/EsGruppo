<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Inserisci Nuovo Utente</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Inserisci Nuovo Utente</h1>
    <!-- Form per l'inserimento di un nuovo utente -->
    <form action="inserisci_utente.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" required><br>
        <label for="indirizzo">Indirizzo:</label>
        <input type="text" id="indirizzo" name="indirizzo" required><br>
        <label for="citta">Città:</label>
        <input type="text" id="citta" name="citta" required><br>
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
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $indirizzo = $_POST["indirizzo"];
        $citta = $_POST["citta"];

        // Costruisce la query SQL
        $sql = "INSERT INTO utenti (Nome, Cognome, Indirizzo, Citta) VALUES ('$nome', '$cognome', '$indirizzo', '$citta')";

        // Esegue la query e visualizza il risultato
        if ($conn->query($sql) === TRUE) {
            echo "Nuovo utente inserito con successo.";
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
