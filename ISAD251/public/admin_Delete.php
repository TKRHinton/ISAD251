<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Admin_Delete']))
{
    $request = new items($_POST['Item_ID'],$_POST['Item_Name'],$_POST['Item_Description'],$_POST['Price']);
    $success = $db->Admin_Delete($request);
}
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>The Red Sea Bar</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="Stylesheet" href="../assests/css/buttons.css">
<style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}

</style>

<body>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo"><b>Delete Item</b></h1>


    </div>

    <!-- Form to Delete Items -->
    <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-red"><b>Orders</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Please Enter The ID to delete Item</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="w3-section">
                <label for="Item_ID">Item ID</label>
                <input name = "Item_ID" type="text" class="form-control" id="Item_ID" placeholder="Item ID" maxlength = "10">
                <!--  <label for="inputState">Item</label>
                <select id="Item_ID" class="form-control" name = "Item_ID">
                    <option selected>Choose...</option>

                    <?php
                    $Item_Row = "";

                    $db = new DbContext();
                    $Item = $db->View_items();

                    if($Item)
                    {
                        foreach ($Item as $item)
                        {
                            $Item_Row .= "<option value=".$item->Item_ID() .">" .$item->Item_Name(). "</option>";
                        }
                    }
                    echo $Item_Row;

                    ?>
                </select>  -->
            </div>
        <button name = "Admin_Delete" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Confirm</button>
    </div>

    </form>
    <?php
    $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><div class=\"card border-success mb-3\">
                    <div class=\"card-header bg-success text-white\"> Your Item has been deleted</div></div></div></div>";
    if ($success > 0) {
        echo $resultString;
    };
    ?>



</div>
</body>



<?php
include_once 'footer.php';
?>

