<?php

namespace App\Interfaces;

interface MailRepositoryInterface
{
    public function sendContactMail(array $data): bool;
}
