<?php

namespace App\Infrastructure\Implementation\Services;

use App\Infrastructure\Interfaces\Services\IMailerService;
use Mail; // фасад для отправки почты


class MailerService implements IMailerService
{
    protected function smtpmail($mail_to, $subject, $message, $headers = '')
    {
        /*
        MAIL_DRIVER=smtp
        MAIL_HOST=localhost
        MAIL_PORT=25
        MAIL_USERNAME=vertical@id717890.7ci.ru
        MAIL_PASSWORD=vertical
        */

        //Настройки почты
        $config['smtp_username'] = 'vertical@id717890.7ci.ru';  //Смените на имя своего почтового ящика из ISPManager.
        $config['smtp_password'] = 'vertical';  //Измените пароль.
        $config['smtp_from'] = 'vertical'; //Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого".
        //Обычно эти настройки менять не стоит
        $config['smtp_host'] = 'localhost';  //Сервер для отправки почты (для наших клиентов менять не требуется).
        $config['smtp_port'] = '25'; // Порт работы. Не меняйте, если не уверены.
        $config['smtp_debug'] = false;  //Если Вы хотите видеть сообщения ошибок, укажите true вместо false.
        $config['smtp_charset'] = 'UTF-8';   //Кодировка сообщений.

        $SEND = "Date: " . date("D, d M Y H:i:s") . " UT\r\n";
        //$SEND .=   "Subject: =?".$config['smtp_charset']."?B?".base64_encode($subject)."=?=\r\n";
        $SEND .= "Subject: " . $subject . "\r\n";
        if ($headers) $SEND .= $headers . "\r\n\r\n";
        else {
            $SEND .= "Reply-To: " . $config['smtp_username'] . "\r\n";
            $SEND .= "MIME-Version: 1.0\r\n";
            $SEND .= "Content-Type: text/html; charset=\"" . $config['smtp_charset'] . "\"\r\n";
            $SEND .= "Content-Transfer-Encoding: 8bit\r\n";
            $SEND .= "From: " . $config['smtp_username'] . "\r\n";
            $SEND .= "To: $mail_to <$mail_to>\r\n";
            $SEND .= "X-Priority: 3\r\n\r\n";
        }
        $SEND .= $message . "\r\n";
        if (!$socket = fsockopen($config['smtp_host'], $config['smtp_port'], $errno, $errstr, 30)) {
            if ($config['smtp_debug']) echo $errno . "<br>" . $errstr;
            return false;
        }

        if (!$this->server_parse($socket, "220", __LINE__)) return false;

        fputs($socket, "EHLO " . $config['smtp_host'] . "\r\n");
        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Не могу отправить EHLO!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "AUTH LOGIN\r\n");
        if (!$this->server_parse($socket, "334", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Не могу найти ответ на запрос авторизации!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, base64_encode($config['smtp_username']) . "\r\n");
        if (!$this->server_parse($socket, "334", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Логин авторизации не был принят сервером!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, base64_encode($config['smtp_password']) . "\r\n");
        if (!$this->server_parse($socket, "235", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "MAIL FROM: <" . $config['smtp_username'] . ">\r\n");
        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Не могу отправить команду MAIL FROM:</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");

        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Не могу отправить команду RCPT TO:</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "DATA\r\n");

        if (!$this->server_parse($socket, "354", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Не могу отправить команду DATA!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, $SEND . "\r\n.\r\n");

        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($config['smtp_debug']) echo '<p>Не могу отправить тело письма. Письмо не было отправлено!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "QUIT\r\n");
        fclose($socket);
        return TRUE;
    }

    function server_parse($socket, $response, $line = __LINE__)
    {
        global $config;
        $server_response = "";
        while (substr($server_response, 3, 1) != ' ') {
            if (!($server_response = fgets($socket, 256))) {
                if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response
$line
";
                return false;
            }
        }
        if (!(substr($server_response, 0, 3) == $response)) {
            if ($config['smtp_debug']) echo "<p>Проблемы с отправкой почты!</p>$response
$line
";
            return false;
        }
        return true;
    }

    //Отправить почту сразу нескольким получателям, ящики получателей пишем через запятую.
    function smtpmassmail($mail_to, $subject, $message, $headers = '')
    {
        $mailaddresses = explode(",", $mail_to);
        foreach ($mailaddresses as $mailaddress) smtpmail($mailaddress, $subject, $message, $headers);
    }

    //region отправка почты для подтверждения регистрации
    public function EmailConfirmRegistration($mail_to, $headers = '', $token)
    {
        $subject = 'Подтверждение регистрации на сайте';

        /*
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=25
        MAIL_USERNAME=jusupovz@gmail.com
        MAIL_PASSWORD=muryhldgskzhmigm
        */


        Mail::send('email.confirm_registration', ['token' => $token], function ($message) use ($mail_to, $subject) {
            $message->from('test@test.ru', 'VerticalV');
            $message->to($mail_to)->subject($subject);
        });

        /*
        $body = "<div style=\"color: #fff;background-color: #46be8a;border-color: #46be8a;padding: 30px !important;padding: 15px;border: 3px solid #43b281; border-radius: 7px; text-align: center\">";
        $body .= "Вы зарегистрировались на сайте VerticalV. </br> Для подтверждения регистрации пройдите по ";
        $body .= "<a href=\"http://id717890.7ci.ru/auth/register/confirm/" . $token . "\" target=\"_blank\">ссылке</a></div>";
        $this->smtpmail($mail_to, $subject, $body, null);
        */
//        Mail::send('emails.confirm', ['token' => $newUser->confirm_token], function ($u) use ($newUser) {
//            $u->from('admin@site.ru');
//            $u->to($newUser->email);
//            $u->subject('Confirm registration');
//        });
    }
    //endregion


    //region отправка почты для сброса пароля
    public function EmailResetPassword($mail_to, $headers = '', $token)
    {
        $subject = 'Сброс пароля';
        /*
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=25
        MAIL_USERNAME=jusupovz@gmail.com
        MAIL_PASSWORD=muryhldgskzhmigm
        */

        Mail::send('emails.password_reset', ['token' => $token], function ($message) use ($mail_to, $subject) {
            $message->from('test@test.ru', 'VerticalV');
            $message->to($mail_to)->subject($subject);
        });
        /*test 2*/
        /*test 3*/
        /*test 4*/
        /*test 5*/

        /*
        $body = "<div style=\"color: #fff;background-color: #46be8a;border-color: #46be8a;padding: 40px !important;padding: 15px;border: 3px solid #43b281; border-radius: 7px; text-align: center\">";
        $body .= "Для сброса пароля пройдите по ";
        $body .= "<a href=\"http://id717890.7ci.ru/password/reset/" . $token . "\" target=\"_blank\">ссылке</a></div>";
        $this->smtpmail($mail_to, $subject, $body, null);
        */
    }
    //endregion
}