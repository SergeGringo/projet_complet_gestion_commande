<?php
include_once 'connexion.php';
// if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
//     $id = $_GET['id'];
//     $query = "DELETE FROM client WHERE id_client = $id";
//     $pdostmt = $databaseConnection->prepare($query);
//     $pdostmt->execute();
//     header('Location: clients.php');
// }

// Exemple de requête pour marquer un client comme supprimé


if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // Assurez-vous de valider et de sécuriser cet ID
    $pdostmt = $databaseConnection->prepare("UPDATE client SET is_deleted = 1 WHERE id_client = :id_client");
    $pdostmt->bindParam(':id_client', $id);
    $pdostmt->execute();

    header('Location: clients.php');
    exit();
}
