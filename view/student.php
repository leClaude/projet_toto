<div class="container">
  <div class="card mx-auto mt-5">
    <div class="card-block">
      <h4 class="card-header text-center bg-primary text-white"><?php echo $student[0]['stu_firstname'].' '.$student[0]['stu_lastname']?></h4>
      <ul class="list-group list-group-flush">
        <?php foreach ($student[0] as $key => $value) : ?>
          <li class="list-group-item"><?php echo $key.' : '.$value ; ?></li>
        <?php endforeach ; ?>
      </ul>
    </div>
  </div>
</div>
