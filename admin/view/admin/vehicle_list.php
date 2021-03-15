
    <?php
        $make = "";
        $type = "";
        $class = "";
        if(!empty($vehicles)) {
    ?>
        <table class="table">
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th></th>
            </tr>
    <?php
            foreach($vehicles as $vehicle) {
    ?>
    <tr>
        <td><?=$vehicle["year"];?></td>
        <td><?=$vehicle["make"];?></td>
        <td><?=$vehicle["model"];?></td>
        <td><?=$vehicle["type"];?></td>
        <td><?=$vehicle["class"];?></td>
        <td><?=$vehicle["price"];?></td>
        <td>
                <form action="." method="POST">
                    <input type="hidden" name="action" value="delete-vehicle" />
                    <input type="hidden" name="vehicle_id" value="<?=$vehicle["vehicle_id"];?>" />
                    <button class="btn-danger" type="submit">Remove</button>
                </form>
        </td>
    </tr>
    <?php } ?>
        </table>
    <?php } else { ?>
        <h3>No vehicles in stock.</h3>
    <?php } ?>
