<!DOCTYPE html>
<html>
<head>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- link font-awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <title><?= $isSingle ? 'Dossier Médical #'.$dossier->id : 'Tous les Dossiers Médicaux' ?></title>
   <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: 'Arial', sans-serif; 
            line-height: 1.3; 
            color: #333;
            font-size: 11px;
            margin: 10px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 8px;
            padding: 12px;
            background: linear-gradient(135deg, rgb(84, 141, 110), #2e6642);
            color: white;
            border-radius: 6px;
        }
        
        .header h1 {
            font-size: 16px;
            margin-bottom: 4px;
            font-weight: bold;
        }
        
        .header h2 {
            font-size: 13px;
            opacity: 0.9;
            font-weight: normal;
        }
        
        .header .date-generated {
            margin-top: 6px;
            font-size: 10px;
            opacity: 0.8;
        }
        
        .dossier {
            border: 1px solid #e0e0e0;
            margin-bottom: 15px;
            padding: 12px;
            page-break-inside: avoid;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }
        
        .dossier-header {
            background: linear-gradient(135deg, rgb(84, 141, 110), #2e6642);
            color: white;
            padding: 8px;
            margin: -12px -12px 12px -12px;
            border-radius: 5px 5px 0 0;
            text-align: center;
        }
        
        .dossier-header h3 {
            font-size: 14px;
            margin-bottom: 2px;
        }
        
        .dossier-header .patient-id {
            font-size: 10px;
            opacity: 0.9;
        }
        
        .section {
            margin-bottom: 8px;
            border: 1px solid #f0f0f0;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .section-title {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 6px 8px;
            font-weight: bold;
            font-size: 11px;
            color: #495057;
            border-bottom: 1px solid rgb(84, 141, 110);
            display: flex;
            align-items: center;
        }
        
        .section-title::before {
            content: '';
            width: 3px;
            height: 12px;
            background: rgb(84, 141, 110);
            margin-right: 6px;
            border-radius: 1px;
        }
        
        .section-content {
            padding: 8px;
        }
        
        .status-badge {
            padding: 0.2rem 0.5rem;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
        }
    
        .blood-type {
            background: #dc3545;
            color: white;
        }
            
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6px;
            margin-bottom: 6px;
        }
        
        .info-item {
            display: flex;
            margin-bottom: 4px;
            padding: 4px;
            background: #f8f9fa;
            border-radius: 3px;
            border-left: 2px solid rgb(84, 141, 110);
            font-size: 10px;
        }
        
        .info-label {
            min-width: 80px;
            font-weight: bold;
            font-size: large;
            margin-bottom: 5px;
            color: rgb(84, 141, 110);
            display: flex;
            align-items: center;
        }
        
        .info-value {
            color: #212529;
            font-weight: 500;
        }
        
        .blood-group {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            padding: 2px 6px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 9px;
            text-transform: uppercase;
            display: inline-block;
        }
        
        .dates-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-bottom: 8px;
        }
        
        .date-box {
            text-align: center;
            padding: 6px;
            border-radius: 4px;
            border: 1px dashed #dee2e6;
        }
        
        .date-box.admission {
            background: rgba(40, 167, 69, 0.1);
            border-color: #28a745;
        }
        
        .date-box.fin-traitement {
            background: rgba(220, 53, 69, 0.1);
            border-color: #dc3545;
        }
        
        .date-box .date-label {
            font-size: 9px;
            text-transform: uppercase;
            font-weight: bold;
            color: #6c757d;
            margin-bottom: 2px;
        }
        
        .date-box .date-value {
            font-size: 12px;
            font-weight: bold;
        }
        
        .date-box.admission .date-value {
            color: #28a745;
        }
        
        .date-box.fin-traitement .date-value {
            color: #dc3545;
        }
        
        .costs-section {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 6px;
            margin-top: 8px;
        }
        
        .cost-box {
            text-align: center;
            padding: 6px;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }
        
        .cost-box.total {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: white;
            border-color: #28a745;
        }
        
        .cost-box.acompte {
            background: rgba(255, 193, 7, 0.2);
            color: #856404;
            border-color: #ffc107;
        }
        
        .cost-box.restant {
            background: rgba(23, 162, 184, 0.2);
            color: #0c5460;
            border-color: #17a2b8;
        }
        
        .cost-label {
            font-size: 9px;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 2px;
        }
        
        .cost-value {
            font-size: 11px;
            font-weight: bold;
        }
        
        .diagnostic-box {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-left: 3px solid #17a2b8;
            padding: 6px;
            border-radius: 3px;
            margin: 4px 0;
            font-size: 10px;
        }
        
        .status-en-cours {
            background: #ffc107;
            color: #856404;
        }
        
        .status-termine {
            background: #28a745;
            color: white;
        }
        
        .footer {
            text-align: center;
            margin-top: 5px;
            padding: 8px;
            border-top: 1px solid #dee2e6;
            font-size: 9px;
            color: #6c757d;
            /* page-break-inside: avoid; */
        }
        
        .summary-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin-bottom: 15px;
        }
        
        .stat-box {
            text-align: center;
            padding: 6px;
            background: #f8f9fa;
            border-radius: 4px;
            border: 1px solid #dee2e6;
        }
        
        .stat-number {
            font-size: 16px;
            font-weight: bold;
            color: rgb(84, 141, 110);
        }
        
        .stat-label {
            font-size: 9px;
            color: #6c757d;
            text-transform: uppercase;
            font-weight: bold;
        }
        
        /* Compact layout for single records */
        .single-record .info-grid {
            grid-template-columns: 1fr 1fr 1fr;
            gap: 4px;
        }
        
        .single-record .dates-section {
            grid-template-columns: 1fr 1fr 1fr;
        }
        
        .single-record .section {
            margin-bottom: 6px;
        }
        
        @media print {
            body {
                margin: 5px;
                font-size: 10px;
            }
            
            .dossier {
                page-break-inside: avoid;
                page-break-after: always;
                box-shadow: none;
                margin-bottom: 0;
            }
            
            .dossier:last-child {
                page-break-after: avoid;
            }
            
            .header {
                margin-bottom: 5px;
                padding: 8px;
            }
            
            .section-content {
                padding: 6px;
            }
            
            .footer {
                margin-top: 10px;
                padding: 5px;
            }
        }
   </style>
</head>
<body>

    <?php if ($isSingle): ?>
        <!-- SINGLE DOSSIER TEMPLATE -->
        <div class="header">
            <h1>🏥 Dossier Médical #<?= $dossier->id ?></h1>
            <h2><?= htmlspecialchars($dossier->nom_complet) ?></h2>
            <div class="date-generated">
                Généré le <?= date('d/m/Y à H:i') ?>
            </div>
        </div>

        <div class="dossier single-record">
            <!-- Patient Information Section -->
            <div class="section">
                <div class="section-title"> Informations Patient</div>
                <div class="section-content">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">ID:</div>
                            <div class="info-value"><?= htmlspecialchars($dossier->patient_id) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Nom:</div>
                            <div class="info-value"><?= htmlspecialchars($dossier->nom_complet) ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Groupe:</div>
                            <div class="info-value">
                                <span class="blood-group"><?= htmlspecialchars($dossier->groupe_sanguin) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Medical Information Section -->
            <div class="section">
                <div class="section-title">🩺 Informations Médicales</div>
                <div class="section-content">
                    <div class="info-item">
                        <div class="info-label">Maladie:</div>
                        <div class="info-value"><?= htmlspecialchars($dossier->type_maladie) ?></div>
                    </div>
                    
                    <div class="diagnostic-box">
                        <strong>Diagnostic:</strong><br>
                        <?= nl2br(htmlspecialchars($dossier->diagnostic)) ?>
                    </div>
                </div>
            </div>

            <!-- Treatment Dates & Financial in one row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                <!-- Treatment Dates Section -->
                <div class="section">
                    <div class="section-title"> Dates</div>
                    <div class="section-content">
                        <div class="dates-section" style="grid-template-columns: 1fr;">
                            <div class="date-box admission">
                                <div class="date-label">Admission</div>
                                <div class="date-value">
                                    <?= date('d/m/Y', strtotime($dossier->date_admission)) ?>
                                </div>
                            </div>
                            <div class="date-box fin-traitement">
                                <div class="date-label">Fin</div>
                                <div class="date-value">
                                    <?= $dossier->date_fin_traitement ? date('d/m/Y', strtotime($dossier->date_fin_traitement)) : 'En cours' ?>
                                </div>
                            </div>
                        </div>
                        
                        <div style="text-align: center; margin-top: 6px;">
                            <?php if ($dossier->date_fin_traitement): ?>
                                <span class="status-badge status-termine"> Terminé</span>
                            <?php else: ?>
                                <span class="status-badge status-en-cours"> En Cours</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Financial Information Section -->
                <div class="section">
                    <div class="section-title"> Finances</div>
                    <div class="section-content">
                        <div class="costs-section" style="grid-template-columns: 1fr;">
                            <div class="cost-box total">
                                <div class="cost-label">Total</div>
                                <div class="cost-value"><?= number_format($dossier->cout_traitement ?? 0, 0) ?> MAD</div>
                            </div>
                            <div class="cost-box acompte">
                                <div class="cost-label">Acompte</div>
                                <div class="cost-value"><?= number_format($dossier->acompte_cout ?? 0, 0) ?> MAD</div>
                            </div>
                            <div class="cost-box restant">
                                <div class="cost-label">Restant</div>
                                <div class="cost-value">
                                    <?= number_format(($dossier->cout_traitement ?? 0) - ($dossier->acompte_cout ?? 0), 0) ?> MAD
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>

        <!--********************************************** MULTIPLE DOSSIERS TEMPLATE -->
        <div class="header">
            <h1> Tous les Dossiers Médicaux</h1>
            <h2>Patient ID: <?= htmlspecialchars($patient_id) ?></h2>
            <div class="date-generated">
                Rapport généré le <?= date('d/m/Y') ?> - Total: <?= count($dossiers) ?> dossiers
            </div>
        </div>

        <?php foreach ($dossiers as $dossier): ?>
            <div class="dossier">
                <div class="dossier-header">
                    <h3>Dossier #<?= $dossier->id ?> - <?= htmlspecialchars($dossier->nom_complet) ?></h3>
                    <div class="patient-id">Patient ID: <?= htmlspecialchars($dossier->patient_id) ?></div>
                </div>
                
                <!-- Compact 2-column layout -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                    <!-- Left Column -->
                    <div>

                        <!-- Medical Information -->
                        <div class="section">
                            <div class="section-title"> Informations Médicales</div>
                            <div class="section-content">
                                <div class="info-item">
                                    <div class="info-label">Groupe:</div>
                                    <span class="status-badge blood-type">
                                        <i class="fas fa-tint"></i> <?= $dossier->groupe_sanguin ?>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Maladie:</div>
                                    <div class="info-value"><?= htmlspecialchars($dossier->type_maladie) ?></div>
                                </div>
                                
                                <div class="diagnostic-box">
                                    <div class="info-label">Diagnostic:</div>
                                    <?= nl2br(htmlspecialchars($dossier->diagnostic)) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div>
                        <!-- Treatment Dates Section -->
                        <div class="section">
                            <div class="section-title"> Dates de Traitement</div>
                            <div class="section-content">
                                <div class="dates-section">
                                    <div class="date-box admission">
                                        <div class="date-label">Admission</div>
                                        <div class="date-value">
                                            <?= date('d/m/Y', strtotime($dossier->date_admission)) ?>
                                        </div>
                                    </div>
                                    <div class="date-box fin-traitement">
                                        <div class="date-label">Fin</div>
                                        <div class="date-value">
                                            <?= $dossier->date_fin_traitement ? date('d/m/Y', strtotime($dossier->date_fin_traitement)) : 'En cours' ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="text-align: center; margin-top: 6px;">
                                    <?php if ($dossier->date_fin_traitement): ?>
                                        <span class="status-badge status-termine"> Terminé</span>
                                    <?php else: ?>
                                        <span class="status-badge status-en-cours"> En Cours</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Information Section -->
                        <div class="section">
                            <div class="section-title"> Informations Financières</div>
                            <div class="section-content">                               
                                <div class="costs-section">
                                    <div class="cost-box total">
                                        <div class="cost-label">Total</div>
                                        <div class="cost-value"><?= number_format($dossier->cout_traitement ?? 0, 0) ?></div>
                                    </div>
                                    <div class="cost-box acompte">
                                        <div class="cost-label">Acompte</div>
                                        <div class="cost-value"><?= number_format($dossier->acompte_cout ?? 0, 0) ?></div>
                                    </div>
                                    <div class="cost-box restant">
                                        <div class="cost-label">Restant</div>
                                        <div class="cost-value">
                                            <?= number_format(($dossier->cout_traitement ?? 0) - ($dossier->acompte_cout ?? 0), 0) ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div style="text-align: center; margin-top: 6px;">
                                    <?php if ($dossier->date_fin_traitement): ?>
                                        <span class="status-badge status-termine"> Terminé</span>
                                    <?php else: ?>
                                        <span class="status-badge status-en-cours">En Cours</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="footer">
               <p><strong> Système de Gestion Médicale</strong></p>
               <p>Rapport généré le <?= date('d/m/Y à H:i:s') ?> - Document confidentiel</p>
           </div>

            </div>


        <?php endforeach; ?>
    <?php endif; ?>


</body>
</html>