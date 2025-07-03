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
                "positionClass": "toast-top-center",
            };
            toastr.success("<?= $toastMessage ?>");
        });
    </script>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<style>
    .medical-card {
        transition: all 0.3s ease;
        border-radius: 16px;
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .medical-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }
    
    .card-header-custom {
        background: linear-gradient(135deg, rgb(84, 141, 110), #2e6642);
        border-radius: 16px 16px 0 0 !important;
        padding: 1.5rem;
    }
    
    .info-item {
        /* display: flex; */
        align-items: center;
        margin-bottom: 0.75rem;
        padding: 0.5rem;
        background: rgba(248, 249, 250, 0.8);
        border-radius: 8px;
        border-left: 4px solid rgb(84, 141, 110);
    }
    
    .info-label {
        font-weight: bold;
        color: #495057;
        min-width: 90px;
        font-size: 0.85rem;
    }
    
    .info-value {
        color: #212529;
        font-weight: 400;
    }
    
    .status-badge {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .blood-type {
        background: linear-gradient(135deg, #dc3545, #c82333);
        color: white;
      }
    
    .cost-highlight {
        background: linear-gradient(135deg, #28a745, #1e7e34);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-weight: 600;
      }
      .action-buttons{
        display: flex;
      }
    .action-buttons .btn {
        border-radius: 8px;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    
    .action-buttons .btn:hover {
        transform: translateY(-1px);
    }

    .search-filter-section {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    @media (max-width: 768px) {
        .medical-card {
            margin-bottom: 1.5rem;
        }
        
        .info-item {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .info-label {
            min-width: auto;
            margin-bottom: 0.25rem;
        }
    }
</style>

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

<!-- Header Section -->
<div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; background:rgb(243, 245, 247);">
    <div class="card-header bg-transparent border-0 p-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h4 class="mb-0 d-flex align-items-center">
                <i class="fas fa-folder-medical me-3" style="color: rgb(84, 141, 110);"></i>
                Dossiers Médicaux
            </h4>
            <div class="d-flex gap-2">  
                <a class="btn text-white btn-sm shadow-sm" href="index.php?action=createDossier&id=<?= $patient_id ?>&nom_complet=<?= urlencode($nom_complet) ?>"  
                   style="background: linear-gradient(135deg,rgb(84, 141, 110), #2e6642); border: none; border-radius: 10px; padding: 12px 24px; font-weight: 600;">
                    <i class="fas fa-plus me-2"></i>Nouveau Dossier
                </a>
                <a class="btn btn-outline-secondary btn-sm" 
                   href="index.php?action=exportAllDossiers&id=<?= $patient_id ?>" 
                   style="border-radius: 8px; padding: 12px 20px;">
                   <i class="fas fa-download me-1"></i>Exporter Tous
                </a>

 
            </div>
        </div>
    </div>
</div>

<!-- Medical Records Cards -->
<div class="row" id="medicalRecordsContainer">
    <?php foreach($dossier as $d): ?> 
        <div class="col-lg-6 col-xl-4 mb-4 medical-record-item" >
            <div class="card medical-card h-100" >
                <!-- Card Header -->
                <div class="card-header card-header-custom text-white">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-1 fw-bold">
                                <i class="fas fa-user-injured me-2"></i>
                                <?= $d->nom_complet ?>
                            </h5>
                            <p class="mb-0 opacity-90">
                                <small><i class="fas fa-hashtag me-1"></i>Dossier #<?= $d->id ?></small>
                            </p>
                        </div>
                        <span class="status-badge blood-type">
                            <i class="fas fa-tint me-1"></i><?= $d->groupe_sanguin ?>
                        </span>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">
                    <!-- Patient Info -->
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-id-card text-primary me-2"></i>Patient ID:
                        </span>
                        <span class="info-value"><?= $d->patient_id ?></span>
                    </div>

                    <!-- Medical Info -->
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-virus text-danger me-2"></i>Type de maladie:
                        </span>
                        <span class="info-value"><?= $d->type_maladie ?></span>
                    </div>

                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-stethoscope text-info me-2"></i>Diagnostic:
                        </span> <br>
                        <span class="info-value"><?= $d->diagnostic ?></span>
                    </div>

                    <!-- Dates -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <div class="text-center p-2" style="background: rgba(40, 167, 69, 0.1); border-radius: 8px;">
                                <small class="text-muted d-block">Admission</small>
                                <strong style="color: #28a745;">
                                    <i class="fas fa-calendar-plus me-1"></i>
                                    <?= date('d/m/Y', strtotime($d->date_admission)) ?>
                                </strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-2" style="background: rgba(220, 53, 69, 0.1); border-radius: 8px;">
                                <small class="text-muted d-block">Fin Traitement</small>
                                <strong style="color: #dc3545;">
                                    <i class="fas fa-calendar-check me-1"></i>
                                    <?= $d->date_fin_traitement ? date('d/m/Y', strtotime($d->date_fin_traitement)) : 'En cours' ?>
                                </strong>
                            </div>
                        </div>
                    </div>

                    <!-- Financial Info -->
                    <div class="row mb-3">
                      <div class="col-6">
                          <div class="cost-highlight text-center">
                             <small class="d-block opacity-90">Coût Total</small>
                             <strong><?= number_format($d->cout_traitement ?? 0, 2) ?> MAD </strong>
                          </div>
                      </div>
                      <div class="col-6">
                          <div class="text-center p-2" style="background: rgba(255, 193, 7, 0.2); border-radius: 8px; color: #856404;">
                             <small class="d-block">Acompte</small>
                             <strong><?= number_format($d->acompte_cout ?? 0, 2) ?> MAD</strong>
                          </div>
                      </div>
                      <div class="col-12 mt-2">
                          <div class="text-center p-2" style="background: rgba(23, 162, 184, 0.2); border-radius: 8px; color: #0c5460;">
                            <small class="d-block">Montant restant</small>
                            <strong><?= number_format(($d->cout_traitement ?? 0) - ($d->acompte_cout ?? 0), 2) ?> MAD</strong>
                          </div>
                      </div>
                    </div>


                    <!-- Created By -->
                    <div class="info-item mb-4">
                        <span class="info-label">
                            <i class="fas fa-user-md text-success me-2"></i>Créé par:
                        </span>
                        <span class="info-value"><?= $d->cree_par ?></span>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons text-center ">
                        <a href="index.php?action=editDossier&id=<?= $d->id ?>" 
                           class="btn btn-warning text-white btn-sm">
                           <i class="fas fa-edit me-1"></i>Modifier
                        </a>
                        <a href="index.php?action=exportDossier&id=<?= $d->id ?>" 
                           class="btn btn-success btn-sm">
                           <i class="fas fa-file-pdf me-1"></i>PDF
                        </a>
                        <?php 
                          //if user connecte & session has role (admin) display 'Supprimer' 
                          if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'):  ?>
                               <!-- supprimer -->
                               <a href="index.php?action=destroyDossier&id=<?= $d->id ?>&patient_id=<?= urlencode($d->patient_id) ?>"
                                 class="btn btn-danger btn-sm" 
                                 onclick="return confirm('Voulez-vous vraiment supprimer le dossier de <?= addslashes($d->nom_complet) ?> avec ID <?= addslashes($d->id) ?> ?');">
                                 <i class="fas fa-trash me-1"></i>Supprimer
                               </a>  
                        <?php endif; ?>  


                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?> 
</div>


<script>
  // Search and Filter Functionality
  function filterRecords() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const bloodGroup = document.getElementById('bloodGroupFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    
    const records = document.querySelectorAll('.medical-record-item');
    let visibleCount = 0;
    
    records.forEach(record => {
        const name = record.dataset.name;
        const blood = record.dataset.blood;
        const diagnostic = record.dataset.diagnostic;
        
        const matchesSearch = name.includes(searchTerm) || diagnostic.includes(searchTerm);
        const matchesBlood = !bloodGroup || blood === bloodGroup;
        
        if (matchesSearch && matchesBlood) {
            record.style.display = 'block';
            visibleCount++;
        } else {
            record.style.display = 'none';
        }
    });
    
    document.getElementById('noResults').style.display = visibleCount === 0 ? 'block' : 'none';
  }

  function clearFilters() {
    document.getElementById('searchInput').value = '';
    document.getElementById('bloodGroupFilter').value = '';
    document.getElementById('statusFilter').value = '';
    filterRecords();
  }

  // Event listeners
  document.getElementById('searchInput').addEventListener('input', filterRecords);
  document.getElementById('bloodGroupFilter').addEventListener('change', filterRecords);
  document.getElementById('statusFilter').addEventListener('change', filterRecords);
</script>

<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
<!-- --------------------------------------------------------------------------- -->