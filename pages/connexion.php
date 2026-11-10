<?php
function connectToDatabase($host, $dbname, $user, $pass)
{
    try {
        $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}
// Utilisation de la fonction
$host = 'localhost';
$dbname = 'gestion_commandes';
$user = 'root';
$pass = '';
$databaseConnection = connectToDatabase($host, $dbname, $user, $pass);
if ($databaseConnection) {
    echo "Connexion réussie à la base de données.";
} else {
    echo "Échec de la connexion à la base de données.";
}
?>