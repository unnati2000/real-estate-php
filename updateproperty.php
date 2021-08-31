<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/style.admin.css"/>
    <title>Document</title>
</head>
<body>
    <?php
        ob_start();
        session_start();

        include "./db/db.php";
        if(!$_SESSION["email"]){
            header("Location: adminlogin.php");
        }

        $p_id =  $_GET["update"];

       
        if(isset($_GET["update"])){
            $id = $_GET["update"];
            $query = "SELECT * FROM property where id= {$id}";
            $update = mysqli_query($connection, $query);
            $property = mysqli_fetch_assoc($update);
            
            $proj_name = $property["proj_name"];
            $society_name = $property["society_name"];
            $wing = $property["wing"];
            $location = $property["location"];
            $address = $property["address"];
            $room = $property["room"];
            $bathroom =$property["bathroom"];
            $status = $property["status"];
            $furnished = $property["furnished"];
            $parking = $property["parking"];
            $garden = $property["garden"];
            $price = $property["price"];
            $area = $property["area"];
            $message = $property["message"];
            $image = $property["image"];
            $value = $property["value"];
            $id = $property["id"];

        }

        

        if(isset($_POST["submit"])){

                
            $proj_name = $_POST["proj_name"];
            $society_name = $_POST["society_name"];
            $wing = $_POST["wing"];
            $location = $_POST["location"];
            $address = $_POST["address"];
            $room = $_POST["room"];
            $bathroom =$_POST["bathroom"];
            $status = $_POST["status"];
            $furnished = $_POST["condition"];
            $parking = $_POST["parking"];
            $garden = $_POST["garden"];
            $price = $_POST["price"];
            $value = $_POST["value"];
            $area = $_POST["area"];
            $message = $_POST["message"];

            $query = "UPDATE property SET proj_name = '$proj_name', society_name = '$society_name', 
            wing = '$wing', location = '$location', address = '$address', 
            room = '$room', bathroom = '$bathroom', status='$status', furnished = '$furnished', 
            parking='$parking', garden = '$garden', price = '$price', value = '$value',area='$area', 
            message='$message' WHERE id = {$p_id};";
            
            $updatedProperty = mysqli_query($connection, $query);
            if($updatedProperty){
                echo "Updated successfully";
            }else{
                echo "some problem";
            }


        }
    ?>
     <?php include "./navbar.php"  ?>

    <div class="form-div">
       
        <h1>Admin Page</h1>
        <h3>Add Property</h3>
       
        <form enctype="multipart/form-data" method="POST" action="">
            <input type="text" name="proj_name"  value="<?php if(isset($proj_name)){echo $proj_name;} ?>" placeholder="Project Name" class="long"/>
            <div>
                <input type="text" name="society_name" value="<?php if(isset($society_name)){echo $society_name;} ?>" class="medium" width="400" placeholder="Enter building name/ Society Name"/> 
                <input type="text" name="wing" width="200" value="<?php if(isset($wing)){echo $wing;} ?>" placeholder="Enter wing and flat no"/>
                <input type="text" name="location" width="200" value="<?php if(isset($location)){echo $location;} ?>" placeholder="Enter Location"/>
            </div>

            <input type="text" name="address" value="<?php if(isset($address)){echo $address;} ?>" placeholder="Enter Address" class="long"/>
            <div class="input-div">
                <div class="room">
                <label class="main">No of rooms</label>
                <br/>
                    <select class="option" name="room">
                        <option value="">Select one</option>
                        <option value="1RK" <?php if ($room == '1 RK') echo ' selected="selected"'; ?>>1 RK</option>
                        <option value="1 BHK" <?php if ($room == '1 BHK') echo ' selected="selected"'; ?>>1 BHK</option>
                        <option value="2 BHK" <?php if ($room == '2 BHK') echo ' selected="selected"'; ?>>2 BHK</option>
                        <option value="3 BHK" <?php if ($room == '3 BHK') echo ' selected="selected"'; ?>>3 BHK</option>
                        <option value="3 BHK+" <?php if ($room == '3 BHK+') echo ' selected="selected"'; ?>>3 BHK+</option>
                    </select> 
                </div>
               
                <div class="room">
                <label class="main">No of bathroom</label>
                <br/>
                    <select class="option"  name="bathroom">
                        <option value="">Select your option</option>
                        <option value="1" <?php if ($bathroom == '1') echo ' selected="selected"'; ?>>1</option>
                        <option value="2" <?php if ($bathroom == '2') echo ' selected="selected"'; ?>>2</option>
                        <option value="2+" <?php if ($bathroom == '2+') echo ' selected="selected"'; ?>>2+</option>
                    </select> 
                </div>
            </div>

            <div class="radio-group">
               
                <div class="radio">
               <label class="main"> Status</label>
                    <br/>
                    <input type="radio" <?php if ($status == "Under construction") echo 'checked="checked"'?>  name="status" value="Under construction">
                    <label>Under Construction</label><br>
                    <input type="radio"  <?php if ($status == "Ready") echo 'checked="checked"'?> name="status" value="Ready">
                    <label>Ready</label><br>     
                </div>

               
               
                <div class="radio">
                <label class="main">Condition</label>
                <br/>
                    <input type="radio" <?php if ($furnished == "Furnished") echo 'checked="checked"'?>  name="condition" value="Furnished">
                    <label>Furnished</label><br>
                    <input type="radio" <?php if ($furnished == "Semi Furnished") echo 'checked="checked"'?>  name="condition" value="Semi Furnished">
                    <label>Semi Furnished</label><br>
                    <input type="radio" <?php if ($furnished == "Not Furnished") echo 'checked="checked"'?>  name="condition" value="Not Furnished">
                    <label>Not Furnished</label><br>     
                </div>
              
            </div>

            <div class="radio-group">
                <div class="radio">
                    <label class="main">Parking</label>
                    <input type="radio" <?php if ($parking == "Yes") echo 'checked="checked"'?>  name="parking" value="Yes">
                    <label>Yes</label><br>
                    <input type="radio" <?php if ($parking == "No") echo 'checked="checked"'?>  name="parking" value="No">
                    <label>No</label><br>     
                </div>
                <div class="radio">
                    <label class="main">Garden</label>
                    <input type="radio"  <?php if ($garden == "Yes") echo 'checked="checked"'?> name="garden" value="Yes">
                    <label>Yes</label><br>
                    <input type="radio" <?php if ($garden == "No") echo 'checked="checked"'?> name="garden" value="No">
                    <label>No</label><br>     
                </div>
            </div>

            <div>
                <div>
                    <input type="text" class="medium" name="price" width="400" value="<?php if(isset($price)){echo $price;} ?>" placeholder="Enter Price"/> 
                    <select class="option" name="value">
                        <option>Select value</option>
                        <option value="L" <?php if ($value == 'L') echo ' selected="selected"'; ?>>Lakh</option>
                        <option value="Cr" <?php if ($value == 'Cr') echo ' selected="selected"'; ?>>Crore</option>
                    </select> 
                </div>
                  
                <input type="text" width="200" name="area" value="<?php if(isset($area)){echo $area;} ?>" placeholder="Enter area of flat"/>
            </div>

            <textarea class="long" value="" name="message" placeholder="Enter Message" ><?php if(isset($message)){echo $message;} ?></textarea>
            <br>
            <br/>
            <button type="submit" name="submit">Submit</button>

        </form>
    </div>

</body>
</html>