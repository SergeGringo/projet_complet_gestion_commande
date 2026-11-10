<?php
$title = "Ajouter un client";
include_once 'header.php';
include_once 'connexion.php';

// Initialisation des variables
$nom = '';
$prenom = '';
$ville = '';
$telephone = '';

// Initialisation des erreurs

$errors = array(
    'nom' => '',
    'prenom' => '',
    'ville' => '',
    'telephone' => ''
);

if (isset($_POST['ajouter'])) {

    if (empty($_POST['nom'])) {
        $errors['nom'] = "le nom est vide";
    } else {
        $nom = htmlspecialchars($_POST['nom']);
    }
    if (empty($_POST['prenom'])) {
        $errors['prenom'] = "le prenom est vide";
    } else {
        $prenom = htmlspecialchars($_POST['prenom']);
    }
    if (empty($_POST['ville'])) {
        $errors['ville'] = "la ville est vide";
    } else {
        $ville = htmlspecialchars($_POST['ville']);
    }
    if (empty($_POST['telephone'])) {
        $errors['telephone'] = "le telephone est vide";
    } else {
        $telephone = htmlspecialchars($_POST['telephone']);
        // if (!preg_match('/^[0-9]+$/', $telephone)) {
        //     echo "Le numéro de téléphone doit contenir uniquement des chiffres.";
        // }
    }
    // Vérification si toutes les erreurs sont vides
    if (array_filter($errors)) {
        echo "Veuillez corriger les erreurs dans le formulaire.";
    } else {
        // Préparation de la requête d'insertion
        $query = "INSERT INTO client (nom, prenom, ville, telephone) VALUES (:nom, :prenom, :ville, :telephone)";
        $pdostmt = $databaseConnection->prepare($query);

        // Liaison des paramètres
        $pdostmt->bindParam(':nom', $nom);
        $pdostmt->bindParam(':prenom', $prenom);
        $pdostmt->bindParam(':ville', $ville);
        $pdostmt->bindParam(':telephone', $telephone);

        // Exécution de la requête
        if ($pdostmt->execute()) {
            header('Location: clients.php');
            exit();
        } else {
            echo "Erreur lors de l'ajout du client.";
        }
    }
}


?>
<main>
    <div class="content">
        <h1>Ajouter un client</h1>

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
                <input type="submit" name="ajouter" class="btn btn-primary mt-3" value="+ Ajouter">
            </div>
        </form>


    </div>
</main>



<?php include_once 'footer.php'; ?>