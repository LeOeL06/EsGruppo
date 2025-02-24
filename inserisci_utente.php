<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Inserisci Nuovo Utente</title>
</head>
<body>
    <h1>Inserisci Nuovo Utente</h1>
    <form action="salva_utente.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" required><br>
        <label for="residenza">Residenza:</label>
        <input type="text" id="residenza" name="residenza" required><br>
        <input type="submit" value="Salva">
    </form>
</body>
</html>
