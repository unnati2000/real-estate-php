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
        include "./db/db.php";
        
            if(isset($_POST["place"])){ 
                $place = $_POST["place"];
                $query = "SELECT * FROM property where location LIKE '%$place%';";
                $properties = mysqli_query($connection, $query);
                 

            }else if(isset($_POST["place"]) && isset($_POST["room"]) && isset($_POST["bathroom"]) && isset($_POST["budget"])){
                $place = $_POST["place"];
                $room = $_POST["room"];
                $bathroom = $_POST["bathroom"];
                $budget = $_POST["budget"];
                $budget_split = explode(" - ", $budget);
                $lower_value = $budget_split[0];
                $higher_value = $budget_split[1];
        
                $low = (int)filter_var($lower_value, FILTER_SANITIZE_NUMBER_FLOAT);
                $high = (int)filter_var($higher_value, FILTER_SANITIZE_NUMBER_FLOAT);
                $query = "SELECT * FROM property where location LIKE '%$place%' AND room LIKE '%$room%' AND $bathroom LIKE '$bathroom' AND price >= '$low' AND price <= '$high';";
                $properties = mysqli_query($connection,$query);
             }
        ?>
        <h1 style="text-align: center; color:orangered;">Search Results are as follows</h1>
        <div class="property">
            
        <?php
            
            if($properties){

                while($row = mysqli_fetch_assoc($properties)){
                    $proj_name = $row["proj_name"];
                    $society_name = $row["society_name"];
                    $wing = $row["wing"];
                    $location = $row["location"];
                    $address = $row["address"];
                    $room = $row["room"];
                    $bathroom = $row["bathroom"];
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
                            <address><b>Location:</b>  <span></span>$location </address>
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
                                <a href='./singlePage.php?property={$id}' class='more_info'>More info</a>
                                <a href='./enquiry.php' class='enquiry'>Enquiry</a>
                            </div>";
                     }
            }else{
                echo "<h1>No property found!</h1>";
            }
             
    ?>
        </div>

</body>
</html>