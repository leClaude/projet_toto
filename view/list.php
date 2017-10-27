<div class="form-inline d-flex justify-content-around mt-5" action="" method="post">
  <a class="btn btn-primary" href="<?= 'list.php?page='.$prev ?>">Page précédente</a>
  <span>Page <?=$page?></span>
  <a class="btn btn-primary" href="<?= 'list.php?page='.$next ?>">Page suivante</a>
</div>
<table class="table mt-5">
  <thead>
    <tr>
      <th>ID</th>
      <th scope="col">LAST NAME</th>
      <th scope="col">FIRST NAME</th>
      <th scope="col">EMAIL</th>
      <th scope="col">BIRTH DATE</th>
      <th scope="col">VOIR PROFIL</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($list as $key => $value) : ?>
    <tr>
      <td scope="row"> <?php echo $list[$key]['stu_id'] ; ?> </td>
      <td> <?php echo $list[$key]['stu_lastname'] ; ?> </td>
      <td> <?php echo $list[$key]['stu_firstname'] ?> </td>
      <td> <?php echo $list[$key]['stu_email'] ; ?> </td>
      <td> <?php echo $list[$key]['stu_birthdate'] ; ?> </td>
      <td><a type="button" class="btn btn-success" href=<?php echo "student.php?id={$list[$key]['stu_id']}"?>>détails</a></td>
    </tr>
    <?php endforeach ; ?>
  </tbody>
</table>
