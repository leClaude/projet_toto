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
