
<?php
    require("view/header.php");
?>
    <h2>Goodbye <?= $_SESSION["user_id"] ?>.</h2>
    <a href=".">Back to Main Page</a>
<?php
    unset($_SESSION["user_id"]);
    session_destroy();

    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        "",
        strtotime("-1 year"),
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );

    require("view/footer.php");
?>