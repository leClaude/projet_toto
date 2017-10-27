<div class="container mt-5">
  <form action="" method="post">
    <h4 class="bg-primary text-white">AJOUTER UN ETUDIANT</h4>
    <div class="form-group">
      <label>NOM</label>
      <input type="text" class="form-control" name="lastname" placeholder="Nom" value="<?php echo $lastname; ?>">
    </div>
    <div class="form-group">
      <label>Prénom</label>
      <input type="text" class="form-control" name="firstname" placeholder="Prénom" value="<?php echo $firstname; ?>">
    </div>
    <div class="form-group">
      <label>Date de naissance</label>
      <input type="date" class="form-control" name="birthdate" value="<?php echo $birthdate; ?>">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label>Sympathie</label>
      <input type="text" class="form-control" name="friendliness" placeholder="entre 1 et 5" value="<?php echo $friendliness; ?>">
    </div>
    <div class="form-group">
    <label>Session</label>
    <select class="form-control" name="session">
      <?php foreach ($sessions as $key => $value) : ?>
        <option><?php echo $value['ses_id'].' - session du '.$value['ses_start_date'].' au '.$value['ses_end_date'] ; ?></option>
      <?php endforeach ; ?>
    </select>
    <div class="form-group">
    <label>ville</label>
    <select class="form-control" name="city">
      <?php foreach ($cities as $key => $value) : ?>
        <option><?php echo $value['cit_id'].' - '.$value['cit_name'] ; ?></option>
      <?php endforeach ; ?>
    </select>
  </div>
    <input type="submit" class="btn btn-success" value="Valider" />
  </form>
</div>
