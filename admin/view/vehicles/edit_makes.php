<?php
    require("view/basic/header.php");
?>
    <h2>Edit Makes</h2>
<?php
    if(!empty($makes)) {
?>
    <table class="table">
        <tr>
            <th>Name</th>
        </tr>
        <?php
            foreach($makes as $make) {
        ?>
            <tr>
                <td><?=$make["name"];?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete-make" />
                        <input type="hidden" name="make_id" value="<?=$make["make_id"];?>" />
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
    <h3>No makes exist</h3>
<?php

    }

?>
    <h3>Add Make</h3>

    <form class="form-group" action="." method="POST">
        <input type="hidden" name="action" value="create-make">

        <input class="form-control" type="text" name="name" id="make-name" placeholder="Make" autocomplete="off" required>
        <br>
        <button class="btn-primary" type="submit">Add</button>
    </form>
<?php
    require("view/basic/footer.php");
?>