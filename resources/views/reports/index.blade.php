@extends('layouts.app')
@section('content')

 <h4 class="Records">Records Analysis</h4>

<div class="report-main"> <h4><marquee>TODAYS REPORTS</marquee></h4><a href="#" style="float:left" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addproduct"><i class="fa fa-file"></i></a>
	<button class="sub">
		General Overview<br>
		<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
		<span><i class="fa fa-user"></i>167</span>
	</button>
	<button class="sub">
		Transaction<br>
		<div id="series_chart_div" style="width: 900px; height: 500px;"></div>
		<span><i class="fa fa-user"></i>127</span>
	</button>
	<button class="sub">
		Orders<br>
		<div id="chart_div" style="width: 900px; height: 500px;"></div>
		<span><i class="fa fa-laptop"></i>252</span>
	</button>
	<button class="sub">
		Customers<br>
		<span><i class="fa fa-users"></i>167</span>
		
	</button>
	
	</div>
	
<style type="text/css">
	
	.report-main{
	font-family:Arial,sans-serif;
	font-size: 2em;
	color: ghostwhite;
	align-items: center;
	justify-content: center;
	background-color: dimgrey;
	border-radius: 4px;
	padding: 100px;
	margin-right: 10px
	display: inline-block;
	height: 600p;
}
.sub{
	border-radius: 5%;
	text-decoration-color: lavenderblush;

	background-color: whitesmoke;
	padding: 20px;
	margin: 10px;
	cursor: pointer;
	position: relative;

}
.sub:hover {
	background-color: lightcyan;
	transition-delay: 0.3s;
	color: forestgreen;

}
.Records{
	align-items: center;
	font-family: Arial,sans-serif;
	font-weight: bolder;
	font-size: 2em;
	color: rgba(132, 56, 89, 1.0);
	margin-left: 305px;

}
</style>
@endsection
@section('scripts')


 <script type="text/javascript">
 	new DataTable('#example');
 </script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
        ['CAN',    80.66,              1.67,      'North America',  33739900],
        ['DEU',    79.84,              1.36,      'Europe',         81902307],
        ['DNK',    78.6,               1.84,      'Europe',         5523095],
        ['EGY',    72.73,              2.78,      'Middle East',    79716203],
        ['GBR',    80.05,              2,         'Europe',         61801570],
        ['IRN',    72.49,              1.7,       'Middle East',    73137148],
        ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
         ['ISR',    81.55,              2.96,      'Middle East',    7485600],
        ['RUS',    68.6,               1.54,      'Europe',         141850000],
        ['USA',    78.09,              2.05,      'North America',  307007000]
      ]);

      var options = {
        title: 'Fertility rate vs life expectancy in selected countries (2010).' +
          ' X=Life Expectancy, Y=Fertility, Bubble size=Population, Bubble color=Region',
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['customers',     345],
          ['transaction',      100],
          ['orders',  156]
         
        ]);

        var options = {
          title: 'Todays summary',
          is3D: true,
        };
         var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Age', 'Weight'],
          [ 8,      12],
          [ 4,      5.5],
          [ 11,     14],
          [ 4,      5],
          [ 3,      3.5],
          [ 6.5,    7]
        ]);

        var options = {
          title: 'Age vs. Weight comparison',
          hAxis: {title: 'Age', minValue: 0, maxValue: 15},
          vAxis: {title: 'Weight', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
    @endsection
