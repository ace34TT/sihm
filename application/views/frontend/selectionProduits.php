<?php $title = "Choix caisse"; ?>

<!-- HEADER -->
<?php ob_start(); ?>

<?php $links = ob_get_clean(); ?>

<!-- CONTENT -->
<?php ob_start(); ?>
<h1>Selection produits </h1>

<div id="listProduit">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom</th>
                <th scope="col">Categorie</th>
                <th scope="col">Prix unitaire</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listeProduit as $produit) {
            ?>
                <tr>
                    <th scope="row"><?= $produit->id ?></th>
                    <td><?= $produit->nom ?></td>
                    <td><?= $produit->idCategorie ?></td>

                    <td><?= $produit->prixUnitaire ?></td>
                    <td> <input style="margin-left:25px;" type="checkbox" name="" id=""> </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<form action="<?= site_url() ?>/utilisateur/produitSelectionne" method="POST">
    <input type="text" name="productsId" value="" id="listIdProduit">
    <input type="submit" id="validate-btn" value="valider">
</form>


<?php $content = ob_get_clean(); ?>
<!-- SCRIPT -->
<?php ob_start(); ?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    $(function() {
        $("#validate-btn").hover(function() {
            var ids = "";
            $("#listProduit input[type=checkbox]:checked").each(function() {
                var row = $(this).closest("tr")[0];
                ids += row.cells[0].innerHTML;
                ids += ",";
            });
            document.getElementById("listIdProduit").value = ids;
        });
    });
</script>

<?php $script = ob_get_clean(); ?>

<?php require('template.php'); ?>