<?php
    require("view/basic/header.php");
    require("view/admin/select_form.php");
    require("view/admin/vehicle_list.php");
?>
    <a href=".?action=add-vehicle-page">Add a Vehicle</a><br>
    <a href=".?action=view-makes">Edit Makes</a><br>
    <a href=".?action=view-types">Edit Types</a><br>
    <a href=".?action=view-classes">Edit Classes</a><br>

<?php
    require("view/basic/footer.php");
?>