<div class="container mt-5">
  <form action="" method="post" class="card w-75 mx-auto">
    <h4 class="bg-primary text-white card-header text-center">INSCRIPTION</h4>
    <div class="form-inline d-flex justify-content-between mt-4">
      <label class="text-left px-2">Email</label>
      <input type="email" class="form-control w-75 mr-2" name="email" placeholder="email" value="" required>
    </div>
    <small class="form-text text-danger text-right pr-2"><?= $emailError ?></small>
    <div class="form-inline d-flex justify-content-between mt-2">
      <label class="text-left px-2">Mot de passe</label>
      <input type="password" class="form-control w-75 mr-2" name="password1" placeholder="8 caractères mini" value="" required>
    </div>
    <div class="form-inline d-flex justify-content-between mt-2">
      <label class="text-left px-2">Confirmation mdp</label>
      <input type="password" class="form-control w-75 mr-2" name="password2" placeholder="8 caractères mini" value="" required>
    </div>
    <small class="form-text text-danger text-right pr-2"><?= $pwdError ?></small>
    <div class="form-inline d-flex justify-content-around mt-4 mb-4">
      <input type="submit" class="btn btn-success w-25" value="Valider" />
    </div>
  </form>
</div>
