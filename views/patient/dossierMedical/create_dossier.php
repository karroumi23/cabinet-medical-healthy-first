<?php //ob_start(); ?>
<!-- link bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <style>
     .readonly-cursor {
        cursor:not-allowed;
 </style> 
 <div class="container mt-5">
     <div class="row justify-content-center">
        <div class="col-md-6 col-lg-9 border p-4 shadow rounded bg-light mb-5">
            <h3 class="text-center mb-4" style="color:rgb(66, 107, 145);">Créer un Dossier Médical</h3>

            <form action="index.php?action=storeDossier" method="post">
                <div class="mb-3">
                    <label class="form-label">ID </label>
                    <input type="text" class="form-control readonly-cursor " name="patient_id" value="<?= $id ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">nom complet</label>
                    <input type="text" class="form-control readonly-cursor " name="nom_complet" value="<?= $nom_complet?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Groupe Sanguin</label>
                    <input type="text" class="form-control" name="groupe_sanguin" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type de Maladie</label>
                    <input type="text" class="form-control" name="type_maladie" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Diagnostic</label>
                    <textarea class="form-control" name="diagnostic" rows="3" ></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date d'admission</label>
                    <input type="date" class="form-control" name="date_admission" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date de fin de traitement</label>
                    <input type="date" class="form-control" name="date_fin_traitement">
                </div>

                <div class="mb-3">
                    <label class="form-label">Coût du traitement (MAD)</label>
                    <input type="number" step="0.01" class="form-control" name="cout_traitement" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Acompte (MAD)</label>
                    <input type="number" step="0.01" class="form-control" name="acompte_cout" >
                </div>
                 <!-- ajouter - annuler -->
                <div class="d-flex justify-content-between mt-4">
                    <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter">
                    <a href="index.php?action=list" class="btn btn-danger">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>