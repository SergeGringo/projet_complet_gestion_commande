<?php
$title = "Modifier un client";
include_once 'header.php';
include_once 'connexion.php';

// // Initialisation des variables
$nom = '';
$prenom = '';
$ville = '';
$telephone = '';

// // Initialisation des erreurs

$errors = array(
    'nom' => '',
    'prenom' => '',
    'ville' => '',
    'telephone' => ''
);

// if (isset($_POST['ajouter'])) {

//     if (empty($_POST['nom'])) {
//         $errors['nom'] = "le nom est vide";
//     } else {
//         $nom = htmlspecialchars($_POST['nom']);
//     }
//     if (empty($_POST['prenom'])) {
//         $errors['prenom'] = "le prenom est vide";
//     } else {
//         $prenom = htmlspecialchars($_POST['prenom']);
//     }
//     if (empty($_POST['ville'])) {
//         $errors['ville'] = "la ville est vide";
//     } else {
//         $ville = htmlspecialchars($_POST['ville']);
//     }
//     if (empty($_POST['telephone'])) {
//         $errors['telephone'] = "le telephone est vide";
//     } else {
//         $telephone = htmlspecialchars($_POST['telephone']);
//         // if (!preg_match('/^[0-9]+$/', $telephone)) {
//         //     echo "Le numéro de téléphone doit contenir uniquement des chiffres.";
//         // }
//     }
//     // Vérification si toutes les erreurs sont vides
//     if (array_filter($errors)) {
//         echo "Veuillez corriger les erreurs dans le formulaire.";
//     } else {
//         // Préparation de la requête d'insertion
//         $query = "INSERT INTO client (nom, prenom, ville, telephone) VALUES (:nom, :prenom, :ville, :telephone)";
//         $pdostmt = $databaseConnection->prepare($query);

//         // Liaison des paramètres
//         $pdostmt->bindParam(':nom', $nom);
//         $pdostmt->bindParam(':prenom', $prenom);
//         $pdostmt->bindParam(':ville', $ville);
//         $pdostmt->bindParam(':telephone', $telephone);

//         // Exécution de la requête
//         if ($pdostmt->execute()) {
//             header('Location: clients.php');
//             exit();
//         } else {
//             echo "Erreur lors de l'ajout du client.";
//         }
//     }
// }
// Vérification si l'ID du client est passé en paramètre
if (!empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    // Préparation de la requête pour récupérer les informations du client
    $query = "SELECT * FROM client WHERE id_client = :id AND is_deleted = 0";
    $pdostmt = $databaseConnection->prepare($query);
    $pdostmt->bindParam(':id', $id);
    $pdostmt->execute();

    // Vérification si le client existe
    if ($pdostmt->rowCount() > 0) {
        $client = $pdostmt->fetch(PDO::FETCH_ASSOC);
        // Récupération des informations du client
        $nom = $client['nom'];
        $prenom = $client['prenom'];
        $ville = $client['ville'];
        $telephone = $client['telephone'];
    } else {
        echo "Client non trouvé.";
        exit();
    }
} else {
    echo "ID du client manquant.";
    exit();
}




?>
<main>
    <div class="content">
        <h1>Modifier un client</h1>

        <form action="" method="POST" class="element_form">
            <div class="formulaire">
                <div class="separator1">
                    <div class="mb-3">
                        <label for="nom" class="form-label">NOM</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>">
                        <div id="nom" class="form-text"><?php echo $errors['nom']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">PRENOM</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>">
                        <div id="prenom" class="form-text"><?php echo $errors['prenom']; ?></div>
                    </div>

                </div>
                <div class="separator2">
                    <div class="mb-3">
                        <label for="ville" class="form-label">VILLE</label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?php echo htmlspecialchars($ville); ?>">
                        <div id="prenom" class="form-text"><?php echo $errors['ville']; ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">TELEPHONE</label>
                        <input type="number" class="form-control" id="telephone" name="telephone" value="<?php echo htmlspecialchars($telephone); ?>">
                        <div id="telephone" class="form-text"><?php echo $errors['telephone']; ?></div>
                    </div>

                </div>
            </div>
            <div class="mb-3 soumission">
                <input type="submit" name="modifier" class="btn btn-primary mt-3" value="+ Modifier">
            </div>
        </form>


    </div>
</main>

<?php

if (isset($_POST['modifier'])) {
    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $ville = htmlspecialchars($_POST['ville']);
    $telephone = htmlspecialchars($_POST['telephone']);

    // Vérification des erreurs
    if (empty($nom)) {
        $errors['nom'] = "Le nom est vide";
    }
    if (empty($prenom)) {
        $errors['prenom'] = "Le prénom est vide";
    }
    if (empty($ville)) {
        $errors['ville'] = "La ville est vide";
    }
    if (empty($telephone)) {
        $errors['telephone'] = "Le téléphone est vide";
    }

    // Si aucune erreur, mise à jour du client
    if (!array_filter($errors)) {
        $query = "UPDATE client SET nom = :nom, prenom = :prenom, ville = :ville, telephone = :telephone WHERE id_client = :id";
        $pdostmt = $databaseConnection->prepare($query);
        $pdostmt->bindParam(':id', $id);
        $pdostmt->bindParam(':nom', $nom);
        $pdostmt->bindParam(':prenom', $prenom);
        $pdostmt->bindParam(':ville', $ville);
        $pdostmt->bindParam(':telephone', $telephone);

        if ($pdostmt->execute()) {
            header('Location: clients.php');
            exit();
        } else {
            echo "Erreur lors de la modification du client.";
        }
    }
}
// Fin de la vérification des erreurs
?>



<?php include_once 'footer.php'; ?>