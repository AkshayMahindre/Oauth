<?php 
// autoload classes
spl_autoload_register(function ($class_name) {
  if(!file_exists( $class_name . '.php')) throw new Exception("Unable to load class - $class_name.");
  include $class_name . '.php';
});

try{
  // inject dependancy.
  $oauth = new Authorization(new Google());
  if(isset($_GET['code'])){
    $oauth->getAccessToken($_GET['code']);
  }else{
    $oauth->redirectUrl();
  }

}catch(\Exception $e){
  echo $e->getMessage(), "\n";
}


?>
