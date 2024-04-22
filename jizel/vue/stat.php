<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication Statistics</title>
    <link rel="stylesheet" href="statistics.css">
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Couleur de fond */
            color: #212529; /* Couleur du texte */
            margin: 0;
            padding: 0;
        }

        h1 {
            color: red; /* Couleur du titre */
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        h4 {
            color: #dc3545; /* Couleur du sous-titre */
            margin-bottom: 10px;
        }

        .statistics-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .statistics-item {
            margin-bottom: 10px;
        }

        .statistics-label {
            font-weight: bold;
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #dc3545;
            border-radius: 5px;
            margin-right: 10px;
        }

        #chart-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #dc3545; /* Bordure */
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #pdf-content {
            padding: 20px;
            border: 2px solid #dc3545; /* Bordure */
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #logo {
            width: 150px; /* Taille du logo */
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>Publication Statistics</h1>
    <?php
    require_once 'C:/xampp/htdocs/jizel/controller/PublicationCrud.php';

    // Récupérer les statistiques de publication
    $c = new PublicationCrud();
    $publicationStatistics = $c->getEventStatistics();
    $jsonData = json_encode($publicationStatistics);

    if (!empty($publicationStatistics)) {
        echo "<h4>Publication Statistics:</h4>";
        echo "<div class='statistics-list'>";
        foreach ($publicationStatistics as $publication => $count) {
            echo "<span class='statistics-label'>$publication: $count</span>";
        }
        echo "</div>";
    } else {
        echo "<p>No statistics available.</p>";
    }
    ?>

    <!-- Create a canvas for the chart -->
    <div id="chart-container">
        <canvas id="myChart" width="600" height="400"></canvas>
    </div>

    <!-- Content for PDF -->
    <div id="pdf-content">
        <img id="logo" src="logo.png" alt="Logo"> <!-- Ajoutez votre logo -->
        <h1>Publication Statistics</h1>
        <?php
        // Affichage des statistiques pour le PDF
        if (!empty($publicationStatistics)) {
            echo "<h4>Publication Statistics:</h4>";
            echo "<div class='statistics-list'>";
            foreach ($publicationStatistics as $publication => $count) {
                echo "<span class='statistics-label'>$publication: $count</span>";
            }
            echo "</div>";
        } else {
            echo "<p>No statistics available.</p>";
        }
        ?>
    </div>

    <!-- JavaScript for Chart.js -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var jsonData = <?php echo $jsonData; ?>;

            var labels = Object.keys(jsonData);
            var data = Object.values(jsonData);

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Publication Statistics',
                        data: data,
                        backgroundColor: '#dc3545', // Couleur des barres
                        borderColor: '#dc3545', // Couleur de la bordure
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Ajouter un bouton pour générer le PDF
            var generatePdfButton = document.createElement('button');
            generatePdfButton.innerHTML = 'Generate PDF';
            generatePdfButton.classList.add('btn', 'btn-primary');
            generatePdfButton.onclick = function() {
                generatePDF(); // Appel de la fonction de génération de PDF
            };
            document.getElementById('chart-container').appendChild(generatePdfButton);
        });

        // Fonction pour générer le PDF
        function generatePDF() {
            var pdfContent = document.getElementById('pdf-content').innerHTML;
            var pdfWindow = window.open('', '_blank');
            pdfWindow.document.open();
            pdfWindow.document.write('<html><head><title>Publication Statistics PDF</title></head><body>' + pdfContent + '</body></html>');
            pdfWindow.document.close();
            pdfWindow.print();
        }
    </script>
</body>

</html>

