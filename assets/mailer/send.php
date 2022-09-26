<?php
  require 'class.phpmailer.php';
  require 'class.smtp.php';
  require 'reCaptcha.php';


/**  ReCaptcha test
  if (!reCaptcha::test($_POST["g-recaptcha-response"])) {
    http_response_code(409);
    die();
  }
 */

  $names = [
    "phone" => "Телефон",
    "name" => "Имя",
    "message" => "Сообщение",
    "email" => "Почта",
    "title" => "Название формы",
    "gift" => "Подарок",
    "address" => "Адрес",
    "delivery" => "Способ доставки",
    "payment_type" => "Способ оплаты",
    "product_name" => "Название товара",
    "link" => "Ссылка"
  ];

// Mail authorization
$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.yandex.ru";
$mail->SMTPSecure = "tls";
$mail->Port = 587;
$mail->Username = "send@kronos5.by";
$mail->Password = "eaclccijxzolotbo";
$mail->setFrom("send@kronos5.by", "kerland.ru");
$mail->addAddress('nikola_uev@bk.ru');
$mail->addAddress('info@kronos5.by');

  // Files attach
  for ($ct = 0; $ct < count($_FILES['userfile']['tmp_name']); $ct++) {
    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['userfile']['name'][$ct]));
    $filename = $_FILES['userfile']['name'][$ct];
    if (move_uploaded_file($_FILES['userfile']['tmp_name'][$ct], $uploadfile)) {
      $mail->addAttachment($uploadfile, $filename);
    } else {
      $msg .= 'Failed to move file to ' . $uploadfile;
    }
  }

  // Mail template
  $mail->isHTML(true);
  $mail->Subject = 'kerland.ru';

  $message = "";
  foreach ($_POST as $inputName => $inputValue) {
    if (!isset($names[$inputName])) continue;
    $inputName = $names[$inputName];

    $message .= "<b>$inputName:</b> $inputValue<br>";
  }

  if ($_POST["formname"] === "test") {
    $questions = [
      "area" => [
        "name" => "Площадь",
        "unit" => "соток"
      ],
      "power" => [
        "name" => "Мощность",
        "unit" => "л.с."
      ],
      "work-type" => [
        "name" => "Виды работ",
        "unit" => ""
      ]
    ];

    $message .= "<br><br><b>Вопросы:</b><br>";
    foreach ($_POST as $inputName => $inputValue) {
      if (!isset($questions[$inputName])) continue;
      $name = $questions[$inputName]["name"];
      $unit = $questions[$inputName]["unit"];

      $message .= "<b>$name:</b> $inputValue $unit<br>";
    }
  }

  $mail->Body = $message;

  // Результат
  if (!$mail->send()) {
    http_response_code(200);

    $result = [
      "success" => false,
      "message" => $mail->ErrorInfo
    ];
  } else {
    $result = [
      "success" => true
    ];
  }

  header('Content-Type: application/json');
  echo json_encode($result);