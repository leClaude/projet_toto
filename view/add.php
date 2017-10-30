<div class="container mt-5">
  <form action="" method="post" class="card">
    <?php if(isset($_GET['id'])) : ?>
      <h4 class="bg-warning text-white card-header text-center">MODIFIER UN ETUDIANT</h4>
    <?php else : ?>
      <h4 class="bg-primary text-white card-header text-center">AJOUTER UN ETUDIANT</h4>
    <?php endif ; ?>
    <div class="form-inline d-flex justify-content-between mt-3">
      <label class="text-left px-2">NOM</label>
      <input type="text" class="form-control w-75 mr-2" name="lastname" placeholder="Nom" value="<?php echo $lastname; ?>">
    </div>
    <div class="form-inline d-flex justify-content-between mt-1">
      <label class="text-left px-2">Prénom</label>
      <input type="text" class="form-control w-75 mr-2" name="firstname" placeholder="Prénom" value="<?php echo $firstname; ?>">
    </div>
    <div class="form-inline d-flex justify-content-between mt-1">
      <label class="text-left px-2">Date de naissance</label>
      <input type="date" class="form-control w-75 mr-2" name="birthdate" value="<?php echo $birthdate; ?>">
    </div>
    <div class="form-inline d-flex justify-content-between mt-1">
      <label class="text-left px-2">Email</label>
      <input type="email" class="form-control w-75 mr-2" name="email" placeholder="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-inline d-flex justify-content-between mt-1">
      <label class="text-left px-2">Sympathie</label>
      <input type="text" class="form-control w-75 mr-2" name="friendliness" placeholder="entre 1 et 5" value="<?php echo $friendliness; ?>">
    </div>
    <div class="form-inline d-flex justify-content-between mt-1">
      <label class="text-left px-2">Session</label>
      <select class="form-control w-75 mr-2" name="session">
        <?php foreach ($sessions as $key => $value) : ?>
          <option><?php echo $value['ses_id'].' - session du '.$value['ses_start_date'].' au '.$value['ses_end_date'] ; ?></option>
        <?php endforeach ; ?>
      </select>
    </div>
    <div class="form-inline d-flex justify-content-between mt-1">
      <label class="text-left px-2">Ville</label>
      <select class="form-control w-75 mr-2" name="city">
        <?php foreach ($cities as $key => $value) : ?>
          <option><?php echo $value['cit_id'].' - '.$value['cit_name'] ; ?></option>
        <?php endforeach ; ?>
      </select>
    </div>
    <div class="form-inline d-flex justify-content-around mt-4 mb-4">
      <input type="submit" class="btn btn-success w-25" value="Valider" />
    </div>
  </form>
</div>
