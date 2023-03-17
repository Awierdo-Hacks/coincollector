<!DOCTYPE html>
<html>
<head>
	<title>Doelen</title>
</head>
<body>
	<?php
		// Databaseverbinding maken
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "coincollector";

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Controleren op fouten bij het maken van verbinding met de database
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Controleren of er een doel wordt bewerkt
		if (isset($_POST['bewerk'])) {
			$id = $_POST['id'];
			$doelbedrag = $_POST['doelbedrag'];

			$sql = "UPDATE spaardata SET doelbedrag='$doelbedrag' WHERE id='$id'";
			$conn->query($sql);
		}

		// Controleren of er een doel wordt verwijderd
		if (isset($_POST['verwijder'])) {
			$id = $_POST['id'];

			$sql = "DELETE FROM spaardata WHERE id='$id'";
			$conn->query($sql);
		}

		// Controleren of er een nieuw doel wordt toegevoegd
		if (isset($_POST['toevoegen'])) {
			$doelnaam = $_POST['doelnaam'];
			$doelbedrag = $_POST['doelbedrag'];

			$sql = "INSERT INTO spaardata (totaal, doelbedrag, doelnaam) VALUES (0, '$doelbedrag', '$doelnaam')";
			$conn->query($sql);
		}
	?>

	<h1>Doelen</h1>

	<table>
		<thead>
			<tr>
				<th>Doelnaam</th>
				<th>Doelbedrag</th>
				<th>Huidig totaal</th>
				<th>Bewerken</th>
				<th>Verwijderen</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Alle doelen ophalen
				$sql = "SELECT * FROM spaardata";
				$result = $conn->query($sql);

				// Elk doel weergeven in de tabel
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo '<tr>';
						echo '<td>' . $row['id'] . '</td>';
						echo '<td>' . $row['doelnaam'] . '</td>';
						echo '<td>' . $row['doelbedrag'] . '</td>';
                        echo '					<form method="POST" action="doelen.php">
						<input type="hidden" name="id" value="' . $row['id'] . '">
						<input type="number" name="doelbedrag" value="' . $row['doelbedrag'] . '">
						<button type="submit" name="bewerk">Bewerken</button>
					</form>
					</td>';
					echo '<td>';
					echo '<form method="POST" action="doelen.php">';
					echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
					echo '<button type="submit" name="verwijder">Verwijderen</button>';
					echo '</form>';
					echo '</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr><td colspan="5">Er zijn nog geen doelen toegevoegd.</td></tr>';
			}

			// Totaal doelbedrag berekenen
			$sql = "SELECT SUM(doelbedrag) AS totaal FROM spaardata";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$totaal_doelbedrag = $row['totaal'];

			// Huidig totaalbedrag berekenen
			$sql = "SELECT SUM(totaal) AS totaal FROM spaardata";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$huidig_totaalbedrag = $row['totaal'];

			echo '<tr>';
			echo '<td><strong>Totaal</strong></td>';
			echo '<td><strong>' . $totaal_doelbedrag . '</strong></td>';
			echo '<td><strong>' . $huidig_totaalbedrag . '</strong></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '</tr>';

			// Controleren of er maximaal 5 doelen zijn
			if ($result->num_rows >= 5) {
				echo '<tr><td colspan="5">Er kunnen maximaal 5 doelen worden toegevoegd.</td></tr>';
			} else {
				echo '<tr>';
				echo '<form method="POST" action="doelen.php">';
				echo '<td><input type="text" name="doelnaam"></td>';
				echo '<td><input type="number" name="doelbedrag"></td>';
				echo '<td></td>';
				echo '<td><button type="submit" name="toevoegen">Doel toevoegen</button></td>';
				echo '<td></td>';
				echo '</form>';
				echo '</tr>';
			}

			// Databaseverbinding sluiten
			$conn->close();
		?>
	</tbody>
</table>





