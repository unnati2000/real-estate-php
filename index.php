<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
      integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./Styles/style.css"/>
    <title>Home Page</title>
</head>
<body>

    <?php
        include "./db/db.php";
        $query = "SELECT * FROM property ORDER BY id DESC LIMIT 3";
        $properties = mysqli_query($connection, $query) or die(mysqli_error($connection));

    ?>


    <header class="homepage__header">
        <nav class="homepage__nav">
            <div class="logo">
                <h1>Perfect Properties</h1>
            </div>
            <div class="navlinks">
                <?php 

                    ob_start();
                    session_start();

                    if(isset($_SESSION["email"])){
                        echo "
                        <a href='./index.php'>Home</a>
                        <a href='./admincontrol.php'>Admin control</a>
                        <a href='./admin.php'>Admin Page</a>
                        <a href= './enquiries.php'>Enquiries</a>
                        <a href='./logout.php'>Logout</a> ";
                    }else{  
                        echo "
                        <a href='./index.php'>Home</a>
                        <a href='./allProperties.php'>All properties</a>
                        <a href='./enquiry.php'>Enquiry</a>
                        <a href='#latest_properties'>Latest properties</a>";
                    }

                ?>
            </div> 
        </nav>

        <section class="homepage__middle_section"> 
            <h1>A place of trust and relationship</h1>
            <form method="POST" action=<?php echo "./search.php"?>>
                <input placeholder="Enter location or postal code" name="place" type="text"><button type="submit">Search</button>
            </form>
            
            <br/>
            <br/>
            <a href="#advanced_search"><i class="fas fa-arrow-down"></i>Advanced Search</a>
        </section>

        <footer class="footer">
            <div class="contact_details">
                <h2>Contact Us</h2>
                <div class="icons">
                    <a href="#">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="#">
                        <i class="fas fa-envelope fa-2x"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                </div>
                <h3>Phone Number: 9898989898</h3>
            </div>
            <div class="address">
                <h2>Address:</h2>
                <address>H-304, Geeta Nagar Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, enim?</address>
            </div>
        </footer>
    </header>
    <section class="advanced_search" id="advanced_search">
        <div>
            <h1>Advanced Search</h1>
            <hr>
            <form method="POST" action=<?php echo "./search.php?"?>>

            <input type="text" name="place" placeholder="Search by location"/>
            <br/>
            
            <div class="ammenities">
                <div>
                    <label>Bedrooms</label><br/>
                    <select class="option" name="bedroom">
                        <option>Select one</option>
                        <option value="1 RK">1 RK</option>
                        <option value="1 BHK">1 BHK</option>
                        <option value="2 BHK">2 BHK</option>
                        <option value="3 BHK">3 BHK</option>
                        <option value="3 BHK+">3 BHK+</option>
                    </select>   
                </div>
                <div>
                    <label>Bathroom</label><br/>
                    <select class="option" name="bathRoom">
                        <option>Select one</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="2+">2+</option>
                    </select>
                    
                </div>
                <div>
                    <label>Budget</label><br/>
                    <select class="option" name="budget">
                        <option>Select your budget</option>
                        <option value="30L - 50L">30L - 50L</option>
                        <option value="50L - 80L">50L - 80L</option>
                        <option value="80L - 1Cr">80L- 1Cr</option>
                        <option value="1Cr - 2.5Cr">1Cr - 2.5Cr</option>
                        <option value="2.5Cr +">2.5Cr +</option>
                    </select>   
                </div> 
            </div>
            <button type="submit">Search</button>
            </form>
        </div>
        <div class="classic_image">
            <img src="./images/undraw_house_searching_n8mp.png" style="height: 500px; width: 700px; position: absolute; top: 0; right:0;" />
        </div>
    </section>

    <section class="latest_properties" id="latest_properties">
        <h1>Latest Properties</h1>
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
                    $bathroom =$row["bathroom"];
                    $status = $row["status"];
                    $furnished = $row["furnished"];
                    $parking = $row["parking"];
                    $garden = $row["garden"];
                    $price = $row["price"];
                    $area = $row["area"];
                    $message = $row["message"];
                    $image = $row["image"];
                    $value = $row["value"];
                    $id = $row["id"];
                   
                    echo "<div class='property_card'>
                    <img class='property_img' src='./uploads/$image'/>
                    <h2>$proj_name</h2>
                    <address><b>Location:  <span></span></b>$location </address>
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
                            <a href='./page.php?property={$id}' class='more_info'>More Info</a>
                            <a href='./enquiry.php' class='enquiry'>Enquiry</a>
                        </div>      
                    </div>";    
                }
            }
            
        ?>  
            
        </div>
    </section>

    <div class="achievements">
        <h1>Our clients love us</h1>
        <h3>WHAT MAKES US GREAT</h3>
        <div class="goals">
            <div class="goal_card">
                <img src="./images/house.png"/><br>
                <label>We've Got all</label><br>
                <article>Variety of houses which suit you and come under your budget.</article>

            </div>
            <div  class="goal_card">
                <img src="./images/best-price.png"/><br>
                <label>Best deal</label><br>
                <article>Get the best and satisfactory deals.</article>

            </div>
            <div  class="goal_card">
                <img src="./images/customer-service.png"/><br>
                <label> 24/7 Services </label><br>
                <article>We're always available for you. </article>

            </div>
        </div>

    </div>

    <footer class="credits">
        <blockquote>Made with effort!</blockquote>
    </footer>

</body>
</html>