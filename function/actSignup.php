<?php
    include "../conn-nosession.php";

    $fullname = @$_POST['fullname'];
    $email = htmlentities(@$_POST['email'], ENT_QUOTES);
    $password = sha1(htmlentities(@$_POST['password'], ENT_QUOTES));
    
    sanitizeEmpty($fullname,$host.'signup.php?status=failed');
    sanitizeEmail($email,$host.'signup.php?status=failed');
    sanitizePassword(@$_POST['password'],$host.'signup.php?status=failed');

    // insert to database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $sql_profile = "INSERT INTO user_profile (id_user,fullname) VALUES ('$conn->insert_id','$fullname')";
        if($conn->query($sql_profile) === TRUE){
            
            header('location:'.$host.'signin.php?status=success');
        } else {;
            echo("Error description: " . mysqli_error($conn));
        }  
    } 
        
    

?>
