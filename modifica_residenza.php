<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Residenza</title>
</head>
<body>
    <h1>Modifica Residenza</h1>
    <form action="modifica_residenza.php" method="post">
        <label for="codice_utente">Codice Utente:</label>
        <input type="text" id="codice_utente" name="codice_utente" required><br>
        <label for="nuovo_indirizzo">Nuovo Indirizzo:</label>
        <input type="text" id="nuovo_indirizzo" name="nuovo_indirizzo" required><br>
        <input type="submit" value="Salva">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli("localhost", "root", "", "utenze");
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        $codice_utente = $_POST["codice_utente"];
        $nuovo_indirizzo = $_POST["nuovo_indirizzo"];

        $sql = "UPDATE utenti SET Indirizzo='$nuovo_indirizzo' WHERE Codice='$codice_utente'";

        if ($conn->query($sql) === TRUE) {
            echo "Residenza aggiornata con successo.";
        } else {
            echo "Errore: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
    <a href="index.php">Ritorna alla homepage</a>
</body>
</html>
