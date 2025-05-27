

<?php ob_start(); ?>


<?php if (isset($_SESSION['message'])): ?>     <!--  message pour confirmer la suppression -->
    <div class="alert alert-success text-center">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="container mt-5 " >
    <h3 class="mb-4 text-center " style="color:rgb(66, 107, 145);">Dossier Medical </h3>

    <div class="table-responsive" >
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
                        <td><?= $d->id  ?></td>
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
                               <a href="index.php?action=editUser&id=<?= $d->id ?>" class="btn btn-warning btn-sm" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">✏️ </a>
                               <a href="index.php?action=deleteDossier&id=<?= $d->id ?>&nom_complet=<?= urlencode($d->nom_complet) ?>&patient_id=<?= urlencode($d->patient_id) ?>" class="btn btn-danger btn-sm" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">🗑️ </a>                                                                    
                            </div>
                        </td>  

                    </tr>
    
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>

    <a class="btn btn-primary" href="index.php?action=createDossier&id=<?= $patient_id ?>&nom_complet=<?= urlencode($nom_complet) ?>">
    ➕ Ajouter Dossier
</a>


</div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
