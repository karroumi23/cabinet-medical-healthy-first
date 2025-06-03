<?php ob_start(); ?>

<style>
    .readonly-cursor{
         cursor: not-allowed;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Half width on medium screens and up -->
            <div class="card shadow-lg p-4 border p-4 shadow rounded bg-light mb-5">
                <h3 class="mb-4 text-center" style="color:rgb(66, 107, 145);">Modifier Dossier Medical avec l'ID<span class="text-success"><?php  echo $d->id ?></span></h3>

                <form  action="index.php?action=updateDossier" method="POST">
                            <!-- Hidden ID -->
                       <input type="hidden" class="form-control readonly-cursor" value="<?php echo $d->id ?>" name="id">
                    <div class="mb-3">
                        <label class="form-label">Patient-ID </label>                                             
                        <input type="text" class="form-control readonly-cursor " name="patient_id" value="<?php echo $d->patient_id ?>" readonly>
                    </div>
                    <div class="mb-3">
                         <label class="form-label">nom complet</label>
                         <input type="text" class="form-control readonly-cursor " name="nom_complet" value="<?= $d->nom_complet?>" readonly>
                    </div>
                    <div class="mb-3"> 
                       <label class="form-label">Groupe Sanguin</label>
                       <select class="form-select" name="groupe_sanguin" required>
                            <option value="A+" <?= ($d->groupe_sanguin == 'A+') ? 'selected' : '' ?>>A+</option>
                            <option value="A-" <?= ($d->groupe_sanguin == 'A-') ? 'selected' : '' ?>>A-</option>
                            <option value="B+" <?= ($d->groupe_sanguin == 'B+') ? 'selected' : '' ?>>B+</option>
                            <option value="B-" <?= ($d->groupe_sanguin == 'B-') ? 'selected' : '' ?>>B-</option>
                            <option value="AB+" <?= ($d->groupe_sanguin == 'AB+') ? 'selected' : '' ?>>AB+</option>
                            <option value="AB-" <?= ($d->groupe_sanguin == 'AB-') ? 'selected' : '' ?>>AB-</option>
                            <option value="O+" <?= ($d->groupe_sanguin == 'O+') ? 'selected' : '' ?>>O+</option>
                            <option value="O-" <?= ($d->groupe_sanguin == 'O-') ? 'selected' : '' ?>>O-</option>
                       </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Type de Maladie</label>
                        <input type="text" class="form-control" name="type_maladie" value="<?= $d->type_maladie?>" required>
                    </div>
                    <div class="mb-3">
                       <label class="form-label">Diagnostic</label>
                       <textarea class="form-control" name="diagnostic" rows="3" ><?= $d->diagnostic?></textarea>
                    </div>
                    <div class="mb-3">
                       <label class="form-label">Date d'admission</label>
                       <input type="date" class="form-control" name="date_admission" value="<?= $d->date_admission?>" required>
                    </div>
                   <div class="mb-3">
                      <label class="form-label">Date de fin de traitement</label>
                      <input type="date" class="form-control" name="date_fin_traitement" value="<?= $d->date_fin_traitement ?>" >
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Coût du traitement (MAD)</label>
                      <input type="number" step="0.01" class="form-control" name="cout_traitement" value="<?= $d->cout_traitement ?>" required>
                   </div>
                   <div class="mb-3">
                      <label class="form-label">Acompte (MAD)</label>
                      <input type="number" step="0.01" class="form-control" name="acompte_cout"  value="<?= $d->acompte_cout ?>">
                   </div>



                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn " style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642);">Modifier</button>
                        <a href="index.php?action=listUsers" class="btn btn-secondary">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>