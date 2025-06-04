<?php ob_start(); ?>


<?php if (isset($_SESSION['message'])): ?>     <!--  message pour confirmer la suppression -->
    <div class="alert alert-success  mt-4 text-center">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

            <!-- Total Patients -->
            <div class="row mb-4 mt-5">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 16px; background: linear-gradient(135deg, #ffffff, #f8fafc);">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 48px; height: 48px; background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642);">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="text-muted mb-1">Total des utilisateurs</h6>
                                    <h4 class="mb-0 fw-bold" style="color: #1e293b;"><?= count($users) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


<div class="container mt-3 " >


    <div class="card border-0 shadow-sm h-100 mb-5" style="border-radius: 16px; background:rgb(243, 245, 247);">
        <div class="card-header bg-transparent border-0 p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

              <h4 class="mb-4 text-center">Liste des utilisateurs</h4>
                  <!-- head table -->
              <div class="d-flex gap-2">   
                            <a class="btn text-white shadow-sm" href="index.php?action=createUser"  
                               style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642); border: none; border-radius: 10px; padding: 9px 18px; font-weight: 600;">
                                <i class="fas fa-plus me-2"></i>Ajouter Utilistaeur
                            </a>
                            <button class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                                <i class="fas fa-filter me-1"></i>Filtrer
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                                <i class="fas fa-download me-1"></i>Exporter
                            </button>
              </div>
              <div class="table-responsive custom-table w-100" >
                <table class="table table-bordered table-hover text-center table-striped align-middle w-100">
                   <thead class="table-dark text-center">
                       <tr>
                        <th style="width: 10px;">Id</th>
                        <th style="width: 30px;">nom complet</th>
                        <th style="width: 20px;">rôle</th>
                        <th style="width: 80px;">date de création</th>
                        <th style="width: 120px;" >Action</th>
                       </tr>
                     </thead>
                     <tbody>
                           <?php foreach($users as $u): ?> 
                       <tr>
                        <td>#<?= $u->id ?></td>
                        <td><?= $u->username?></td>
                        <td><?= $u->role ?></td>
                        <td><?= $u->date_creation?></td>
                        <td>
                          <div class="d-flex justify-content-center gap-2">
                               <a href="index.php?action=editUser&id=<?= $u->id ?>" class="btn text-white btn-warning btn-sm" style="font-size: 0.8rem; "><i class="fas fa-edit"></i> Modifier</a>
                               <a href="index.php?action=destroyUser&id=<?= $u->id ?>"
                                  class="btn btn-danger btn-sm" style="font-size: 0.8rem;" 
                                  onclick="return confirm('Voulez-vous vraiment supprimer l’utilisateur <?= addslashes($u->username) ?> ?');">
                                  <i class="fas fa-trash"></i> Supprimer
                               </a>                                                                    
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

</div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>



<!-- ----------------------------------------- -->
