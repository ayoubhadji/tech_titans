<?php
include "config.php";
class user
{

    public function listuser()
    {
        $sql ="SELECT * FROM user";
        $db =config::getConnexion();
        try
        {
            $liste =$db->query($sql):
            return $liste;
        }
        catch(Exception $e)
        {
            die('Error:',$e(->getMessage()));
        }
    }
}
?>