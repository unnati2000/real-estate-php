<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/style.allprop.css"/>
    <title>Document</title>
</head>
<body>
    

    <?php

        ob_start();
        session_start();

        include_once "./db/db.php";
        

        if(!$_SESSION["email"]){
            header("Location: adminlogin.php");
        }
        $property = '<h1>No property found</h1>';
        $query = "SELECT * FROM property";
        $properties = mysqli_query($connection, $query);


        if(isset($_GET["delete"])){
             $id = $_GET["delete"];
             $query = "DELETE FROM property where id = {$id};";
             $delete_query = mysqli_query($connection, $query);
             header("Location: admincontrol.php");
        }
      
    ?>
    <div>
    <div class="navlinks">
        <a href='./index.php'>Home</a>
        <a href='./admincontrol.php'>Admin Control</a>
        <a href='./enquiries.php'>All Enquiries</a>
    </div>
    </div>
    <form method="GET" action=<?php echo "./search.php?search=$place"?>>
        <input placeholder="Enter location or postal code" name="place" type="text"><button type="submit">Search</button>
    </form>
    <section >
    <div class="property">
        <?php

if($properties){

    while($row =mysqli_fetch_assoc($properties)){
        $proj_name = $row["proj_name"];
        $society_name = $row["society_name"];
        $wing = $row["wing"];
        $location = $row["location"];
        $address = $row["address"];
        $room = $row["room"];
        $bathroom =$row["bathroom"];
        $status = $row["status"];
        $furnished = $row["furnished"];
        $parking = $row["parking"];
        $garden = $row["garden"];
        $price = $row["price"];
        $value = $row["value"];
        $area = $row["area"];
        $message = $row["message"];
        $image = $row["image"];
        $id = $row["id"];
            echo" <div class='property_card'>
                <img class='property_img' src='./uploads/$image'/>
                <h2>$proj_name</h2>
                <address><b>Location:</b> <span></span>$location</address>
                <div class='facilities'>
                    <div>
                         <img src='./images/bed.png'/>
                         <p>$room</p>
                    </div>
                    <div>
                        <img src='./images/bathtub.png'/>
                        <p>$bathroom Bathroom</p>
                    </div>
                    <div>
                       <img src='./images/sofa.png'/>
                        <p>$furnished</p>
                    </div>
                    </div>
                    <label><b>₹$price $value</b></label>
                    <br>
                    <br>
                    <div class='button_group'>
                    <a href='./updateproperty.php?update={$id}' class='more_info'>Update</a>
                    <a href='./admincontrol.php?delete={$id}' class='enquiry'>Delete</a>
                </div>
                </div>";
        }
}

             
        ?>

    </section>

</body>
</html>