<?php
$fullWidth = true;

?>



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


    .container {
    max-width: 100% !important;
    padding: 0 !important;
}
</style>

<div class="hero-section position-relative d-flex justify-content-center align-items-center vh-100 bg-dark text-white overflow-hidden">
    <!-- Overlay with gradient -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)); z-index: 1;">
    </div>

    <!-- Background image -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background-image: url('/../Cabinet médical health_first/image/your-background.jpg'); 
                background-size: cover; background-position: center; z-index: 0;">
    </div>

    <!-- Hero Content -->
    <div class="hero-content text-center position-relative z-2 px-3">
        <h1 class="display-4 fw-bold mb-3">
            Bienvenue dans le système
            <img src="/../Cabinet médical health_first/image/logo1.png" alt="Logo" style="width: 80px; margin-top: -15px;" class="ms-2">
        </h1>
        <p class="lead fw-normal">
            Une plateforme intelligente pour la gestion des profils et des utilisateurs en toute simplicité.
        </p>
        <?php 
          //if user connecte & session has role (admin) display 'Supprimer' 
         if (!isset($_SESSION['user']))   :?>
           <a href="index.php?action=login" class="btn btn-outline-light btn-lg mt-4 px-4 py-2 rounded-pill shadow-sm">
               Commencer
           </a>
           <?php endif; ?>  
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>




