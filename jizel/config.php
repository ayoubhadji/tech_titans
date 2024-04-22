<?php

class config
{
    private static $pdo = null;

    public static function getConnection()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=publication'
                    //les informations nécessaires pour se connecter à la base.
                    ,
                    'root',
                    '',
                    [   //configuration  permet de lancer  PDOException en cas d’erreur.
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        // configuration permet de spécifier la méthode de récupération chaque ligne est retournées dans un tableau indexé par le nom des colonnes.
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}