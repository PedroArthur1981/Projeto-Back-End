<?php
    session_start();
    session_destroy();

    echo "<script>window.location = '../home.php'</script>";
?>