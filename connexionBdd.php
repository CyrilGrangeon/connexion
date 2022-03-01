<?php
//-----------Connection PDO-------
//Constantes
define('DBHOST', 'localhost');
define('DBNAME', 'bdd');
define('DBUSER', 'root');
define('DBPASS', '');

//DSN de connexion (dsn = data source name)
$dsn = "mysql:dbname=" . DBNAME .";host=" . DBHOST; 

//Assurer la connexion
try{
    $db = new PDO($dsn, DBUSER, DBPASS); // On instancie la classe PDO
    echo 'Connexion établie avec succée.';
    $db->exec("SET NAMES utf8"); //On s'assure d'envoyer les données avec l'encodage UTF8
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //parametrage du fectch par defaut
}catch(PDOException $e){
    die("Erreur : " . $e->getMessage()); //Affiche un message d'erreur si echec de la connection
}
