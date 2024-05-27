google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Tarea', 'Horas por día'],
    ['Resultados', 70],
    ['Sin resultados', 30],
  ]);




  var options = {
    title: '',
    'legend': { 'position': 'bottom'
    },
    width:'100%',
        height: 300,
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.responsive = true;
  chart.draw(data, options);
}