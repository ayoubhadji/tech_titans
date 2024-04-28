<?php
// Include the TCPDF library
require_once 'C:\Users\LENOVO\vendor\autoload.php';

// Retrieve the data passed from the table
$factureId = $_GET['facture_id'];
$reservationId = $_GET['reservation_id'];
$paiementId = $_GET['paiement_id'];
$total = $_GET['total'];
$dateCreated = $_GET['date_created'];
$nom = $_GET['nom'];
$paiementDate = $_GET['paiement_date'];

// Create a new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Facture PDF');
$pdf->SetSubject('Facture Details');
$pdf->SetKeywords('TCPDF, PDF, facture, details');

// Set default header data
$pdf->SetHeaderData('../../images/logob.jpg', PDF_HEADER_LOGO_WIDTH, 'PDF BY SARRA', 'Facture deatails');

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add a page
$pdf->AddPage();

// Add facture details to the PDF
$html = <<<EOD
<table border="1">
<tr><th>Facture ID</th><td>$factureId</td></tr>
<tr><th>Reservation ID</th><td>$reservationId</td></tr>
<tr><th>Paiement ID</th><td>$paiementId</td></tr>
<tr><th>Total</th><td>$total</td></tr>
<tr><th>Date Created</th><td>$dateCreated</td></tr>
<tr><th>Nom</th><td>$nom</td></tr>
<tr><th>Paiement Date</th><td>$paiementDate</td></tr>
</table>
EOD;

$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('facture.pdf', 'D');
?>
