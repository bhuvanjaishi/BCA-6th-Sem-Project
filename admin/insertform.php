<?php 
$errorsMsg = [
    'route_id'=>''
];
if(isset($_POST['add'])){
    $route_id = $_POST['route_id'];
// validation
if(empty($route_id)){
    $errorsMsg['route_id'] ="Route id is required";
  }

  //
  if(empty(array_filter($errorsMsg))){
    // ssql query here
    
  }
}

?>
<form action="" method="POST">
<input type="text" name="route_id">
<span style="color:red"><?php echo $errorsMsg['route_id']; ?></span>

<br>
<br>
<input type="submit" name="add">
</form>