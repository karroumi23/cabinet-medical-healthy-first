<?php ob_start(); ?>


<?php if (isset($_SESSION['message'])): ?>     <!--  message pour confirmer la suppression -->
    <div class="alert alert-success  mt-4 text-center">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="container mt-5 mb-4 " >
    <h3 class="mb-4 text-center " style="color:rgb(66, 107, 145);">Liste des Patients</h3>

    <div class="table-responsive" >
    <table class="table table-bordered table-hover table-striped align-middle w-100 p-2 text-center">
    <thead class="table-dark text-center">
                <tr>
                    <th style="width: 10px;">Id</th>
                    <th style="width: 80px;">nom-co</th>
                    <th style="width: 40px;">Dossier</th>
                    <th style="width: 20px;">Age</th>
                    <th style="width: 20px;">Genre</th>
                    <th style="width: 80px;">N-séc-S</th>
                    <th style="width: 60px;">Tél</th>
                    <th style="width: 30px;">Adresse</th>
                    <th style="width: 100px;">Date d'ajout</th>
                    <th style="width: 30px;">CrééPar</th>
                    <th style="width: 70px;" >Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($patients as $p): ?> 
                    <tr>
                        <td><?= $p->id ?></td>                       
                           <?php $nom_complet = $p->nom . ' ' . $p->prenom; ?>
                        <td><?= $nom_complet ?></td>
                        <td class="text-center">
  <div class="d-flex justify-content-center gap-2">
    <?php if ($p->has_dossier): ?>
      <a href="index.php?action=dossierMedical&id=<?= $p->id ?>" style="color: #2a9d8f; "  
         title="afficher dossier">
         <i class="fa-solid fa-file-waveform" style="font-size: 22px;"></i>
      </a>
    <?php endif; ?>
    
    <a href="index.php?action=createDossier&id=<?= $p->id ?>&nom_complet=<?= urlencode($nom_complet) ?>" 
       style="color: #e76f51;"  
       title="Ajouter dossier">
       <i class="fa-solid fa-square-plus" style="font-size: 22px;"></i>
    </a>
  </div>  
</td>

                        <td><?= $p->age ?></td>
                        <td><?= $p->genre?></td>
                        <td><?= $p->numero_securite_sociale?></td>
                        <td><?= $p->tel?></td>
                        <td><?= $p->adresse?></td>
                        <td><?= $p->date_ajout ?></td>
                        <td><?= $p->cree_par ?></td>
                        <td class="text-center" >
                            <div class="d-flex justify-content-center gap-1">
                                <a href="index.php?action=edit&id=<?= $p->id ?>" class="btn btn-warning btn-sm" style="font-size: 0.7rem; padding: 0.1rem 0.3rem;">✏️</a>
                                <?php 
                                 //if user connecte & session has role (admin) display 'Supprimer' 
                                   if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'):  ?>
                                        <a href="index.php?action=delete&id=<?= $p->id ?>&nom=<?= urlencode($p->nom) ?>" class="btn btn-danger btn-sm" style="font-size: 0.7rem; padding: 0.1rem 0.3rem;">🗑️</a>   
                                 <?php endif; ?>                                                                  
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>

    <a href="index.php?action=create" class="btn text-white mt-3" style="background-color:#3F8755 ;">AJOUTER PATIENT</a>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
