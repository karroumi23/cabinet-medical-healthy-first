<?php
 //to display logo 
  $logoPath = __DIR__ . '/../../public/image/logo1.png';
  $logoBase64 = base64_encode(file_get_contents($logoPath));
   $logoSrc = 'data:image/png;base64,' . $logoBase64;
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des Patients - Rapport Professionnel</title>
<style>
        @page {
            margin: 1.5cm 1cm;
            size: A4;
        }
        
        body { 
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; 
            font-size: 11pt; 
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
            position: relative;
            min-height: 100vh;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }
        
        .logo {
            height: 90px;
        }
        
        .header-text {
            text-align: right;
        }
        
        h1 {
            color: rgb(58, 177, 12);
            font-size: 18pt;
            margin: 15px 0 5px;
            padding: 0;
            text-align: center;
            font-weight: 600;
        }
        
        .report-date {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 10pt;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 60px; /* Space for footer */
        }
        
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 300;
            text-transform: uppercase;
            font-size: 8pt;
            letter-spacing: 0.5px;
            padding: 10px 8px;
            text-align: left;
        }
        
        td {
            padding: 8px;
            border-bottom: 1px solid #e0e0e0;
            text-align: left;
            vertical-align: top;
        }
        tr{
            font-size: 7pt;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .text-center {
            text-align: center;
        }
        
        #footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            border-top: 1px solid #4CAF50;
            padding: 10px 0;
            background-color: white;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 9pt;
            color: #666;
            max-width: 95%;
            margin: 0 auto;
        }
        
        .footer-center {
            text-align: center;
            flex-grow: 1;
        }
        
        .footer-right {
            text-align: right;
            min-width: 100px;
        }
        
        .page-number:before {
            content: "Page " counter(page);
        }
        
        .main-content {
            padding-bottom: 60px; /* Equal to footer height */
        }
        
</style>

</head>
<body>
    <div class="header">
     <img src="<?= $logoSrc ?>" class="logo">
        <div class="header-text">
            <strong>Health First</strong><br>
            123 Rue de la Santé<br>
            casablanca, 2000<br>
            Tél: 01 23 45 67 89
        </div>
    </div>

    <div class="main-content">
        <h1>Liste des Patients</h1>
        <div class="report-date">
            Généré le: <?= date('d/m/Y à H:i') ?>
        </div>

        <table>
            <thead>
                <tr >
                    <th>ID</th>
                    <th>Nom complet</th>
                    <th>Âge</th>
                    <th>Genre</th>
                    <th>N° Sécurité Sociale</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Date d'ajout</th>
                    <th>Créé par</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $p): ?>
                    <tr>
                        <td class="text-center"><?= $p->id ?></td>
                        <td><strong><?= htmlspecialchars($p->nom . ' ' . $p->prenom) ?></strong></td>
                        <td class="text-center"><?= $p->age ?> ans</td>
                        <td class="text-center"><?= $p->genre ?></td>
                        <td class="text-center"><?= $p->numero_securite_sociale ?></td>
                        <td><?= $p->tel ?></td>
                        <td><?= htmlspecialchars($p->adresse) ?></td>
                        <td><?= date('d/m/Y', strtotime($p->date_ajout)) ?></td>
                        <td><?= $p->cree_par ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div id="footer">
        <div class="footer-content">
            <div class="footer-center">
                &copy; <?= date('Y') ?> Health First. Tous droits réservés.
            </div>
            <div class="footer-right">
                <span class="page-number"></span>
            </div>
        </div>
    </div>
</body>
</html>