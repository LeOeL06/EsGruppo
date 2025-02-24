<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Residenza</title>
</head>
<body>
    <h1>Modifica Residenza</h1>
    <form action="salva_residenza.php" method="post">
        <label for="codice_utente">Codice Utente:</label>
        <input type="text" id="codice_utente" name="codice_utente" required><br>
        <label for="nuovo_indirizzo">Nuovo Indirizzo:</label>
        <input type="text" id="nuovo_indirizzo" name="nuovo_indirizzo" required><br>
        <input type="submit" value="Salva">
    </form>
</body>
</html>
