<div class="container mt-5">
  <form action="" method="post" class="card w-75 mx-auto">
    <h4 class="bg-primary text-white card-header text-center">NOUVEAU MOT DE PASSE</h4>
    <div class="form-inline d-flex justify-content-between mt-4">
      <label class="text-left px-2">Email</label>
      <input type="email" class="form-control w-75 mr-2" name="email" placeholder="email" value="" required>
    </div>
    <small class="form-text text-danger text-right pr-2"><?= $error ?></small>
    <div class="form-inline d-flex justify-content-between mt-2">
    <div class="form-inline mx-auto mt-4 mb-4">
      <input type="submit" class="btn btn-success w-100" value="Valider" />
    </div>
  </form>
</div>
