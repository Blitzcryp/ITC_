<?php
if(isset($_POST['data'])){
    echo($_POST['data']);
    return(json_decode($_POST['data']));
}
?>