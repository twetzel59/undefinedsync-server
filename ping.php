<?php
    if (is_file("checkout_status")) {
        echo "undefinedSync_proto0";
    } else {
        echo "undefinedSync_error0;Checkout status file is missing or is not a regular file";
    }
?>