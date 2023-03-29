<!DOCTYPE html>
<html>
<head>
  <title>Piechart</title>
  <!-- Laad de Google Chart API in -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      // Gebruikersnaam, wachtwoord en database naam vervangen met eigen waardes
      var servername = "localhost";
      var username = "root";
      var password = "";
      var dbname = "coincollector";

      // Maak de database connectie
      var conn = new mysqli(servername, username, password, dbname);

      // Check of de connectie werkt
      if (conn.connect_error) {
        alert("Connection failed: " + conn.connect_error);
        return;
      }

      // Haal de gegevens op uit de database
      var sql = "SELECT doelnaam, doelbedrag FROM spaardata";
      var result = conn.query(sql, function (err, result) {
        if (err) throw err;
        var data = result;

        // Totaal gespaard bedrag
        var totaalGespaard = 500;

        // Bereken het totale doelbedrag
        var totaalDoel = 0;
        for(var i=0; i<data.length; i++) {
          totaalDoel += data[i][1];
        }

        // Maak een array met de gegevens voor de piechart
        var chartData = [['Doel', 'Bedrag']];
        for(var i=0; i<data.length; i++) {
          chartData.push([data[i][0], data[i][1]]);
        }

        // Voeg het totaal gespaarde bedrag toe aan de chartData
        chartData.push(['Totaal gespaard', totaalGespaard]);

        // Maak de datatable
        var datatable = google.visualization.arrayToDataTable(chartData);

        // Opties voor de piechart
        var options = {
          title: 'Spaardoelen',
          is3D: true,
        };

        // Maak de piechart
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        // Teken de piechart
        chart.draw(datatable, options);
      });
    }
  </script>
</head>
<body>
  <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
