<?php

    include "../conn.php";

    $email = htmlentities(@$_POST['email'], ENT_QUOTES);
    $password = sha1(htmlentities(@$_POST['password'], ENT_QUOTES));
    if($fullname == "" || $email == "" || $password == ""){
        header('location:'.$host.'signin.php?status=failed');
    }else{
        $sql = "SELECT * FROM users where email = '$email' and password = '$password'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                session_start();
                @$_SESSION["id"] = $row['id'];
                @$_SESSION["fullname"] = $row['fullname'];
                @$_SESSION['tipe'] = 'users';

                header('Location: '.$host.'profile.php');
            }
        } else {
            header('Location: '.$host.'signin.php?status=failed' );
        }
    }
    $conn->close();


?>