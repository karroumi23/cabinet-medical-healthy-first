<?php
$fullWidth = true; //to display the background with width 100% (just home page )

?>
<?php ob_start(); ?>

<style>
    .hero-section {
        background-image: url('/../Cabinet médical health_first/public/image/hopital.png'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        position: relative;
        color: white;
        width: 100% ;
        
    }

    .alert-overlay {
        background-color: rgba(40, 167, 69, 0.8); /* green with opacity */
        color: white;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 10px;
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 999;
    }

</style>

<div class="hero-section position-relative d-flex justify-content-center align-items-center vh-100 bg-dark text-white overflow-hidden">

    <!-- Overlay with gradient -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background: linear-gradient(rgba(44, 42, 42, 0.6), rgba(32, 32, 32, 0.7)); z-index: 1;">
    </div>

        <!--  SESSION MESSAGE -->
        <?php if (isset($_SESSION['message'])): ?>
          <div class="alert-overlay text-center">
             <?= $_SESSION['message'] ?>
          </div>
          <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

    <!-- Hero Content -->
    <div class="hero-content text-center position-relative z-2 px-3">
        <h1 class="display-4 fw-bold mb-3">
            Bienvenue dans le système
            <img src="/../Cabinet médical health_first/public/image/logo1.png" alt="Logo" style="width: 80px; margin-top: -15px;" class="ms-2">
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




