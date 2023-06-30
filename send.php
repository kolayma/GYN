<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

# проверка, что ошибки нет
if (!error_get_last()) {

    // Переменные, которые отправляет пользователь
    $date = $_POST['appointment-date'] ;
    $time = $_POST['appointment-time'] ;
    $phone = $_POST['appointment-phone'];
    $name = $_POST['appointment-name'];
    
    
    
    // Формирование самого письма
    $title = "Новая запись GYN";
    $body = "
    <h2>Новое обращение</h2>
    <b>Дата:</b> $date<br>
    <b>Время:</b> $time<br>
    <b>Телефон:</b> $phone<br><br>
    <b>Имя:</b><br>$name
    ";
    
    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    
    // Настройки вашей почты
    $mail->Host       = 'smtp.yandex.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'futurefuse@yandex.ru'; // Логин на почте
    $mail->Password   = 'odiqzxrcfaihlvmr'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('futurefuse@yandex.ru', 'Евгений'); // Адрес самой почты и имя отправителя
    
    // Получатель письма
    $mail->addAddress('kolayma@gmail.com');  
    // $mail->addAddress('poluchatel2@gmail.com'); // Ещё один, если нужен
    
    // Прикрипление файлов к письму
    // if (!empty($file['name'][0])) {
    //     for ($i = 0; $i < count($file['tmp_name']); $i++) {
    //         if ($file['error'][$i] === 0) 
    //             $mail->addAttachment($file['tmp_name'][$i], $file['name'][$i]);
    //     }
    // }
    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    
    // Проверяем отправленность сообщения
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
    }
    
} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка"; 
    $data['desc'] = error_get_last();
}

// Отправка результата
header('Content-Type: application/json');
echo json_encode($data);

?>