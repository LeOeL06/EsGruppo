<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modifica Residenza</title>
</head>
<body>
    <h1>Modifica Residenza</h1>
    <form action="salva_residenza.php" method="post">
        <label for="utente_id">ID Utente:</label>
        <input type="text" id="utente_id" name="utente_id" required><br>
        <label for="nuova_residenza">Nuova Residenza:</label>
        <input type="text" id="nuova_residenza" name="nuova_residenza" required><br>
        <input type="submit" value="Salva">
    </form>
</body>
</html>
