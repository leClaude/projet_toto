  <table class="table mt-5">
  <thead>
    <tr>
      <th>ID</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ROLE</th>
      <th scope="col">MODIFIER ROLE</th>
      <th scope="col">SUPPRIMER</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usersList as $key => $value) : ?>
    <tr>
      <td scope="row"> <?php echo $usersList[$key]['usr_id'] ; ?> </td>
      <td> <?php echo $usersList[$key]['usr_email'] ; ?> </td>
      <td> <?php echo $usersList[$key]['usr_role'] ?> </td>
      <td>
          <form class="" action="" method="post">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="role" value="user"> user
                </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="role" value="admin"> admin
              </label>
            </div>
            <input type="hidden" name="id_mod" value=<?=$usersList[$key]['usr_id']?>>
            <button type="submit" name="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
          </form>
      </td>
      <td><a class="btn btn-danger" href=<?="users.php?id_del={$usersList[$key]['usr_id']}"?>><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
    </tr>
    <?php endforeach ; ?>
  </tbody>
</table>
