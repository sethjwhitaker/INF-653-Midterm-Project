<?php
    require("view/basic/header.php");
?>
    <h2>Edit Classes</h2>
<?php
    if(!empty($classes)) {
?>
    <table class="table">
        <tr>
            <th>Name</th>
        </tr>
        <?php
            foreach($classes as $class) {
        ?>
            <tr>
                <td><?=$class["name"];?></td>
                <td>
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete-class" />
                        <input type="hidden" name="class_id" value="<?=$class["class_id"];?>" />
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
    <h3>No classes exist</h3>
<?php

    }

?>
    <h3>Add Class</h3>

    <form class="form-group" action="." method="POST">
        <input type="hidden" name="action" value="create-class">

        <input class="form-control" type="text" name="name" id="class-name" placeholder="Class" autocomplete="off" required>
        <br>
        <button class="btn-primary" type="submit">Add</button>
    </form>
<?php
    require("view/basic/footer.php");
?>