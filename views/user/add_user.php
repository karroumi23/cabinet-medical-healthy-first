<?php ob_start(); ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-9 border p-4 shadow rounded bg-light mb-5">

        <h3  class="text-center  mb-4" style="color:rgb(66, 107, 145);">Ajouter un utilisateur</h3>

        <form method="POST" action="index.php?action=storeUser" >
            <div class="mb-3">
                <label class="form-label">Nom d'utilisateur:</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rôle:</label>
                <select class="form-select" name="role">
                    <option value="admin">Administrateur</option>
                    <option value="user" selected>Utilisateur</option>
                </select>
            </div>


            <div class="d-flex justify-content-end gap-2 mt-4">
           <input type="submit" class="btn btn-success" name="ajouter" value="Ajouter">
           <a href="index.php?action=listUsers" class="btn btn-danger">Annuler</a>
        </div>
        </form>
        </div> 
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>