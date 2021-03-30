<?php
    require("view/header.php");

    if(!empty($first_name)) {
?>
    <h2>Thank You for registering <?= $first_name ?>!</h2>
    <a href=".">Back to Main Page</a>
<?php
    } else {
?>
        <form class="form-group" action="." method="GET">
            <input type="hidden" name="action" value="register">

            <label for="first_name_input">Please enter your first name:</label>
            <input class="form-control" type="text" name="first_name" id="first_name_input">

            <br>

            <button class="btn-primary" type="submit">Register</button>
        </form>
<?php
    }
    require("view/footer.php");
?>