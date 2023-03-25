<?php

session_start();

// controleer of de gebruiker is ingelogd, zo niet, geef een melding weer
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location:login.php");
  exit();
}

// connectie maken met de database
$conn = mysqli_connect("localhost", "root", "", "coincollector");
if (!$conn) {
	die("Verbinding mislukt: " . mysqli_connect_error());
}

// toevoegen van een nieuw doel
$max_aantal_doelen = 4;
$result = mysqli_query($conn, "SELECT COUNT(*) AS aantal_doelen FROM spaardata");
$row = mysqli_fetch_assoc($result);
if ($row['aantal_doelen'] > $max_aantal_doelen) {
	$max_aantal_doelen++;
    echo "<p>Je kunt niet meer dan $max_aantal_doelen doelen hebben.</p>";
}
elseif (isset($_POST['toevoegen'])) {
	$doelbedrag = $_POST['doelbedrag'];
	$doelnaam = $_POST['doelnaam'];
	$sql = "INSERT INTO spaardata ( doelbedrag, doelnaam) VALUES ($doelbedrag, '$doelnaam')";
	if (mysqli_query($conn, $sql)) {
		echo "Nieuw doel is toegevoegd!";
	} else {
		echo "Fout bij toevoegen van nieuw doel: " . mysqli_error($conn);
	}
}

// updaten van een doelbedrag of doelnaam
if (isset($_POST['updaten'])) {
	$id = $_POST['id'];
	$doelbedrag = $_POST['doelbedrag'];
	$doelnaam = $_POST['doelnaam'];
	$sql = "UPDATE spaardata SET doelbedrag=$doelbedrag, doelnaam='$doelnaam' WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo "Doel is bijgewerkt!";
	} else {
		echo "Fout bij bijwerken van doel: " . mysqli_error($conn);
	}
}

// verwijderen van een doel
if (isset($_POST['verwijderen'])) {
	$id = $_POST['id'];
	$sql = "DELETE FROM spaardata WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
		echo "Doel is verwijderd!";
	} else {
		echo "Fout bij verwijderen van doel: " . mysqli_error($conn);
	}
}

// ophalen van de totale doelbedrag
$sql = "SELECT SUM(doelbedrag) AS totaal_doelbedrag FROM spaardata";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$totaal_doelbedrag = $row['totaal_doelbedrag'];

// ophalen van het huidig gespaard totaal
$sql = "SELECT SUM(coinvalue) AS huidig_totaal FROM coinlog";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$huidig_totaal = $row['huidig_totaal'];

// ophalen van alle doelen
$sql = "SELECT * FROM spaardata";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Doelen</title>
</head>
<body>
	
<h1>Doelen</h1>
	<p>Totaal doelbedrag: <?php echo $totaal_doelbedrag; ?></p>
	<p>Huidig gespaard totaal: <?php echo$huidig_totaal; ?></p>
	<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Doelbedrag</th>
			<th>Doelnaam</th>
			<th>Acties</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$doelbedrag = $row['doelbedrag'];
			$doelnaam = $row['doelnaam'];
		?>
		<tr>
			<form method="post">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<td><?php echo $id; ?></td>
				<td><input type="number" name="doelbedrag" value="<?php echo $doelbedrag; ?>"></td>
				<td><input type="text" name="doelnaam" value="<?php echo $doelnaam; ?>"></td>
				<td>
					<button type="submit" name="updaten">Bijwerken</button>
					<button type="submit" name="verwijderen">Verwijderen</button>
				</td>
			</form>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

<h2>Nieuw doel toevoegen</h2>
<form method="post">
	<label for="doelbedrag">Doelbedrag:</label>
	<input type="number" id="doelbedrag" name="doelbedrag" required>
	<label for="doelnaam">Doelnaam:</label>
	<input type="text" id="doelnaam" name="doelnaam" required>
	<button type="submit" name="toevoegen">Toevoegen</button>
</form>

<?php
// sluiten van de database connectie
mysqli_close($conn);
?>
</body>
</html>


