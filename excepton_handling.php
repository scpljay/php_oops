<?php
function checkNum($number) {
  if($number>1) {
    throw new Exception("Value must be 1 or below");
  }
  return true;
}

try {
  checkNum(5);
  //If the exception is thrown, this text will not be shown
  // echo 'If you see this, the number is 1 or below';
  $e = new Exception("If you see this, the number is 1 or below");
  echo 'Message: ' .$e->getMessage();
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();

}
// var_dump($res);
?>