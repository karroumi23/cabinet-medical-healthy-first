<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;

ob_start();
include 'views/patient/pdf_patients.php'; // This is the HTML view for the PDF
$html = ob_get_clean();

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Optional settings
$dompdf->setPaper('A4', 'landscape');

// Render and stream
$dompdf->render();
$dompdf->stream("patients.pdf", ["Attachment" => false]); // false = open in browser
