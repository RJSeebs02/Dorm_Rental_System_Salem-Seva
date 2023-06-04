<!--Displaying Customer Creation Page--->
<html>
    <head>
        <title>Rental</title>
    </head>
<body>
    <div id="subtitle">
        <h2>Rent Here</h2>
    </div>
    <div class="form-wrapper">
        <!--Process for creating a rent will be executed once submit button is clicked--->
        <form action="processes/process.rent.php?action=new" method="post">
            <div id="form-half">
                <label for="cust_id">Customer Name:</label>
                <select required id="cust_id" name="cust_id">
                    <?php
                    if($rent->list_customer() != false){
                        foreach($rent->list_customer() as $value){
                            extract($value);
                            if($cust_status != "Rented"){
                            ?>
                            <option value="<?php echo $cust_id;?>"><?php echo $cust_fname.' '.$cust_mname.' '.$cust_lname; ?></option>
                            <?php
                            }
                        }
                    }
                ?>
                </select>

                <label for="trans_id">Transaction Type:</label>
                <select required id="trans_id" name="trans_id">
                    <?php
                    if($rent->list_transaction_type() != false){
                        foreach($rent->list_transaction_type() as $value){
                            extract($value);
                            ?>
                            <option value="<?php echo $type_id;?>"><?php echo $rent->get_transaction_type_description($type_id);?></option>
                            <?php
                        }
                    }
                ?>
                <input type="submit" value="SUBMIT"> <!--Button that passes parameters input to the process file--->
                </select>
            </div>
            <div id="form-half">
                <label for="room_id">Available Rooms:</label>
                <select required id="room_id" name="room_id">
                    <?php
                    if($room->list_rooms() != false){
                        foreach($room->list_rooms() as $value){
                            extract($value);
                            if($room_vacancy != 0){
                            ?>
                            <option value="<?php echo $room_id;?>"><?php echo $room_number;?></option>
                            <?php
                            }
                        }
                    }
                ?>
                </select>
            </div>
        </form>
    </div>
</body>
</html>