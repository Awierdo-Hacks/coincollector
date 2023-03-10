<?php
session_start();

// controleer of de gebruiker is ingelogd, zo niet, geef een melding weer
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location:login.php");
  exit();
}
// Verbinding maken met de database

$conn = mysqli_connect("localhost", "root", "", "coincollector");

// Query om het totale gespaarde bedrag te krijgen
$total_query = mysqli_query($conn, "SELECT totaal AS total_saved FROM spaardata ORDER BY id DESC LIMIT 1");
$total_row = mysqli_fetch_assoc($total_query);
$total_saved = $total_row['total_saved'];

// Query om het bedrag te krijgen dat nog moet worden bespaard
$goal_query = mysqli_query($conn, "SELECT doelbedrag FROM spaardata ORDER BY id DESC LIMIT 1 ");
$goal_row = mysqli_fetch_assoc($goal_query);
$goal_amount = $goal_row['doelbedrag'] - $total_saved;

// Query om de dagen van de week te krijgen waarop het meeste is bespaard
$days_query = mysqli_query($conn, "SELECT DAYNAME(tijd) AS day, SUM(coinvalue) AS total_saved FROM coinlog GROUP BY DAYNAME(tijd) ORDER BY total_saved DESC LIMIT 5");

// Query om het gemiddelde bedrag dat per week is bespaard te krijgen
$average_query = mysqli_query($conn, "SELECT AVG(coinvalue) AS average_saved FROM coinlog WHERE WEEK(tijd) = WEEK(NOW())");

// // Gegevens voor de eerste grafiek (Totale besparing)
// echo "['Gespaard', " . $total_saved . "],";
// echo "['Nog te sparen', " . $goal_amount . "],";

// // Gegevens voor de tweede grafiek (Dagen van de week waarop het meest wordt bespaard)
// while ($row = mysqli_fetch_assoc($days_query)) {
//     echo "['" . $row['day'] . "', " . $row['total_saved'] . "],";
// }

// Gegevens voor de derde grafiek (Gemiddeld bedrag dat per week is bespaard)
$average_row = mysqli_fetch_assoc($average_query);
$average_saved = $average_row['average_saved'];
$current_week = date("W");

?>
<!DOCTYPE html>
<html>
<head>
<script src="menu.js" defer></script>
<link rel="stylesheet" href="menu_styling.css">
<link rel="stylesheet" href="statistieken_styling.css">

<title>Statistieken</title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" defer>
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawCharts);


		function drawCharts() {
			// Data ophalen
			var data = google.visualization.arrayToDataTable([
				['Dag', 'Bedrag'],
				<?php
                    // Gegevens voor de eerste grafiek (Totale besparing)
                    echo "['Gespaard', " . $total_saved . "],";
                    echo "['Nog te sparen', " . $goal_amount . "],";
					while ($row = mysqli_fetch_assoc($days_query)) {
                        echo "['" . $row['day'] . "', " . $row['total_saved'] . "],";
                    }
                ?>
            ]);

        // Opties voor de eerste grafiek (Totale besparing)
        var options1 = {
            title: 'Totale gespaard bedrag',
            legend: 'none'
        };

        // Opties voor de tweede grafiek (Dagen van de week waarop het meest wordt bespaard)
        var options2 = {
            title: 'Dagen van de week waarop het meest wordt bespaard'
        };

        // Opties voor de derde grafiek (Gemiddeld bedrag dat per week is bespaard)
        var options3 = {
            title: 'Gemiddeld bedrag dat per week is bespaard'
        };

        // Grafieken tekenen
        var chart1 = new google.visualization.PieChart(document.getElementById('chart1'));
        chart1.draw(data, options1);

        var chart2 = new google.visualization.ColumnChart(document.getElementById('chart2'));
        chart2.draw(data, options2);

        var chart3 = new google.visualization.LineChart(document.getElementById('chart3'));
        chart3.draw(data, options3);
    }
</script>
<div class="nav-but-wrap">
				<div class="menu-icon hover-target">
					<span class="menu-icon__line menu-icon__line-left"></span>
					<span class="menu-icon__line"></span>
					<span class="menu-icon__line menu-icon__line-right"></span>
				</div>					
			</div>					
		</div>				
</head>
<body>
<div class="chart-container">
<h2>Totale gespaard bedrag</h2>
<div id="chart1" class="chart"  style="width: 800px; height: 300px;"></div>
</div>
<div class="chart-container">
<h2>Dagen van de week waarop het meest wordt bespaard</h2>

<div id="chart2"  class="chart" style="width: 800px; height: 300px;"></div>
</div>
<div class="chart-container">
<h2>Gemiddeld bedrag dat per week is bespaard</h2>
<div id="chart3" class="chart" style="width: 800px; height: 300px;"></div>
</div>

<div class="nav">
		<div class="nav__content">
			<ul class="nav__list">
                <li class="nav__list-item"><a href="controle_paneel.php" class="hover-target">Controle Paneel</a></li>
				<li class="nav__list-item active-nav"><a href="Statistieken.php" class="hover-target">Statistieken</a></li>
				<li class="nav__list-item"><a href="#" class="hover-target">Doelen</a></li>
				<li class="nav__list-item"><a href="#" class="hover-target">Settings</a></li>
				<li class="nav__list-item"><a href="uitlog.php" class="hover-target">Uitloggen</a></li>
			</ul>
		</div>
	</div>		
</body>
</html>
