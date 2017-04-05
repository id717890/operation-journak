<?php

namespace App\Infrastructure\Interfaces\Services;

interface IMailerService
{
    public function EmailConfirmRegistration($mail_to, $headers = '', $token); //отправка почты для подтверждения регистрации

    public function EmailResetPassword($mail_to, $headers = '', $token); //отправка почты для сброса пароля
}