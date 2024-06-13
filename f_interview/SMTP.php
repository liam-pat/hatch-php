<?php

namespace App\f_interview;

class SMTP
{
    private string $host;
    private int $port = 25;

    /**
     * base64 encode
     * @var string
     */
    private string $user;

    /**
     * base64 encode
     * @var string
     */
    private string $pass;

    private bool $debug = false;

    private $sock;

    /**
     * 0 text，1 html
     * @var int
     */
    private int $mailFormat = 0;

    public function __construct($host, $port, $user, $pass, $format = 1, $debug = false)
    {
        $this->host = $host;
        $this->port = $port;
        $this->debug = $debug;
        $this->mailFormat = $format;
        $this->pass = $pass;
        $this->user = $user;

        $this->sock = fsockopen($this->host, $this->port, $errno, $errStr, 10);

        if (!$this->sock) {
            exit(sprintf("Error number: %s ,Error string : %s", $errno, $errStr));
        }

        $response = fgets($this->sock);

        if (!str_contains($response, "220")) {
            exit(sprintf("Server error : %v \n", $response));
        }
    }


    private function showDebug($message): void
    {
        if ($this->debug) {
            echo sprintf("<p>Debug : $message</p>\n");
        }
    }

    private function doCommand($cmd, $returnCode): bool
    {
        fwrite($this->sock, $cmd);

        $response = fgets($this->sock);

        if (strstr($response, "$returnCode") === false) {
            $this->showDebug($response);

            return false;
        }

        return true;
    }

    private function isEmail($email): bool
    {
        $pattern = "/^[^_][\w]*@[\w.]+[\w]*[^_]$/";
        if (preg_match($pattern, $email, $match)) {
            return true;
        }

        return false;
    }

    public function sendMail($from, $to, $subject, $body): bool
    {
        if (!$this->isEmail($from) || !$this->isEmail($to)) {
            $this->showDebug('please enter valid from/to email');

            return false;
        }

        if (empty($subject) || empty($body)) {
            $this->showDebug('please enter subject/body');

            return false;
        }
        $detail = "From:" . $from . "\r\n";
        $detail .= "To:" . $to . "\r\n";
        $detail .= "Subject:" . $subject . "\r\n";

        if ($this->mailFormat == 1) {
            $detail .= "Content-Type: text/html;\r\n";
        } else {
            $detail .= "Content-Type: text/plain;\r\n";
        }

        $detail .= "charset = gb2312\r\n\r\n";
        $detail .= $body;

        $this->doCommand("HELO {$this->host}\r\n", 250);
        $this->doCommand("AUTH LOGIN\r\n", 334);
        $this->doCommand($this->user . "\r\n", 334);
        $this->doCommand($this->pass . "\r\n", 235);
        $this->doCommand("MAIL FROM:" . $from . "\r\n", 250);
        $this->doCommand("RCPT TO:" . $to . "\r\n", 250);
        $this->doCommand("DATA\r\n", 354);
        $this->doCommand($detail . "\r\n.\r\n", 250);
        $this->doCommand("QUIT\r\n", 221);

        return true;
    }
}

$host = "smtp.qq.com";
$port = 25;
$user = base64_encode("xxx@qq.com");
$password = base64_encode('xxxxx');

$from = "xxxx@qq.com";
$to = "xxxx@gmail.com";

$subject = "hello body";
$content = "this is example email for you";

$mail = new SMTP($host, $port, $user, $password, 1, true);
$mail->sendMail($from, $to, $subject, $content);
