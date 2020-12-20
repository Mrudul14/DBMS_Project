<?php
session_start();

if(isset($_SESSION['email'])){
    
}
else{
    echo '<script>window.location.href="home.php"</script>'; //homepage
}

?>