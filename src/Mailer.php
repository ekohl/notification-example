<?php
class Mailer {
    public function send($to, $subject, $message) {
        return mail($to, $subject, $message);
    }
}
