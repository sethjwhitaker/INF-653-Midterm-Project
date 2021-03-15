<?php
    // Create the selects for the select form
    function createSelectAdd($list, $table, $itemId, $itemName, $label) {
        $id = $table . "-select"
?>
        <label for="<?=$id?>" ><?=$label?></label>
        <select class="form-control" name="<?=$table . "_id"?>" id="<?=$id?>">
            <?php
                if(!empty($list)) {
                    foreach($list as $item) {
                        $id = $item[$itemId];
                        $name = $item[$itemName];
            ?>
            <option value="<?= $id ?>"><?= $name ?></option>
            <?php
                    }
                }
            ?>
        </select>
        <br>
<?php
    }
?>