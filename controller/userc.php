<?php
include "C:/xampp/htdocs/projetvoyage/config.php";

class userc
{
    public function listuser()
{
    $sql = "SELECT * FROM user";
    $db = config::getConnexion();
    try
    {
        $lis = $db->query($sql);
        return $lis;
    }
    catch(Exception $e)
    {
        die('Error: ' . $e->getMessage());
    }
}
    function deleteuser($id)
    {
        $sql = "DELETE FROM user WHERE iduser  = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function adduser($user)
{
    $sql = "INSERT INTO user  
    VALUES (null, :nom, :prenom, :email, :code, :adresse, :numero, :rol)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nom' => $user->getnom(),
            'prenom' => $user->getprenom(),
            'email' => $user->getemail(),
            'code' => $user->getcode(),
            'adresse' => $user->getadresse(),
            'numero' => $user->getnumero(),
            'rol' => $user->getrol() 
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

    function showuser($id)
    {
        $sql = "SELECT * from user where iduser = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function finduser($search_term)
{
    $db = config::getConnexion();
    $sql = "SELECT * FROM user WHERE iduser LIKE '%$search_term%' OR nom LIKE '%$search_term%' OR prenom LIKE '%$search_term%' OR email LIKE '%$search_term%' OR code LIKE '%$search_term%' OR adresse LIKE '%$search_term%' OR numero LIKE '%$search_term%'";
    try {
        $lis = $db->query($sql);
        return $lis->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        return array(); // Return an empty array on error
    }
}

    function updateuser($user, $iduser)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET  
                    nom = :nom, 
                    prenom = :prenom, 
                    email= :email,
                    code = :code,
                    adresse = :adresse,
                    numero = :numero,
                    rol = :rol
                   
                WHERE iduser= :iduser'
            );
            $query->execute([
               
                'iduser' => $iduser,
                'nom' => $user->getnom(),
                'prenom' => $user->getprenom(),
                'email' => $user->getemail(),
                'code' => $user->getcode(),
                'adresse' => $user->getadresse(),
                'numero' => $user->getnumero(),
                'rol' => $user->getrol()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
}
?>