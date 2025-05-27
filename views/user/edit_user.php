<?php ob_start(); ?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Half width on medium screens and up -->
            <div class="card shadow-lg p-4 border p-4 shadow rounded bg-light mb-5">
                <h3 class="mb-4 text-center" style="color:rgb(66, 107, 145);">Modifier un utilisateur <span class="text-success">#<?php  echo $u->username ?></span></h3>

                <form  action="index.php?action=updateUser" method="POST">
                            <!-- Hidden ID -->
                  <input type="hidden" class="form-control" value="<?php echo $u->id ?>" name="id">
                    <div class="mb-3">
                        <label class="form-label">Nom d'utilisateur:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $u->username ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rôle:</label>
                        <select class="form-select" name="role">
                            <option value="admin" <?= ($u->role === 'admin') ? 'selected' : '' ?>>Administrateur</option>
                            <option value="user" <?= ($u->role === 'user') ? 'selected' : '' ?>>Utilisateur</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success">✅ Modifier</button>
                        <a href="index.php?action=listUsers" class="btn btn-danger">❌ Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>