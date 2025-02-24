<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Inserisci Nuova Bolletta</title>
</head>
<body>
    <h1>Inserisci Nuova Bolletta</h1>
    <form action="salva_bolletta.php" method="post">
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
</body>
</html>
