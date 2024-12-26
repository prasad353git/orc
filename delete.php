<?php

$del=unlink($_GET["name"]);
if($del==0)
{
    echo '<script type="text/javascript"> alert("Error Deleting Data!"); </script>'; 

}

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>