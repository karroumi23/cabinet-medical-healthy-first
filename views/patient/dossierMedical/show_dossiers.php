

<?php ob_start(); ?>


<!--  message pour confirmer (toastr) -->
<?php if (isset($_SESSION['message'])): ?>
    <?php $toastMessage = addslashes($_SESSION['message']); ?>
     <!--style the toastr -->
     <style>  
        .toast {
           text-align: center !important;
           width: 50% !important;
         }
     </style>
    <script> 
        document.addEventListener("DOMContentLoaded", function () {
            toastr.options = {
                "positionClass": "toast-top-center", // <- change to desired location
            };
            toastr.success("<?= $toastMessage ?>");
        });
    </script>
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
                                    <h6 class="text-muted mb-1">Total des dossiers</h6>
                                    <h4 class="mb-0 fw-bold" style="color: #1e293b;"><?= count($dossier) ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>


      <div class="card border-0 shadow-sm h-100 mb-5" style="border-radius: 16px; background:rgb(243, 245, 247);">
          <div class="card-header bg-transparent border-0 p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <h4 class="mb-4 text-center">Dossier Medical</h4>
                  <!-- head table -->
                <div class="d-flex gap-2">  
                            <a class="btn text-white btn-sm shadow-sm" href="index.php?action=createDossier&id=<?= $patient_id ?>&nom_complet=<?= urlencode($nom_complet) ?>"  
                               style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642); border: none; border-radius: 10px; padding: 9px 18px; font-weight: 600;">
                                <i class="fas fa-plus me-2"></i>Nouveau Dossier
                            </a>
                            <button class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                                <i class="fas fa-filter me-1"></i>Filtrer
                            </button>
                            <button class="btn btn-outline-secondary btn-sm" style="border-radius: 8px;">
                                <i class="fas fa-download me-1"></i>Exporter
                            </button>
                </div>
              <div class="table-responsive custom-table w-100" >
               <table class="table table-bordered table-hover table-striped align-middle w-100">
                 <thead class="table-dark text-center">
                   <tr>
                    <th style="width: 10px;">ID </th>
                    <th style="width: 10px;">Patient ID </th>
                    <th style="width: 30px;">nom complet</th>
                    <th style="width: 20px;">Groupe Sanguin</th>
                    <th style="width: 80px;">Type Maladie</th>
                    <th style="width: 80px;">Diagnostic</th>
                    <th style="width: 80px;">Date Admission	 </th>
                    <th style="width: 80px;">Date Fin Traitement	</th>
                    <th style="width: 80px;">Cout Traitement</th>
                    <th style="width: 80px;">Acompte Cout</th>
                    <th style="width: 80px;">Créé Par </th>

                    <th style="width: 120px;" >Action</th>
                   </tr>
                 </thead>
                <tbody>
                <?php foreach($dossier as $d): ?> 
                    <tr>
                        <td>#<?= $d->id  ?></td>
                        <td><?= $d->patient_id  ?></td>
                        <td><?= $d->nom_complet?></td>
                        <td><?= $d->groupe_sanguin ?></td>
                        <td><?= $d->type_maladie?></td>
                        <td><?= $d->diagnostic?></td>
                        <td><?= $d->date_admission?></td>
                        <td><?= $d->date_fin_traitement?></td>
                        <td><?= $d->cout_traitement?></td>
                        <td><?= $d->acompte_cout?></td>
                        <td><?= $d->cree_par ?></td>
                        <td class="text-center" >
                        <div class="d-flex justify-content-center gap-1">
                               <a href="index.php?action=editDossier&id=<?= $d->id ?>" class="btn text-white btn-warning btn-sm" style="font-size: 0.7rem; border-radius: 50%;"><i class="fas fa-edit"></i> </a>
                               <a href="index.php?action=destroyDossier&id=<?= $d->id ?>&patient_id=<?= urlencode($d->patient_id) ?>"
                                  class="btn btn-danger btn-sm" 
                                  style="font-size: 0.7rem;border-radius: 50%;"
                                  onclick="return confirm('Voulez-vous vraiment supprimer le dossier de <?= addslashes($d->nom_complet) ?> avec ID<?= addslashes($d->id) ?> ?');">
                                  <i class="fas fa-trash"></i>
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







<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
 <!-- --------------------------------------------------------------------------- -->


