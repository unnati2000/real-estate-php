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

        include "./db/db.php";
       
        $property = '<h1>No property found</h1>';
        $query = "SELECT * FROM property";
        $properties = mysqli_query($connection, $query);

      
    ?>
    <div class="navlinks">

        <a href='./index.php'>Home</a>
        <a href='./allProperties.php'>All properties</a>
        <a href='./enquiry.php'>Enquiry</a>
        <a href='#latest_properties'>Latest properties</a>

    </div>
    <form method="GET" action=<?php if(isset($_GET["place"])) echo "./search.php?search=$place"?>>
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
        $area = $row["area"];
        $message = $row["message"];
        $value = $row["value"];
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
                        <a href='./singlePage.php?property={$id}' class='more_info'>More Info</a>
                        <a href='./enquiry.php' class='enquiry'>Enquiry</a>
                    </div>
                </div>";
        }
}

             
        ?>

    </section>

</body>
</html>