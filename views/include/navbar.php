 
 <!-- style links  -->
 <style> 
  .nav-link-custom {
    color: #417A58;
    font-size:medium;
    letter-spacing: 0.5px;
    transition: color 0.3s ease, text-shadow 0.2s ;
  }

  .nav-link-custom:hover {
    color:rgb(12, 175, 64);
    text-shadow: 0 0 4px rgba(63, 135, 85, 0.2);
  }
</style>


<nav class="navbar navbar-expand-lg navbar-light  shadow-sm" style="background-color:rgba(239, 242, 245, 0.92);">
  <div class="container-fluid">

    <!--  logo -->
      <a href="index.php?action=home">
         <img src="#" alt="LOGO" style="width:50px; height:auto; margin-left: 20px; margin-top: -10px;">
      </a>

    <!-- Navbar for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <!-- Collapsible menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center gap-3">

        <li class="nav-item">
          <a href="index.php?action=home" class="nav-link nav-link-custom  fw-semibold" >Accueil</a>
        </li>
         <!-- if user connecte -------------------------------------->
        <?php if (isset($_SESSION['user'])): ?>
           <li class="nav-item">
             <a href="index.php?action=list" class="nav-link  nav-link-custom fw-semibold" >Liste des patients</a>
           </li>
           <li class="nav-item">
             <a href="index.php?action=create" class="nav-link nav-link-custom fw-semibold" >Ajouter patient</a>
           </li> 
             <?php 
               //if user connecte & session has role (admin) display 'ajouter utilisateur' 
               if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'):  ?>
                 <li class="nav-item">
                   <a href="index.php?action=listUsers" class="nav-link nav-link-custom  fw-semibold" >Liste des utilistaeur</a>
                 </li>               
                 <li class="nav-item">
                   <a href="index.php?action=createUser" class="nav-link nav-link-custom fw-semibold" >Ajouter un utilisateur</a>
                 </li>
             <?php endif; ?>
        <?php endif; ?>
        <!-- ---------------------------------------------------->
        <!-- Connexion/Dropdown -->
         <li class="nav-item dropdown ms-5 me-4" >
            <button class="btn btn-sm text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642);">
                <!-- dispaly user name in the button of connexion -->
                <?= isset($_SESSION['user']) 
                    ? htmlspecialchars($_SESSION['user']['username']) 
                    : 'Connexion' 
                ?>       
            </button>
           <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
             <?php if (isset($_SESSION['user'])): ?>
                <li><a href="index.php?action=logout" class="dropdown-item text-danger">Déconnexion</a></li>
             <?php else: ?>
                <li><a href="index.php?action=show" class="dropdown-item text-success">Se connecter</a></li>
             <?php endif; ?>
           </ul>
         </li>

      </ul>
    </div>
  </div>
</nav>
