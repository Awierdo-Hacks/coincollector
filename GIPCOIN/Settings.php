<?php
// Start de sessie zodat we gebruikersinstellingen kunnen opslaan
session_start();

// Controleer of de gebruiker is ingelogd, anders stuur ze naar de login pagina
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: login.php');
    exit;
}

// Databaseverbinding maken
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'coincollector';
$conn = mysqli_connect($host, $user, $password, $database);
if (!$conn) {
    die('Kon geen verbinding maken met de database: ' . mysqli_connect_error());
}

// Verwerk het formulier als het is ingediend
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Controleer of de gebruiker het doelbedrag en doelnaam heeft ingevoerd
    if (!isset($_POST['doelbedrag']) || !isset($_POST['doelnaam'])) {
        echo 'Vul alstublieft zowel het doelbedrag als de doelnaam in.';
        exit;
    }

    // Update de instellingen in de database
    $doelbedrag = mysqli_real_escape_string($conn, $_POST['doelbedrag']);
    $doelnaam = mysqli_real_escape_string($conn, $_POST['doelnaam']);
    $query = "UPDATE spaardata SET doelbedrag = '$doelbedrag', doelnaam = '$doelnaam' WHERE id = 1";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo 'Kon de instellingen niet bijwerken: ' . mysqli_error($conn);
        exit;
    }

    // Sla de notificatie-instellingen op
    if (isset($_POST['notificaties'])) {
        $_SESSION['notificaties'] = true;
    } else {
        $_SESSION['notificaties'] = false;
    }
}

// Haal de huidige instellingen op uit de database
$query = "SELECT totaal, doelbedrag, doelnaam FROM spaardata WHERE id = 1";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Kon geen gegevens ophalen: ' . mysqli_error($conn));
}
$gegevens = mysqli_fetch_assoc($result);
$totaal = $gegevens['totaal'];
$doelbedrag = $gegevens['doelbedrag'];
$doelnaam = $gegevens['doelnaam'];

// Haal de notificatie-instellingen op uit de sessie
$notificaties = isset($_SESSION['notificaties']) ? $_SESSION['notificaties'] : false;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Instellingen - Coin Collector</title>
</head>
<body>
    <h1>Instellingen</h1>
    <form method="post">
        <label for="doelbedrag">Doelbedrag:</label>
        <input type="number" name="doelbedrag" id="doelbedrag" value="<?php echo $doelbedrag; ?>" required>
        <br>
        <label for="doelnaam">Doelnaam:</label>
    <input type="text" name="doelnaam" id="doelnaam" value="<?php echo $doelnaam; ?>" required>
    <br>
    <label for="notificaties">Notificaties ontvangen:</label>
    <input type="checkbox" name="notificaties" id="notificaties" <?php if ($notificaties) { echo 'checked'; } ?>>
    <br>
    <input type="submit" value="Opslaan">
</form>
<br>
<a href="overzicht.php">Terug naar overzicht</a>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - CoinCollector</title>
</head>
<body>
    <h1>Settings</h1>
    <form action="settings.php" method="post">
        <label for="doelbedrag">Doelbedrag:</label>
        <input type="number" name="doelbedrag" id="doelbedrag" min="0" step="0.01" value="<?php echo $doelbedrag; ?>" required>
        <br>
        <label for="doelnaam">Doelnaam:</label>
        <input type="text" name="doelnaam" id="doelnaam" value="<?php echo $doelnaam; ?>" required>
        <br>
        <label for="notificaties">Notificaties ontvangen:</label>
        <input type="checkbox" name="notificaties" id="notificaties" <?php if ($notificaties) { echo 'checked'; } ?>>
        <br>
        <input type="submit" value="Opslaan">
    </form>
    <br>
    <a href="overzicht.php">Terug naar overzicht</a>
</body>
</html>




<?php
// Sluit de databaseverbinding
mysqli_close($conn);
?>




