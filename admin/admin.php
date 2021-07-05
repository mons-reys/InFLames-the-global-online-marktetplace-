<?php 
  session_start();
  if(isset($_SESSION['categorie_added'])){
  echo $_SESSION['categorie_added'];
  unset($_SESSION['categorie_added']);
  }

function category_number($cat)
{
    $category = $cat ;
    include('../config/db_connect.php');
    include('../config/select_categorie.php');
    return $count;
}
    $book =  category_number('book'); 
    $informatique =  category_number('informatique'); 
    $clothes = category_number('clothes');
?>

<html>
  <head>
  <!-- categories statistics -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Book',      <?php echo  $book; ?>],
          ['informatique',  <?php echo  $informatique; ?>],
          ['clothes',  <?php echo  $clothes; ?>]
        ]);

        var options = {
          title: 'Categories statistics '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Book',      <?php echo  $book; ?>],
          ['infotmatique',  <?php echo  $infotmatique; ?>],
          ['clothes',  <?php echo  $clothes; ?>]
        ]);

        var options = {
          title: 'Categories statistics '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!--fontawsome-->
    <script src="https://kit.fontawesome.com/6d3b596002.js" crossorigin="anonymous"></script>

    <!-- Custom Styling -->
    <link rel="stylesheet" type="text/css" href="../css/Style2.css">

    <!-- users statistics -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['days', 'Sales', 'users'],
          ['26/06',  300,      400],
          ['25/06',  400,      460],
          ['24/06',  800,       1120],
          ['22/06',  300,      540]
        ]);

        var options = {
          title: 'Users activities',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

  </head>
  <body>
  <body>
    <!-- Header -->
	<?php include('header.php') ?>
    <!-- / Header --> 
    	 <!--Content  -->
	  <div class="content clearfix">
		  <div class="main-content">
			  <h1 class="recent-post-title">Users statistics</h1>
        <div id="curve_chart" style="width: 900px; height: 500px"></div>
		  </div>

		  <div class="sidebar">
			  <div class="section topics">
				  <h2 class="section-title">Control panel</h2>
				  <ul>
					  <li><a href="add_categorie.php">add categorie</a></li>
					  <li><a href="delete_categorie.php">delete categorie</a></li>
					  <li><a href="edit_categorie.php">edit categorie</a></li>
				  </ul>
			  </div>
		 </div>
    </div>
	 <!--// Content-->

    

    <!--Content  -->
	<div class="content clearfix">
		 <div class="main-content">
        <h1 class="recent-post-title">Categories statistics: </h1>
        <!-- Google char -->
         <div id="piechart" style="width: 900px; height: 600px;"></div>
        <!-- // Google char -->
      </div>  
	</div>
	 <!--// Content-->


    <!--footer-->
	<?php include('index_footer.php'); ?>
	<!--// footer-->
    
</body>
