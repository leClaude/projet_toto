<?php if(!isset($_GET['search']) && !isset($_GET['ses'])) : ?>
  <div class="form-inline d-flex justify-content-around mt-5" action="" method="post">
    <a class="btn btn-primary" href="<?= 'list.php?page='.$prev ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <span>Page <?=$page?></span>
    <a class="btn btn-primary" href="<?= 'list.php?page='.$next ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
  </div>
<?php endif ; ?>
<div class="text-center font-weight-bold mt-5">
  <?php if(isset($_GET['search'])) : ?>
  <?=count($list)?> résultat(s) pour le mot <?=$search?>
  <?php endif ; ?>
  <?php if(isset($_GET['ses'])) : ?>
  <?=count($list)?> étudiants(s) pour la session n° <?=$list[0]['ses_number']?>
  <?php endif ; ?>
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
      <?php if (!empty($_SESSION['role'])) : if ($_SESSION['role']=='admin') : ?>
          <th scope="col">SUPPRIMER</th>
          <th scope="col">MODIFIER</th>
      <?php endif ; endif ;?>
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
      <td><a class="btn btn-success studentDetail" data-id="<?=$list[$key]['stu_id']?>" href=<?php echo "student.php?id={$list[$key]['stu_id']}"?>><i class="fa fa-info" aria-hidden="true"></i></a></td>
      <?php if (!empty($_SESSION['role'])) : if ($_SESSION['role']=='admin') : ?>
          <td><a class="btn btn-danger" href=<?php echo "list.php?del={$list[$key]['stu_id']}"?>><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
          <td><a class="btn btn-warning" href=<?php echo "add.php?id={$list[$key]['stu_id']}"?>><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
      <?php endif ; endif ;?>
    </tr>
    <?php endforeach ; ?>
  </tbody>
</table>
<div id="popupStudent" class="container" style="display:none;position:absolute;z-index:1000;left:35%;top:15%;width:400px;background-color:white;">
</div>

<script type="text/javascript">
$(".studentDetail").click(function(e){
    e.preventDefault() ;
    var id = $(this).data('id') ;
    console.log(id) ;
    $.ajax({
        url : 'ajax/student.php',
        method : 'POST',
        data : {
            'id' : id
        }
    }).done(function(response){
        $('#popupStudent').html(response) ;
        $('#popupStudent').css('display','block') ;
        console.log(response) ;
        $(".close").click(function(){
            $("#popupStudent").css('display','none') ;
        }) ;
    }) ;
}) ;
</script>
