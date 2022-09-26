<?php /* Template Name: Попап */ ?>

<?php
  $popup = preg_replace("/(^\/popup\/)|(\/$)|(\/?\?.+$)/", "", $_SERVER["REQUEST_URI"]);
  
  if (!$popup) {
    http_response_code(404);
    die();
  }
  
  include __DIR__ . "/blocks/popups/$popup.php" ;
?>