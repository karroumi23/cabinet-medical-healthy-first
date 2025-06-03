<?php ob_start(); ?>

<!--  message pour confirmer -->
<?php if (isset($_SESSION['message'])): ?>     
    <div class="alert alert-success  mt-4 text-center">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

            <!-- Total Patients -->
            <div class="row mb-4 mt-5">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; background:rgb(243, 245, 247);">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 48px; height: 48px; background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642);">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="text-muted mb-1">Total Patients</h6>
                                    <h4 class="mb-0 fw-bold" style="color: #1e293b;"><?= count($patients) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="card border-0 shadow-sm h-100 mb-5" style="border-radius: 16px; background:rgb(243, 245, 247);">
        <div class="card-header bg-transparent border-0 p-4">
           <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

             <h4 class="mb-4 text-center">Liste des Patients</h4>
             
             <div class="d-flex gap-2">
                            <a href="index.php?action=create" class="btn btn-sm text-white shadow-sm" 
                               style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642); border: none; border-radius: 10px; padding: 9px 18px; font-weight: 600;">
                                <i class="fas fa-plus me-2"></i>Nouveau Patient
                            </a>
                            <button class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                                <i class="fas fa-filter me-1"></i>Filtrer
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                                <i class="fas fa-download me-1"></i>Exporter
                            </button>
                        </div>
           <div class="table-responsive custom-table w-100" >
           <table class="table table-hover table-striped align-middle  p-2 text-center">
               <thead class="table-dark text-center" >
                <tr>
                    <th style="width: 10px;">Id</th>
                    <th style="width: 80px;">nom-co</th>
                    <th style="width: 30px;">Dossier</th>
                    <th style="width: 50px;">Age</th>
                    <th style="width: 15px;">Genre</th>
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
                        <td>#<?= $p->id ?></td>                       
                           <?php $nom_complet = $p->nom . ' ' . $p->prenom; ?>
                        <td><?= $nom_complet ?></td>
                        <td class="text-center">
                         <div class="d-flex justify-content-center gap-2">
                            <?php if ($p->has_dossier): ?>
                              <a href="index.php?action=dossierMedical&id=<?= $p->id ?>" style="color: #417A58 ; "  
                                    title="afficher dossier">
                                  <i class="fa-solid fa-file-waveform" style="font-size: 20px;"></i>
                              </a>
                            <?php endif; ?>
    
                           <a href="index.php?action=createDossier&id=<?= $p->id ?>&nom_complet=<?= urlencode($nom_complet) ?>" 
                               style="color: #E28421;" title="Ajouter dossier">
                               <i class="fa-solid fa-square-plus" style="font-size: 20px;"></i>
                           </a>
                         </div>  
                        </td>

                        <td><?= $p->age ?> ans </td>
                        <td><?= $p->genre?></td>
                        <td><?= $p->numero_securite_sociale?></td>
                        <td><?= $p->tel?></td>
                        <td><?= $p->adresse?></td>
                        <td><?= $p->date_ajout ?></td>
                        <td><?= $p->cree_par ?></td>
                        <td class="text-center" >
                            <div class="d-flex justify-content-center gap-1">
                                <a href="index.php?action=edit&id=<?= $p->id ?>" class="btn text-white btn-sm" style="font-size: 0.7rem; background-color:#E28421;border-radius: 50%; "><i class="fas fa-edit"></i></a>
                                <?php 
                                 //if user connecte & session has role (admin) display 'Supprimer' 
                                   if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'):  ?>
                                        <a href="index.php?action=delete&id=<?= $p->id ?>&nom=<?= urlencode($p->nom) ?>" class="btn btn-danger btn-sm" style="font-size: 0.7rem; border-radius: 50%;"><i class="fas fa-trash"></i></a>   
                                 <?php endif; ?>                                                                  
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
           </table>
           </div>
        </div>
       </div>
   </div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>


