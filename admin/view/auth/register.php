<?php
    require("view/basic/header.php");
?>
    <h2>Register</h2>
<?php
    if(!empty($errors)) {
        foreach($errors as $e) {
?>
            <p class="text-danger"><?=$e?></p>         
<?php
        }
    }
?>
    <form class="form-group" action="." method="POST">
        <input type="hidden" name="action" value="register">

        <label for="username">User Name</label>   
        <input class="form-control" type="text" name="username" id="username" required>
        <br>
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <br>
        <label for="confirm_password">Confirm Password</label>
        <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
        <br>
        <button class="btn-primary" type="submit">Register</button>
    </form>
<?php
    require("view/basic/footer.php");
?>