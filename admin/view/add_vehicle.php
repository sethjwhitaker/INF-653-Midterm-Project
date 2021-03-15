<?php
    require("view/basic/header.php");
?>

<section>
    <h2>Add Vehicle</h2>
    <form class="form-group" action="." method="POST">
        <input type="hidden" name="action" value="create-vehicle">

        <?php
            require("view/drop_down/select_add.php");

            createSelectAdd($makes, "make", "make_id", "name", "Make");
            createSelectAdd($types, "type", "type_id", "name", "Type");
            createSelectAdd($classes, "class", "class_id", "name", "Class");
        ?>

        <label for="year">Year</label>   
        <input class="form-control" type="text" name="year" id="year" placeholder="Year" autocomplete="off" required>
        <br>
        <label for="model">Model</label>
        <input class="form-control" type="text" name="model" id="model" placeholder="Model" autocomplete="off" required>
        <br>
        <label for="price">Price</label>
        <input class="form-control" type="text" name="price" id="price" placeholder="Price" autocomplete="off" required>
        <br>
        <button class="btn-primary" type="submit">Add</button>
    </form>
    <a href=".">Back to Vehicles</a><br>
    <a href=".?action=view-makes">Edit Makes</a><br>
    <a href=".?action=view-types">Edit Types</a><br>
    <a href=".?action=view-classes">Edit Classes</a><br>
</section>

<?php
    require("view/basic/footer.php");
?>