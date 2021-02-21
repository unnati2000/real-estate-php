<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/style.allprop.css"/>
    <link rel="stylesheet" href="./Styles/style.enquiry.css"/>
    <title>Enquiry</title>
</head>
<body>
    
    <?php
        include "./db/db.php";

        $alert_message_error = "";
        $alert_message_success = "";
        if(isset($_POST["submit"])){

            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $location = $_POST["location"];
            $address = $_POST["address"];
            $des_location = $_POST["des_location"];
            $rooms = $_POST["rooms"];
            $budget = $_POST["budget"];
            $message = "";
            if(isset($_POST["message"])){

                $message = $_POST["message"];

            }
           

            if($name == '' || $phone == '' || $location == "" || $des_location == ''
                || $rooms == '' || $budget == ''){
                    $alert_message_error = "Please add all the fields";
            }else{
                
                $query = "INSERT INTO enquiry(name, phone, location, address, des_location, 
                rooms, budget, message) VALUE('$name', '$phone', '$location', '$address', 
                '$des_location', '$rooms', '$budget', '$message');";

                $inserted_docs = mysqli_query($connection, $query) or die(mysqli_error($connection));;
                if($inserted_docs){
                    $alert_message_success = 'Added Enquiry Successfully';
                    header("Location index.php");
                    
                }else{
                    $alert_message_error="Some error";
                }
            }
        }
    ?>
    <div class="navlinks">
        <a href='./index.php'>Home</a>
        <a href='./allProperties.php'>All properties</a>
        <a href='./enquiry.php'>Enquiry</a>
        <a href='#latest_properties'>Latest properties</a>
    </div>

    <section>
        <div class="left-side">
            <div class="left-side-content">
                <div class="img-div">
                    <img src="./images/best-price.png"/>
                </div>
                <h3>Contact Us</h3>
            </div>
            <div class="left-side-content">
                <div class="img-div">
                    <img src="./images/handshake.png"/>
                </div>
                <h3>For  best deals</h3>
            </div>
            <div class="left-side-content">
                <div class="img-div">
                    <img src="./images/price-tag.png"/>
                </div>
                <h3>And prices</h3>
            </div>
        </div>
        <div class="right-side">
            <h3>Make an enquiry</h3>

            <?php 
                include "./alert.php";
                error_handler($alert_message_error);
                success_handler($alert_message_success);
            ?>
            

        <form method="POST" action="enquiry.php">
            <input type="text" class="name" name="name" placeholder="Enter your name"/>
            <div class="input-group">
                <input type="text" name="phone" placeholder="Enter Phone Number"/>
                <input type="text" name="location" placeholder="Enter location"/>
            </div>
            <input type="text" class="name" name="address" placeholder="Enter your Address"/>
          <h3>  ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯ Enquiry ⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯⎯ </h3>
          <input type="text" class="name" name="des_location" placeholder="Enter your desired location"/><br/>
            <div class="input-group">
                <div>
                    <label> Select rooms</label>
                    <br>
                    <select name="rooms">
                        <option>Select number of Rooms</option>
                        <option value="1 RK">1 RK</option>
                        <option value="1 BHK">1 BHK</option>
                        <option value="2 BHK">2 BHK</option>
                        <option value="3 BHK">3 BHK</option>
                        <option value="3 BHK+">3 BHK+</option>
                    </select>
                </div>
                <div>
                    <label> Select Budget</label>
                    <br>
                    <select name="budget">
                        <option>Select your budget</option>
                        <option value="30L-50L" >30L-50L</option>
                        <option value="50L-80L">50L-80L</option>
                        <option value="80L-1Cr">80L-1Cr</option>
                        <option value="1Cr+">1Cr</option>
                    </select>
                </div>
            </div>
            <textarea  class="text" name="message" placeholder="Enter message"></textarea><br/>
            
            <button type="submit" name="submit">Submit</button>
        </form>


        </div>  
    </section>
   
</body>
</html>
