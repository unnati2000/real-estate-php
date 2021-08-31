<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/style.css"/>
    <link rel="stylesheet" href="./Styles/style.admin.css"/>
    <link rel="stylesheet" href="./Styles/style.allprop.css"/>
    <title>Admin</title>
</head>
<body>

    <div>
    <div class="navlinks">
        <a href='./index.php'>Home</a>
        <a href='./admincontrol.php'>Admin Control</a>
        <a href='./enquiries.php'>All Enquiries</a>
    </div>
    </div>

    <?php
        ob_start();
        session_start();

        

        include "./db/db.php";
        $message="";

        if(isset($_SESSION["email"])){

            if(isset($_POST["submit"])){
                $proj_name = $_POST["proj_name"];  
                $society_name = $_POST["society_name"];
                $wing = $_POST["wing"];
                $location = $_POST["location"];
                $address = $_POST["address"];
                $room = $_POST["room"];
                $bathroom = $_POST["bathroom"];
                $status = $_POST["status"];
                $furnished = $_POST["condition"];
                $parking = $_POST["parking"];
                $garden = $_POST["garden"];
                $price = $_POST["price"];
                $value = $_POST["value"];
                $area = $_POST["area"];
                $message = $_POST["message"];
                $image_name = $_FILES["image"]["name"];
                $temp_name = $_FILES["image"]["tmp_name"];
                $error = $_FILES["image"]["error"];
                $store_image;
                if($error === 0){

                    $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
                    $img_ex_to_low = strtolower($img_ex);

                    $allowed_extension = array("jpg", "jpeg", "png");
                    if(in_array($img_ex_to_low, $allowed_extension)){
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_to_low;
                        $img_upload_path = './uploads/'.$new_img_name;
                        move_uploaded_file($temp_name, $img_upload_path);
                        $store_image = $new_img_name;
                    }
                }else{  
                    $em = "unknown error occured"; 
                }

                $query = "INSERT INTO property(proj_name, society_name, wing, 
                location, address, room, bathroom, status, furnished, parking, 
                garden, price, value, area, message, image)
                VALUE('$proj_name', '$society_name', '$wing', '$location', '$address', '$room', '$bathroom', 
                '$status', '$furnished', '$parking', '$garden', '$price', '$value','$area', '$message', '$store_image');";
                $insert_docs = mysqli_query($connection, $query) or die(mysqli_error($connection));

                if($insert_docs){
                    $message="Inserted docs successfully";
                }else{
                    $message="Some Error";
                }
            }
        }else{
            header("Location: adminlogin.php");
        }
    ?>

    <div class="form-div">
        <h1>Admin Page</h1>
        <h3>Add Property</h3>
        <?php if($message){echo $message;} ?>
        <form enctype="multipart/form-data" method="POST" action="admin.php">
            <input type="text" name="proj_name" placeholder="Project Name" class="long"/>
            <div>
                <input type="text" name="society_name" class="medium" width="400" placeholder="Enter building name/ Society Name"/> 
                <input type="text" name="wing" width="200" placeholder="Enter wing and flat no"/>
                <input type="text" name="location" width="200" placeholder="Enter Location"/>
            </div>

            <input type="text" name="address" placeholder="Enter Address" class="long"/>
            <div class="input-div">
                <div class="room">
                <label class="main">No of rooms</label>
                <br/>
                    <select class="option" name="room">
                        <option>Select one</option>
                        <option value="1 RK">1 RK</option>
                        <option value="1 BHK">1 BHK</option>
                        <option value="2 BHK">2 BHK</option>
                        <option value="3 BHK">3 BHK</option>
                        <option value="3 BHK+">3 BHK+</option>
                    </select> 
                </div>
               
                <div class="room">
                <label class="main">No of bathroom</label>
                <br/>
                    <select class="option" name="bathroom">
                        <option>Select one</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="2+">2+</option>
                    </select> 
                </div>
            </div>

            <div class="radio-group">
               
                <div class="radio">
               <label class="main"> Status</label>
                    <br/>
                    <input type="radio"  name="status" value="Under construction">
                    <label>Under Construction</label><br>
                    <input type="radio"  name="status" value="Ready">
                    <label>Ready</label><br>     
                </div>

               
               
                <div class="radio">
                <label class="main">Condition</label>
                <br/>
                    <input type="radio"  name="condition" value="Furnished">
                    <label>Furnished</label><br>
                    <input type="radio"  name="condition" value="Semi Furnished">
                    <label>Semi Furnished</label><br>
                    <input type="radio"  name="condition" value="Not Furnished">
                    <label>Not Furnished</label><br>     
                </div>
              
            </div>

            <div class="radio-group">
                <div class="radio">
                    <label class="main">Parking</label>
                    <input type="radio"  name="parking" value="Yes">
                    <label>Yes</label><br>
                    <input type="radio"  name="parking" value="No">
                    <label>No</label><br>     
                </div>
                <div class="radio">
                    <label class="main">Garden</label>
                    <input type="radio"  name="garden" value="Yes">
                    <label>Yes</label><br>
                    <input type="radio"  name="garden" value="No">
                    <label>No</label><br>     
                </div>
            </div>

            <div class="price">
                <div>
                    <input type="text" class="medium" name="price" width="400" placeholder="Enter Price"/> 
                    <select class="option" name="value">
                        <option>Select value</option>
                        <option value="L">Lakh</option>
                        <option value="Cr">Crore</option>
                    </select>   
                </div>  
                
                 <input type="text" width="200" name="area" placeholder="Enter area of flat"/>  
                
              
            </div>

            <textarea class="long" name="message" placeholder="Enter Message">
            </textarea>
            <br>
            <input type="file" name="image"/>
            <br/>
            <button type="submit" name="submit">Submit</button>

        </form>
    </div>

</body>
</html>