    <footer>


        <div class="footer_content">
            <p> &copy; Copyright 2025</p>
        </div>



    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/datatable.js"></script>
    <script src="../js/slick.js"></script>
    <script src="../js/script.js"></script>
    <script type="text/javascript" >
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "lengthMenu": "Afficher _MENU_ entrées",
                    "zeroRecords": "Aucun résultat trouvé",
                    "info": "Affichage de la page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucune entrée disponible",
                    "infoFiltered": "(filtré à partir de _MAX_ entrées totales)",
                    "search": "Rechercher :",
                    // "paginate": {
                    //     "first": "Premier",
                    //     "last": "Dernier",
                    //     "next": "Suivant",
                    //     "previous": "Précédent"
                    // }
                }
            });
        });
    </script>

    </body>

    </html>