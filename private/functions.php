<?php
    function function_alert($message) { 
        // Display the alert box; note the Js tags within echo, it performs the magic
        echo "<script>alert($message);</script>"; 
    } 
?>