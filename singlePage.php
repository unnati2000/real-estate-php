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
    <link rel="stylesheet" href="./Styles/style.singlepage.css"/>
  <!-- This page? ha open karke rakha h tere liye -->
    <title>Single Page</title>
</head>
<body>

  <?php
  
    include "./db/db.php";
      if(isset($_GET["property"])){

          $id = $_GET["property"];
          $query = "SELECT * FROM property WHERE id = {$id};";

          $property = mysqli_query($connection, $query);
          
      }else{
        echo "No property found";
      }


      $row = mysqli_fetch_assoc($property);
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
      echo "";
    ?>
  
      <div class='property-card'>
        <div class='images'>
          <img class='flat_img' src='./uploads/<?= $image ?>' />
        </div>
        <div class="ammenities">
          <div>
            <img src="./images/bed.png" class="ammenity_image"/>
            <h3><?php echo $room ?></h3>
          </div>
          <div>
            <img src="./images/bathtub.png" class="ammenity_image"/>
            <h3><?php echo $bathroom ?> bathroom</h3>
          </div>
          <div>
            <img src="./images/furnitures.png" class="ammenity_image"/>
            <h3><?php echo $furnished ?></h3>
          </div>
        </div>
        <h1><?php echo $proj_name ?></h1>


        <div class="area-features">
          <div class="feature-box-1">
            <div class="feature-box">
                <div class="feature-img-box">
                  <img src="./images/house (1).png" class="ammenity_image"/>
                </div>
                <div>
                  <h2><?php echo $wing.$society_name?></h2>
                  <p>
                    <?php echo $address ?>
                  </p>
                </div>
              </div>
              <div class="feature-box">
                <div class="feature-img-box">
                    <img src="./images/furnitures.png" class="ammenity_image"/>
                </div>
                <div class="status-div">
                  <h2>Furnishes: <?php echo $furnished ?> </h2>
                  <h2>Status:<?php echo $status ?></h2>
                </div>

              </div>
          </div> 

          <div class="feature-box-2">
            <div class="feature-box">
              <div class="feature-img-box">
                <img src="./images/park.png" class="ammenity_image"/>
              </div>
              <div class="parking-div">
                <h2>Parking: <?php echo $parking ?> </h2>
                <h2>Garden:<?php echo $garden ?></h2>
              </div>
            </div>
            <div class="feature-box">
              <div class="feature-img-box">
                <img src="./images/get-money.png" class="ammenity_image"/>
              </div>
              <div class="price">
                <h1><?php echo $price.$value ?></h1>
              </div>
            </div>
          </div>
        </div>

        <a href="./enquiry.php" class="enquiry">Show Interest</a>
      </div>
         
    
  
   
  

</body>
</html>