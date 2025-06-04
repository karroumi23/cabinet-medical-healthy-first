<?php ob_start(); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 border p-4 shadow rounded bg-light mb-5">

            <!-- Header with title and dossier medical button -->
            <div class=" text-center mb-5">
                <h3 class="mb-0" >Ajouter un Patient</h3>               
            </div>

            <form action="index.php?action=store" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Âge</label>
                        <input type="number" class="form-control" name="age" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Genre</label>
                        <select class="form-select" name="genre" required>
                            <option value="">-- Choisir --</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Numéro de Sécurité Sociale</label>
                        <input type="text" class="form-control" name="numero_securite_sociale" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="tel" >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Adresse</label>
                        <textarea class="form-control" name="adresse" rows="3" ></textarea>
                    </div>
                </div>

                <!-- Footer with actions -->
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <input type="submit" class="btn text-white" style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642);" name="ajouter" value="Ajouter">
                    <a href="index.php?action=list" class="btn btn-secondary">Annuler</a>
                </div>
            </form>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
