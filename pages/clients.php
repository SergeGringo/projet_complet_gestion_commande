<?php
$title = "Clients";
include_once 'header.php';
include_once 'connexion.php';
?>
<main>
    <div class="content">
        <h1>Clients</h1>
        <a href="addclient.php" class="btn btn-primary placement"><i class="bi bi-person-add"></i></a>
        <?php
        $query = "SELECT * FROM client WHERE is_deleted = 0";
        $pdostmt = $databaseConnection->prepare($query);
        $pdostmt->execute();
        // var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));  

        ?>
        <!-- appel de la datatable par id -->
        <table id="datatable" class="display">
            <thead>
                <tr>
                    <th>ID Clients</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>TELEPHONE</th>
                    <th>VILLES</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pdostmt->fetchAll(PDO::FETCH_ASSOC) as $client) { ?>
                    <tr>
                        <td><?php echo $client['id_client']; ?></td>
                        <td><?php echo $client['nom']; ?></td>
                        <td><?php echo $client['prenom']; ?></td>
                        <td><?php echo $client['telephone']; ?></td>
                        <td><?php echo $client['ville']; ?></td>
                        <td>
                            <a href="modifclient.php?id=<?php echo $client['id_client']; ?>" class="btn btn-success">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-<?php echo $client['id_client']; ?>">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-<?php echo $client['id_client']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimer ce client ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <a href="delete.php?id=<?php echo $client['id_client']; ?>" type="button" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </tbody>
        </table>
    </div>
</main>

<?php
include_once 'footer.php';
?>