<?php
  class reCaptcha {
    static $secretKey = "6Lfki7oaAAAAADj1UbvWET89PTretnpoNNvaoJIt";
    static $score = 0.5;
    
    public static function test($token): bool {
      $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . self::$secretKey . "&response={$token}");
      $response = json_decode($response);
  
      return $response->success == true && $response->score > self::$score;
    }
  }