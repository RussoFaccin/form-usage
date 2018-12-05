<?php
namespace FormLib;
require_once(__DIR__.'/../config/config.php');

class FormUtilities {
    static function generateFormToken() {
        session_start();
        $token = bin2hex(random_bytes(30));
        $_SESSION['formToken'] = $token;
        echo '<input type="hidden" name="form_token" value="'.$token.'">';
    }

    static function verifyToken() {
        $tokenMatch = false;
        $response = array(
            'status' => null,
            'message' => ''
        );

        session_start();
        
        $formToken = isset($_POST['form_token']) ? $_POST['form_token'] : false;
        $sessionToken = isset($_SESSION['formToken']) ? $_SESSION['formToken'] : false;
        
        if (!$formToken) {
            $response['status'] = 401;
            $response['message'] = 'Unauthorized';
        } else if ($formToken !== $sessionToken) {
            $response['status'] = 403;
            $response['message'] = 'Form submission from unauthorized source';
        } else {
            $response['status'] = 200;
            $response['message'] = 'Form submission succeed!';
            $tokenMatch = true;
        }

        self::sendResponse($response['status'], $response);

        if (!$tokenMatch) {
            die();
        }
    }

    private static function sendResponse($statusCode, $response) {
        http_response_code($statusCode);
        print_r(json_encode($response));
    }
}