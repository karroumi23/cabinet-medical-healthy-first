<?php ob_start(); ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 border p-4 shadow rounded bg-light mb-5">

      <h3 class="text-center mb-4" style="color:rgb(66, 107, 145);">Modifier Patient <span class="text-success">#<?php  echo $p->nom ?></span></h3>

      <form action="index.php?action=update" method="post" ">

        <!-- Hidden ID -->
        <input type="hidden" class="form-control" value="<?php echo $p->id ?>" name="id">

        <!-- Nom -->
        <div class="mb-3">
          <label class="form-label">Nom</label>
          <input type="text" class="form-control" value="<?php echo $p->nom ?>" name="nom" required>
        </div>

        <!-- Prénom -->
        <div class="mb-3">
          <label class="form-label">Prénom</label>
          <input type="text" class="form-control" value="<?php echo $p->prenom ?>" name="prenom" required>
        </div>

        <!-- Âge -->
        <div class="mb-3">
          <label class="form-label">Âge</label>
          <input type="number" class="form-control" value="<?php echo $p->age ?>" name="age" required>
        </div>

        <!-- Genre -->
        <div class="mb-3">
          <label class="form-label">Genre</label>
          <select class="form-select" name="genre" required>
            <option value="">-- Choisir --</option>
            <option value="H" <?= ($p->genre === 'H') ? 'selected' : '' ?>>Homme</option>
            <option value="F" <?= ($p->genre === 'F') ? 'selected' : '' ?>>Femme</option>
          </select>
        </div>

        <!-- Numéro de Sécurité Sociale -->
        <div class="mb-3">
          <label class="form-label">Numéro de Sécurité Sociale</label>
          <input type="text" class="form-control" value="<?php echo $p->numero_securite_sociale ?>" name="numero_securite_sociale" required>
        </div>

        <!-- Téléphone -->
        <div class="mb-3">
          <label class="form-label">Téléphone</label>
          <input type="text" class="form-control" value="<?php echo $p->tel ?>" name="tel" >
        </div>

        <!-- Adresse -->
        <div class="mb-3">
          <label class="form-label">Adresse</label>
          <textarea class="form-control" name="adresse" rows="3" required><?php echo $p->adresse ?></textarea>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between mt-4">
          <button type="submit" class="btn btn-success">✅ Modifier</button>
          <a href="index.php?action=list" class="btn btn-danger">❌ Annuler</a>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require_once 'views/layout.php';
?>
