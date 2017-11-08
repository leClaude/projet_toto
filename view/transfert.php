<div class="container">
  <form class="card mx-auto w-50 mt-5" method="POST" action="" enctype="multipart/form-data">
        <h4 class="bg-primary text-white card-header text-center">Ajout d'étudiant par envoi de fichier</h4>
        <div class="form-inline justify-content-between py-4">
            <label for="fileUpload" class="mr-1">Envoyer un fichier d'étudiants :</label>
            <input type="hidden" name="submitFile" value="1" />
            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
            <input type="file" class="" name="fileUpload" placeholder="Fichier">
            <input type="submit" class="mx-auto w-50 mt-4 btn btn-success btn-block" value="Envoyer" />
        </div>
    </form>
    <form class="card mx-auto w-50 mt-5" method="GET" action="" enctype="multipart/form-data">
          <h4 class="bg-primary text-white card-header text-center">Exporter la liste des étudiants</h4>
          <div class="form-inline justify-content-between py-4">
              <input type="hidden" name="export" value="true" />
              <input type="submit" class="mx-auto w-50 mt-4 btn btn-success btn-block" value="Exporter" />
          </div>
          <?php if (file_exists('export/export-'.date('Ymd').'.csv')) : ?>
              <div class="row">
                  <a class="mx-auto w-50 mt-4 mb-2 btn btn-success btn-block" href=<?='export/export-'.date('Ymd').'.csv'?>>Télécharger le fichier exporté</a>
              </div>
         <?php endif ; ?>
      </form>
</div>
