<?php
// Include config.php for database connection
include '../config.php';
// Include userc.php for user related functions
include '../controller/userc.php';

$userc = new userC(); // Create an instance of userC class

// Initialize variables
$results = array();

// Check if search term is provided
if (isset($_GET['search_term'])) {
    // Get search parameter from GET
    $search_term = $_GET['search_term'];

    // Perform search
    $results = $userc->finduser($search_term);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#search_term').keyup(function(){
                var search_term = $(this).val();
                $.ajax({
                    url: 'recherche.php',
                    type: 'GET',
                    data: { search_term: search_term },
                    success: function(data){
                        $('#search_results').html(data);
                    }
                });
            });
        });
    </script>
</head>
<body>

<h2>User Search</h2>

<form>
    <label for="search_term">Search:</label>
    <input type="text" id="search_term" name="search_term">
</form>

<div id="search_results">
    <?php if (!empty($results)) : ?>
        <table>
            <tr> 
                <th>ID</th>
                <th>nom</th>
                <th>prenom</th>
                <th>Email</th>
                <th>Code</th>
                <th>Adresse</th>
                <th>Numéro</th>
                <th>Mise à jour</th>
                <th>Supprimer</th>
                <!-- Add more fields as needed -->
            </tr>
            <?php foreach ($results as $user) : ?>
                <tr>
                    <td><?php echo $user['iduser']; ?></td>
                    <td><?php echo $user['nom']; ?></td>
                    <td><?php echo $user['prenom']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['code']; ?></td>
                    <td><?php echo $user['adresse']; ?></td>
                    <td><?php echo $user['numero']; ?></td>
                    <!-- Add more fields as needed -->
                    <td align="center">
                <form method="POST" action="updateuser.php">
                    <input type="submit" name="update" value="Mettre à jour">
                    <input type="hidden" value=<?= $user['iduser']; ?> name="iduser">
                </form>
            </td>
            <td>
                <a href="deleteuser.php?id=<?= $user['iduser']; ?>">Supprimer</a>
            </td>
        </tr>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>
</div>

</body>
</html>
