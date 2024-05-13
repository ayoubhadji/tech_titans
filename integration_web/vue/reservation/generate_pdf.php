<?php
require_once '../../controller/reservation/reservationC.php';
require_once('../../vue/reservation/tcpdf/tcpdf.php');

// Récupérer les statistiques de publication
$c = new reservationC();
$reservationStatistics = $c->getreservationStatistics();
$jsonData = json_encode($reservationStatistics);

// Créer une nouvelle instance TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Ajouter une page
$pdf->AddPage();

// Définir la couleur et la taille de la police pour le titre
$pdf->SetFont('helvetica', 'B', 16); // Police helvetica, gras, taille 16

// Définir la couleur rouge pour le texte
$pdf->SetTextColor(255, 0, 0); // Rouge (RGB)

// Écrire le titre dans le PDF
$pdf->Cell(0, 10, 'Reservation Statistics', 0, 1, 'C');

// Réinitialiser la couleur et la police pour le contenu suivant
$pdf->SetFont('helvetica', '', 10); // Police helvetica, taille 10
$pdf->SetTextColor(0, 0, 0); // Noir (RGB)

// Créer une chaîne pour stocker les statistiques
$pdfContent = '';

// Construire la chaîne de contenu pour les statistiques
if (!empty($reservationStatistics)) {
    $pdfContent .= "reservation Statistics:\n\n";
    foreach ($reservationStatistics as $reservation => $count) {
        $pdfContent .= "$reservation: $count\n\n";
    }
} else {
    $pdfContent .= "No statistics available.\n";
}

// Écrire le contenu dans le PDF
$pdf->Write(0, $pdfContent, '', 0, 'L', true, 0, false, false, 0);

// Nommer le fichier PDF
$pdfName = 'reservation_statistics.pdf';

// Sortie du PDF en tant que fichier
$pdf->Output($pdfName, 'D');

// Définir les informations du document
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Publication Statistics');
$pdf->SetSubject('Publication Statistics');
$pdf->SetKeywords('TCPDF, PDF, statistics, publication');

// Définir les marges
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// Définir l'en-tête et le pied de page
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Définir la taille de la police
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetFontSize(10);

// Ajouter une page
$pdf->AddPage();

// Créer une chaîne pour stocker les statistiques
$pdfContent = '';

// Construire la chaîne de contenu pour les statistiques
if (!empty($reservationStatistics)) {
    $pdfContent .= "reservation Statistics:\n\n";
    foreach ($reservationStatistics as $reservation => $count) {
        $pdfContent .= "$reservation: $count\n\n";
    }
} else {
    $pdfContent .= "No statistics available.\n";
}

// Écrire le contenu dans le PDF
$pdf->Write(0, $pdfContent, '', 0, 'L', true, 0, false, false, 0);

// Nommer le fichier PDF
$pdfName = 'reservation_statistics.pdf';

// Sortie du PDF en tant que fichier
$pdf->Output($pdfName, 'D');
?>
