<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries</title>
    <link rel="stylesheet" href="./Styles/style.enquirylist.css"/>
    <link rel="stylesheet" href="./Styles/style.allprop.css"/>
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

    $query = "SELECT * FROM enquiry";

    $enquiries = mysqli_query($connection, $query);

    if(isset($_GET["delete"])){

        $id = $_GET["delete"];
        $query = "DELETE FROM enquiry WHERE id={$id};";
        $deleted_enquiry = mysqli_query($connection, $query);
        header("Leader: enquiries.php");
    }

    ?>
    <div class="enquiries">
        <?php

        if($enquiries){

        while($row = mysqli_fetch_assoc($enquiries)){

            $id = $row["id"];
            $name = $row["name"];
            $phone = $row["phone"];
            $location = $row["location"];
            $address = $row["address"];
            $des_location = $row["des_location"];
            $rooms = $row["rooms"];
            $budget = $row["budget"];
            $message = $row["message"];
          

            echo "<div class='enquiry_card'>     
                    <h2>Name: $name</h2>
                    <div class='contact'>
                        <label><img src='./images/telephone.png' class='icons'> $phone</label>
                        <label><img src='./images/pin.png' class='icons'>$location </label>
                    </div>
                    <span>
                        <b>Address:</b> $address
                    </span>
                    <div class='image-div'>
                    </div>
                    <h3>Desired Location: $des_location</h3>
                    <div class='ammenities'>
                        <label><img src='./images/sofa (1).png' class='icons'/>$rooms</label>
                        <label><img src='./images/money.png' class='icons' />$budget</label>
                    </div>
                    <div class='message'>
                        <img src='./images/comment.png' class='icons'/>
                        <span>
                            $message
                        </span>
                    <div>
                    <a href='./enquiries.php?delete={$id}' class='delete'>Delete Enquiry</a>
            </div>
        </div>
    </div>";     
        }
    }
        ?>
    </div>
</body>
</html>