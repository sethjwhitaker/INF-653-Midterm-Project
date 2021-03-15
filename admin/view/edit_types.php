<?php
    require("view/basic/header.php");
?>
    <h2>Edit Types</h2>
<?php
    if(!empty($types)) {
?>
    <table class="table">
        <tr>
            <th>Name</th>
        </tr>
        <?php
            foreach($types as $type) {
        ?>
            <tr>
                <td><?=$type["name"];?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete-type" />
                        <input type="hidden" name="type_id" value="<?=$type["type_id"];?>" />
                        <button class="btn-danger" type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
<?php
    } else {
?>
    <h3>No types exist</h3>
<?php

    }

?>
    <h3>Add Type</h3>

    <form class="form-group" action="." method="POST">
        <input type="hidden" name="action" value="create-type">

        <input class="form-control" type="text" name="name" id="type-name" placeholder="Type" autocomplete="off" required>
        <br>
        <button class="btn-primary" type="submit">Add</button>
    </form>

    <a href=".">Back to Vehicles</a><br>
    <a href=".?action=add-vehicle-page">Add a Vehicle</a><br>
    <a href=".?action=view-makes">Edit Makes</a><br>
    <a href=".?action=view-classes">Edit Classes</a><br>
<?php
    require("view/basic/footer.php");
?>