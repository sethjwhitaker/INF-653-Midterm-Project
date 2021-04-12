<?php
    require_once("util/valid_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <main class="container mb-5">
        <header class="pb-2 mt-4 mb-2 border-bottom">
            <h1>Zippy Admin</h1>
            <?php if(isset($_SESSION["is_valid_admin"])) { ?>
                <a href=".?action=logout">Logout</a>
            <?php } ?>
        </header>