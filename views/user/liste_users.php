<?php ob_start(); ?>


<?php if (isset($_SESSION['message'])): ?>     <!--  message pour confirmer la suppression -->
    <div class="alert alert-success  mt-4 text-center">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="container mt-5 " >
    <h3 class="mb-4 text-center " style="color:rgb(66, 107, 145);">Liste des utilisateurs</h3>

    <div class="table-responsive" >
    <table class="table table-bordered table-hover table-striped align-middle w-100">
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
                        <td><?= $u->id ?></td>
                        <td><?= $u->username?></td>
                        <td><?= $u->role ?></td>
                        <td><?= $u->date_creation?></td>
                        <td class="text-center" >
                        <div class="d-flex justify-content-center gap-1">
                               <a href="index.php?action=editUser&id=<?= $u->id ?>" class="btn btn-warning btn-sm" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">✏️ Modifier</a>
                               <a href="index.php?action=deleteUser&id=<?= $u->id ?>&nom=<?= urlencode($u->username) ?>" class="btn btn-danger btn-sm" style="font-size: 0.7rem; padding: 0.2rem 0.5rem;">🗑️ Supprimer</a>                                                                    
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>

    <a href="index.php?action=createUser" class="btn text-white mt-3" style="background-color:#3F8755 ;">AJOUTER UTILISATEURS</a>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout.php'; ?>
