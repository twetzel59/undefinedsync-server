<?php
    /*if (is_file("checkout_status")) {
        echo "undefinedSync_proto0";
    } else {
        echo "undefinedSync_error0;Checkout status file is missing or is not a regular file";
    }*/
    
    $host = "";
    $username = "";
    $dbname = "";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "undefinedSync_proto0";
    } catch(PDOException $e) {
        echo "undefinedSync_error0;MySQL error";
    }
?>
