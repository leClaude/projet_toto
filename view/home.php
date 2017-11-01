<div class="container">
  <div class="card mx-auto w-50 mt-5">
    <div class="card-block">
      <div class="card-header text-center bg-success text-white">
        <h4>Nombre d'étudiants par ville</h4>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>Ville</th>
            <th>Nombre d'étudiants</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($studentByCity as $key => $value) : ?>
            <tr>
              <td><?=$value['cit_name']?></td>
              <td><?=$value['COUNT(*)']?></td>
            </tr>
          <?php endforeach ; ?>
        </tbody>
      </table>
    </div>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </div>


  <?php foreach ($trainingLoc as $key => $value) : ?>
    <div class="card mx-auto mt-5">
      <div class="card-block">
        <div class="card-header text-center bg-primary text-white">
          <h4><?= $value['tra_name'] ?></h4>
        </div>
        <?php $sql = "SELECT ses_id, ses_number, ses_start_date, ses_end_date, tra_name FROM session INNER JOIN training ON training.tra_id=session.training_tra_id WHERE tra_name LIKE '{$value['tra_name']}'" ;
        $pdoStatement = $pdo->prepare($sql) ;
        $pdoStatement->execute() ;
        $sessions = $pdoStatement->fetchAll(PDO::FETCH_ASSOC) ; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">SESSION</th>
              <th scope="col">DEBUT</th>
              <th scope="col">FIN</th>
              <th scope="col">VOIR DETAIL</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sessions as $key => $value) : ?>
              <tr>
                <td>Session n° <?= $value['ses_number'] ?> </td>
                <td> <?= $value['ses_start_date'] ?> </td>
                <td> <?= $value['ses_end_date'] ?> </td>
                <td><a class="btn btn-success" href=<?="list.php?ses={$value['ses_id']}"?>>détails</a></td>
              </tr>
            <?php endforeach ; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endforeach ; ?>
</div>
<!--Load the AJAX API-->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
   // Load the Visualization API and the corechart package.
   google.charts.load('current', {
     'packages': ['corechart']
   });

   // Set a callback to run when the Google Visualization API is loaded.
   google.charts.setOnLoadCallback(drawChart);

   // Callback that creates and populates a data table,
   // instantiates the pie chart, passes in the data and
   // draws it.
   function drawChart() {

     // Create the data table.

     var data = new google.visualization.DataTable();
     data.addColumn('string', 'Ville');
     data.addColumn('number', "Nombre d'étudiants");
     data.addRows([
      <?php foreach ($studentByCity as $key => $value) : ?>
       ["<?=$value['cit_name']?>", <?=$value['COUNT(*)']?>],
      <?php endforeach ; ?>
     ]);

     // Set chart options
     var options = {
       'title': "Nombre d'étudiants par ville",
       'width': 600,
       'height': 400
     };

     // Instantiate and draw our chart, passing in some options.
     var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
     chart.draw(data, options);
   };
   </script>
