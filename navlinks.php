<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/style.css"/>
    <title>Document</title>
</head>
<body>
    <?php
        
        ob_start();


        if(isset($_SESSION["loggedin"])){

            echo "
            <a href='./index.php'>Home</a>
            <a href='./Pages/admincontrol.php'>Admin control</a>
            <a href='./Pages/admin.php'>Admin Page</a>
            <a href= './Pages/enquiries.php'>Enquiries</a>
            <a href='./Pages/logout.php'>Logout</a> ";

        }else{
            
            echo "
            <a href='../index.php'>Home</a>
            <a href='./Pages/allProperties.php'>All properties</a>
            <a href='./Pages/enquiry.php'>Enquiry</a>
            <a href='#latest_properties'>Latest properties</a>";

        }
    ?>  

</body>
</html>