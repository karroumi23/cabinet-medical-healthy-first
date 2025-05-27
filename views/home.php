<?php ob_start(); ?>
<?php if (isset($_SESSION['message'])): ?>     <!--  message pour confirmer la suppression -->
    <div class="alert alert-success text-center mt-4" style="color: green; font-size: 20px; font-weight: bold;">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
<style>
    .hero-section {
        background-image: url('https://images.unsplash.com/photo-1586773860418-d37222d8fce3'); /* Hospital-themed image */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        position: relative;
        color: white;
        width: 100% ;
        
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.38); /* Dark transparent overlay */
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }
</style>

<div class="hero-section d-flex justify-content-center align-items-center ">
    <div class="overlay"></div>
    <div class="hero-content text-center">
        <h1 class="display-4 fw-bold text-light">
            Bienvenue dans le système 
            <span class="text-success">H&nbsp;ô&nbsp;p&nbsp;i&nbsp;t&nbsp;a&nbsp;l</span>
        </h1>
        <p class="lead text-white mt-3">
            Une plateforme intelligente pour la gestion des profils et des utilisateurs en toute simplicité.
        </p>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>




