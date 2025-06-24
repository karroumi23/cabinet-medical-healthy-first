<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $isSingle ? 'Dossier Médical #'.$dossier->id : 'Tous les Dossiers Médicaux' ?></title>
    <style>
        body { font-family: Arial; line-height: 1.5; }
        .header { text-align: center; margin-bottom: 20px; }
        .dossier { border: 1px solid #ddd; margin-bottom: 20px; padding: 15px; page-break-inside: avoid; }
        .section { margin-bottom: 15px; }
        .section-title { background-color: #f0f0f0; padding: 5px; font-weight: bold; }
        .info-item { display: flex; margin-bottom: 5px; }
        .info-label { min-width: 150px; font-weight: bold; }
        .dates { display: flex; justify-content: space-between; }
        .costs { display: flex; justify-content: space-between; margin-top: 15px; }
    </style>
</head>
<body>
    <?php if ($isSingle): ?>
        <div class="header">
            <h1>Dossier Médical #<?= $dossier->id ?></h1>
            <h2><?= $dossier->nom_complet ?></h2>
        </div>

        <div class="section">
            <div class="section-title">Informations Patient</div>
            <div class="info-item">
                <div class="info-label">Patient ID:</div>
                <div><?= $dossier->patient_id ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Groupe Sanguin:</div>
                <div><?= $dossier->groupe_sanguin ?></div>
            </div>
        </div>

        <!-- Rest of the single dossier template... -->

    <?php else: ?>
        <div class="header">
            <h1>Tous les Dossiers Médicaux</h1>
            <h2>Patient ID: <?= $patient_id ?></h2>
        </div>

        <?php foreach ($dossiers as $dossier): ?>
            <div class="dossier">
                <h3>Dossier #<?= $dossier->id ?> - <?= $dossier->nom_complet ?></h3>
                
                <div class="section">
                    <div class="section-title">Informations Patient</div>
                    <div class="info-item">
                        <div class="info-label">Groupe Sanguin:</div>
                        <div><?= $dossier->groupe_sanguin ?></div>
                    </div>
                </div>

                <!-- Rest of the dossier template... -->

            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>