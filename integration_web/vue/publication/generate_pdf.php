<?php
require_once 'C:/xampp/htdocs/web_project/controller/publication/PublicationCrud.php';
require_once('tcpdf/tcpdf.php');

// Récupérer les statistiques de publication
$c = new PublicationCrud();
$publicationStatistics = $c->getEventStatistics();
$jsonData = json_encode($publicationStatistics);

// Créer une nouvelle instance TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

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
if (!empty($publicationStatistics)) {
    $pdfContent .= "Publication Statistics:\n\n";
    foreach ($publicationStatistics as $publication => $count) {
        $pdfContent .= "$publication: $count\n\n";
    }
} else {
    $pdfContent .= "No statistics available.\n";
}

// Écrire le contenu dans le PDF
$pdf->Write(0, $pdfContent, '', 0, 'L', true, 0, false, false, 0);

// Nommer le fichier PDF
$pdfName = 'publication_statistics.pdf';

// Sortie du PDF en tant que fichier
$pdf->Output($pdfName, 'D');
?>
