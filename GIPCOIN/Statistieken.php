<?php
session_start();
// controleer of de gebruiker is ingelogd, zo niet, geef een melding weer
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("Location:login.php");
  exit();
}
// Verbinding maken met de database
$connection = mysqli_connect("localhost", "root", "", "coincollector");

// Retrieve data for "Dagen van de week waarop het meest wordt bespaard" chart
$days_query = mysqli_query($connection," SELECT DATE(tijd) AS day, SUM(coinvalue) AS total_saved FROM coinlog WHERE tijd >= CURDATE() - INTERVAL 7 DAY GROUP BY DATE(tijd) ORDER BY total_saved DESC LIMIT 7");

// Retrieve data for "Gemiddeld bedrag dat per week is bespaard" chart
$weeks_query = mysqli_query($connection, "SELECT WEEK(tijd) AS week, AVG(coinvalue) AS avg_saved FROM coinlog GROUP BY WEEK(tijd) ORDER BY week DESC LIMIT 7");

// Retrieve data for "Savings Progress" chart
$savings_query = mysqli_query($connection, "SELECT SUM(coinvalue) AS total_saved FROM coinlog");
$goal_query = mysqli_query($connection, "SELECT SUM(doelbedrag) AS  goal_amount FROM spaardata where isverwijderd = 0");
// Fetch the results from the queries
$days_data = array();
while ($row = mysqli_fetch_assoc($days_query)) {
    $days_data[] = [$row['day'], $row['total_saved']];
}

$weeks_data = array();
while ($row = mysqli_fetch_assoc($weeks_query)) {
    $weeks_data[] = [$row['week'], $row['avg_saved']];
}

$savings_data = mysqli_fetch_assoc($savings_query);
$goal_data = mysqli_fetch_assoc($goal_query);
// Convert the PHP data to JSON format for JavaScript usage
$days_json = json_encode($days_data);
$weeks_json = json_encode($weeks_data);
$savings_json = json_encode([
    ['Category', 'Amount'],
    ['Savings', $savings_data['total_saved']],
    ['Goal', $goal_data['goal_amount']]
]);
?>

<!-- Include the Google Charts API library -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        // Data ophalen
        var data1 = google.visualization.arrayToDataTable(<?php echo $days_json; ?>);
        var data2 = google.visualization.arrayToDataTable(<?php echo $weeks_json; ?>);
        var data3 = google.visualization.arrayToDataTable(<?php echo $savings_json; ?>);

        // Opties voor de grafieken
        var options1 = {
            title: 'Dagen van de week waarop het meest wordt bespaard'
        };

        var options2 = {
            title: 'Gemiddeld bedrag dat per week is bespaard'
        };

        var options3 = {
            title: 'Savings Progress'
        };

        // Grafieken tekenen
        var chart1 = new google.visualization.ColumnChart(document.getElementById('chart1'));
        chart1.draw(data1, options1);

        var chart2 = new google.visualization.LineChart(document.getElementById('chart2'));
        chart2.draw(data2, options2);

        var chart3 = new google.visualization.PieChart(document.getElementById('chart3'));
        chart3.draw(data3, options3);
    }
</script>

</head>
<body>
<div class="chart-container">
<h2>Totale gespaard bedrag</h2>
<div id="chart3" class="chart" ></div>
</div>
<div class="chart-container">
<h2>Dagen van de week waarop het meest wordt bespaard</h2>
<div id="chart1" class="chart"  ></div>

</div>
<div class="chart-container">
<h2>Gemiddeld bedrag dat per week is bespaard</h2>
<div id="chart2"  class="chart" ></div>
</div>
<header class="cd-header">
		<div class="header-wrapper">
			<div class="logo-wrap">
				<a href="#" class="hover-target"><span>	<img src="image\cashwave-low-resolution-logo-color-on-transparent-background (1).png" alt=""></span></a>
			</div>
			<div class="nav-but-wrap">
				<div class="menu-icon hover-target">
					<span class="menu-icon__line menu-icon__line-left"></span>
					<span class="menu-icon__line"></span>
					<span class="menu-icon__line menu-icon__line-right"></span>
				</div>					
			</div>					
		</div>				
	</header>
<div class="nav">
		<div class="nav__content">
			<ul class="nav__list">
                <li class="nav__list-item"><a href="main.php" class="hover-target">Overzicht</a></li>
				<li class="nav__list-item active-nav"><a href="Statistieken.php" class="hover-target">Statistieken</a></li>
				<li class="nav__list-item"><a href="Doelen.php" class="hover-target">Doelen</a></li>
				<li class="nav__list-item"><a href="Settings.php" class="hover-target">Settings</a></li>
				<li class="nav__list-item"><a href="uitlog.php" class="hover-target">Uitloggen</a></li>
			</ul>
		</div>
	</div>		
</body>
</html>
