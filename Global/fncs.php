<?php
class SessionHelper {

    // Save message into session
    public function storeMessage($key, $message, $type = 'info') {
        if (is_array($message)) {
            $_SESSION[$key] = $message;
        } else {
            $_SESSION[$key] = "<div class='alert alert-{$type}'>{$message}</div>";
        }
    }

    // Retrieve and clear session message
    public function fetchMessage($key) {
        if (!empty($_SESSION[$key])) {
            $stored = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $stored;
        }
        return null;
    }
}
