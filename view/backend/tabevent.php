<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="These can be used with other components and elements to create stunning and unique new elements for your UIs.">
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <meta name="msapplication-tap-highlight" content="no">
    <link href="main.07a59de7b920cd76b874.css" rel="stylesheet">
    <style>
        .content-table {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .reviews-statistics {
            text-align: center;
            margin-top: 80px;
        }

        .progress-bar-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            position: relative; /* Added */
        }

        .progress-bar {
            width: 400px;
            height: 30px;
            background-color: #f0f0f0;
            border-radius: 15px;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative; /* Added */
        }

        .progress-bar-fill,
        .progress-bar-empty {
            position: absolute;
            top: 0;
            bottom: 0;
            line-height: 30px;
            color: white;
            transition: width 0.5s;
        }

        .progress-bar-fill {
            left: 0;
            background-color: #007bff;
            text-align: left;
        }

        .progress-bar-empty {
            right: 0;
            background-color: #ccc;
            text-align: right;
        }

        .progress-label {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="app-container app-theme-gray">
        <div class="app-main">
            <div class="app-sidebar-wrapper">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                    <div class="scrollbar-sidebar scrollbar-container">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-sidebar-overlay d-none animated fadeIn"></div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="header-mobile-wrapper">
                        <div class="app-header__logo">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="KeroUI Admin Template" class="logo-src"></a>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-sidebar-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="app-header">
                        <div class="app-header-right">

                        </div>
                    </div>
                    <center><button id="print-pdf-btn">Print PDF</button></center>


                    <!-- Add the table here -->
                    <div class="content-table">
                        <h2 class="section-heading">Evenements</h2>
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Content</th>
                                    <th>User</th>
                                    <th>Time</th>
                                    <th>Adresse</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
// Assuming you're already connected to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graja";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to select all records from the 'evenement' table
    $sql = "SELECT * FROM evenement";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Output data of each row
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['Content'] . "</td>";
            echo "<td>" . $row['user'] . "</td>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['adresse'] . "</td>";
            echo "<td>" . $row['prix'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No records found</td></tr>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>

                            </tbody>
                        </table>
                    </div>


                    <!-- Reviews Statistics -->
                    <div class="reviews-statistics">
                        <?php
                        // Database connection settings
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "graja";

                        try {
                            // Create a PDO connection
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                            // Set PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL query to count the number of events with reviews
                            $sql_with_reviews = "SELECT COUNT(DISTINCT idevenement) AS count_with_reviews FROM avis";
                            $result_with_reviews = $conn->query($sql_with_reviews);

                            // Get the count of events with reviews
                            $count_with_reviews = $result_with_reviews->fetchColumn();

                            // SQL query to count the total number of events
                            $sql_total_events = "SELECT COUNT(*) AS count_total_events FROM evenement";
                            $result_total_events = $conn->query($sql_total_events);

                            // Get the count of total events
                            $count_total_events = $result_total_events->fetchColumn();

                            // Calculate the percentage of events with reviews
                            $percentage_with_reviews = ($count_with_reviews / $count_total_events) * 100;

                            // Calculate the percentage of events without reviews
                            $percentage_without_reviews = 100 - $percentage_with_reviews;

                            // SQL query to count the number of events with prices over 100
                            $sql_over_100 = "SELECT COUNT(*) AS count_over_100 FROM evenement WHERE prix > 100";
                            $result_over_100 = $conn->query($sql_over_100);

                            // Get the count of events with prices over 100
                            $count_over_100 = $result_over_100->fetchColumn();

                            // SQL query to count the number of events with prices under 100
                            $sql_under_100 = "SELECT COUNT(*) AS count_under_100 FROM evenement WHERE prix <= 100";
                            $result_under_100 = $conn->query($sql_under_100);

                            // Get the count of events with prices under 100
                            $count_under_100 = $result_under_100->fetchColumn();

                            // Calculate the total number of events
                            $total_events = $count_over_100 + $count_under_100;

                            // Calculate the percentage of events with prices over 100
                            $percentage_over_100 = ($count_over_100 / $total_events) * 100;

                            // Calculate the percentage of events with prices under 100
                            $percentage_under_100 = ($count_under_100 / $total_events) * 100;
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                        ?>

                        <div class="progress-bar-container">
                            <div class="progress-bar">
                                <div class="progress-bar-fill" style="width: <?= $percentage_with_reviews ?>%;">
                                    <?= round($percentage_with_reviews, 2) ?>%
                                </div>
                                <div class="progress-bar-empty" style="width: <?= $percentage_without_reviews ?>%;">
                                    <?= round($percentage_without_reviews, 2) ?>%
                                </div>
                            </div>
                        </div>
                        <div class="progress-label">
                            Evenements avec avis : <?= $count_with_reviews ?><br>
                            Evenements sans avis : <?= $count_total_events - $count_with_reviews ?>
                        </div>

                        <div class="price-statistics">
                            <div class="progress-bar-container">
                                <div class="progress-bar">
                                    <div class="progress-bar-fill" style="width: <?= $percentage_over_100 ?>%;">
                                        <?= round($percentage_over_100, 2) ?>%
                                    </div>
                                    <div class="progress-bar-empty" style="width: <?= $percentage_under_100 ?>%;">
                                        <?= round($percentage_under_100, 2) ?>%
                                    </div>
                                </div>
                            </div>
                            <div class="progress-label">
                                Evenements avec prix > 100 : <?= $count_over_100 ?><br>
                                Evenements avec prix <= 100 : <?= $count_under_100 ?>
                            </div>
                        </div>
                    </div>

                    <div class="app-drawer-wrapper">
                        <div class="drawer-nav-btn">
                            <button type="button" class="hamburger hamburger--elastic is-active">
                                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                            </button>
                        </div>
                    </div>
                    <div class="app-drawer-overlay d-none animated fadeIn"></div>
                    <script type="text/javascript" src="assets/scripts/main.07a59de7b920cd76b874.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#myTable').DataTable();
                        });
                    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


<script>
    function printPage() {
  const printContent = document.documentElement.outerHTML;
  const originalContent = document.body.innerHTML;

  document.body.innerHTML = printContent;
  window.print();
  document.body.innerHTML = originalContent;
}

document.getElementById('print-pdf-btn').addEventListener('click', printPage);
</script>




                    <script>
                        $(document).ready(function() {
                            $('.circle-progress').each(function() {
                                var progress = $(this).data('progress');
                                var degrees = progress * 3.6;
                                if (progress >= 50) {
                                    $(this).find('span').css('background-color', '#4caf50');
                                } else {
                                    $(this).find('span').css('background-color', '#f44336');
                                }
                                $(this).find('span').css('transform', 'rotate(' + degrees + 'deg)');
                            });
                        });
                    </script>
</body>

</html>