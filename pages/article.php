<?php
$title = "Article";
include_once 'header.php';
include_once 'connexion.php';
?>
<main>
    <div class="content">

        <h1>Article</h1>
        <!-- appel de la datatable par id -->
        <table id="datatable" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
</main>
<?php
include_once 'footer.php';
?>