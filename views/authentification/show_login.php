<?php ob_start(); ?>

<div class="container w-75 my-4 mt-5 bg-light p-5 rounded shadow">
    <h3 class="text-center mb-4 " style="color:#417A58;">Connexion</h3>


     <?php if (isset($_SESSION['message'])): ?>  <!--success message after add user -->
    <div class="alert alert-success">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form action="index.php?action=login" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" name="username" class="form-control" id="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>

        <button type="submit" class="btn text-white w-100" 
                style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642); border: none; border-radius: 10px; padding: 9px 18px; font-weight: 600;">
                Se connecter
        </button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
