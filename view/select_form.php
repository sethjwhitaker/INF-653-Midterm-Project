<?php
    require("view/select.php");
?>
<form class="form-group" action="." method="GET">
    <input type="hidden" name="action" value="home">
    <?php
        createSelect($makes, "make", "make_id", "name", "View All Makes", $make_id);
        createSelect($types, "type", "type_id", "name", "View All Types", $type_id);
        createSelect($classes, "class", "class_id", "name", "View All Classes", $class_id);
    ?>
    <label>Sort By:</label>
    <div class="form-check ml-4">
        <input class="form-check-input" type="radio" id="sort-by-price" name="sort_by" value="price" 
            <?php
                if(empty($sort_by) || $sort_by ==="price") {
            ?>
                    checked
            <?php
                }
            ?>
        >
        <label class="form-check-label" for="sort-by-price">Price</label>
    </div>
    <div class="form-check ml-4">
        <input class="form-check-input" type="radio" id="sort-by-year" name="sort_by" value="year"
        <?php
                if($sort_by ==="year") {
            ?>
                    checked
            <?php
                }
            ?>
        >
        <label class="form-check-label"for="sort-by-year">Year</label>
    </div>
    <br>
    <button class="btn-primary" type="submit">Submit</button>
</form>