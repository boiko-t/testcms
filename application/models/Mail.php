<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 26.06.2017
 * Time: 20:56
 */

namespace application\models;


use application\core\Config;
use application\core\ModelBase;

class Mail extends ModelBase
{
    protected $senderName;
    protected $senderEmail;
    protected $receiverName;
    protected $receiverEmail;
    protected $message;

    public function SendEmailToAdmin()
    {
        $this->receiverEmail = Config::Get('ADMIN_EMAIL');
        $this->receiverName = 'Motive Mag Admin';
        $this->message = wordwrap($this->message, 70, "\r\n");
        mail($this->receiverEmail, 'Contact us letter', $this->message);
    }

    public function SendEmailToUser()
    {
        $this->senderEmail = Config::Get('ADMIN_EMAIL');
        $this->senderName = 'Motive Mag Admin';
        mail($this->receiverName, 'Contact us letter', $this->message);
    }
}