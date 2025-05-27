<?php ob_start(); ?>
<style>
  .delete-card {
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    margin-top: 8%;
  }
  .delete-title {
    color: #dc3545;
    font-weight: 700;
    margin-bottom: 1rem;
  }
  .delete-message {
    font-size: 1.1rem;
    margin-bottom: 2rem;
  }
  .delete-message .highlight {
    font-weight: bold;
    color: #198754;
  }
</style>

<div class="d-flex justify-content-center align-items-center  ">
  <div class="delete-card text-center">
    <h2 class="delete-title">Supprimer Dossier Médical</h2>
    <p class="delete-message">
      Voulez-vous vraiment supprimer le dossier de 
      <span class="highlight"><?= htmlspecialchars($nom_complet) ?></span>
      avec l'ID 
      <span class="highlight"><?= htmlspecialchars($id) ?></span> ?
    </p>

    <div class="d-flex justify-content-center gap-3">
      <a href="index.php?action=destroyDossier&id=<?= $id ?>&patient_id=<?= urlencode($patient_id) ?>" class="btn btn-danger px-4">
        Oui, Supprimer
      </a>
      <a href="index.php?action=dossierMedical&id=<?= $patient_id?>" class="btn btn-secondary px-4">
        Annuler
      </a>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
