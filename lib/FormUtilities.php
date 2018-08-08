<?php

namespace FormLib;

class FormUtilities {
    static function generateFormToken($formId) {
        session_start();
        $token = md5(uniqid(microtime(), true));
        $_SESSION['form_'.$formId] = $token;
        echo '<input type="hidden" name="form_name" value="'.$formId.'">';
        echo '<input type="hidden" name="form_token" value="'.$token.'">';
    }

    static function verifyToken() {
        $tokenMatch = false;
        $response = array(
            'status' => null,
            'message' => ''
        );

        session_start();
        
        $formName = $_POST['form_name'];
        $formToken = $_POST['form_token'];
        $sessionToken = $_SESSION['form_'.$formName];
        
        if (!isset($formToken)) {
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