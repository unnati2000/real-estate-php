<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/style.alert.css"/>
    <title>Document</title>
</head>
<body>

    <?php
        function error_handler($message){
            if($message!= ''){
                echo "<span class='error'>
                $message
            </span>";
            }
        }

        

        function success_handler($message){
            if($message!= ''){
                echo "<span class='success'>
                $message
            </span>";
            }
           
        }
    ?>
        
   

</body>
</html>