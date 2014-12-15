<?php

class MobileServicesController extends Controller {

    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers 
     */
    Const APPLICATION_ID = 'OPINION_DESK';

    private $format = 'json';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + Auth', // we only allow deletion via POST request
        );
    }

    /**
     * Checks if a request is authorized
     * 
     * @access private
     * @return void
     */
    public function actionAuth() {
        $Tablet = $this->_checkAuth();

        if ($Tablet->is_login == 1) {
            $Responce = [
                'Status_code' => '401',
                'Success' => 'False',
                'Message' => 'Authentication Fail!',
                'Error' => 'Already login into another device! Please contact Administrator.',
            ];
            $this->_sendResponse(401, $Responce);
        }

        if ($Tablet->joining_date == null) {
            $Tablet->joining_date = new CDbExpression('NOW()');
        }
        $transaction = Yii::app()->db->beginTransaction();
        try {
            $Tablet->is_login = 1;

            if ($Tablet->save()) {
                $transaction->commit();
                $Responce = [
                    'Status_code' => '200',
                    'Success' => 'True',
                    'Message' => 'Authentication is successful !',
                    'Tablet' => [
                        'tablet_id' => $Tablet->id,
                        'first_name' => $Tablet->first_name_user,
                        'last_name' => $Tablet->last_name_user,
                        'user_profile_image_url' => $Tablet->user_profile_image_url,
                        'joining_date' => $Tablet->joining_date,
                    ]
                ];
                $this->_sendResponse(200, $Responce);
            }
        } catch (Exception $e) {
            $transaction->rollBack();

            $Responce = [
                'Status_code' => '401',
                'Success' => 'False',
                'Message' => 'Authentication Fail!',
                'Error' => $e->getMessage()
            ];
            $this->_sendResponse(401, $Responce);
            //$this->refresh();
        }

        $Responce = [
            'Status_code' => '401',
            'Success' => 'False',
            'Message' => 'Authentication Fail!',
            'Error' => 'Unknown Error.',
        ];
        $this->_sendResponse(401, $Responce);
    }

    public function actionLogOut() {
        $Tablet = $this->_checkAuth();

        if ($Tablet->is_login == 0) {
            $Responce = [
                'Status_code' => '401',
                'Success' => 'False',
                'Message' => 'Logout Request Fail!',
                'Error' => 'Device is already logged out!',
            ];
            $this->_sendResponse(401, $Responce);
        }

        $transaction = Yii::app()->db->beginTransaction();
        try {
            $Tablet->is_login = 0;

            if ($Tablet->save()) {
                $transaction->commit();
                $Responce = [
                    'Status_code' => '200',
                    'Success' => 'True',
                    'Message' => 'Logout Request is successful!',
                ];
                $this->_sendResponse(200, $Responce);
            }
        } catch (Exception $e) {
            $transaction->rollBack();

            $Responce = [
                'Status_code' => '401',
                'Success' => 'False',
                'Message' => 'Authentication Fail!',
                'Error' => $e->getMessage()
            ];
            $this->_sendResponse(401, $Responce);
        }

        $Responce = [
            'Status_code' => '401',
            'Success' => 'False',
            'Message' => 'Authentication Fail!',
            'Error' => 'Unknown Error.',
        ];
        $this->_sendResponse(401, $Responce);
    }

    /**
     * Checks if a request is authorized
     * 
     * @access private
     * @return void
     */
    private function _checkAuth() {
        /**
         * This Header is used for getting data for authentication
         */
        $headers = apache_request_headers();

        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if (!(isset($headers['API_' . self::APPLICATION_ID . '_USERNAME']) and isset($headers['API_' . self::APPLICATION_ID . '_PASSWORD']))) {
            // Error: Unauthorized
            $this->_sendResponse(403);
        }

        $username = $headers['API_' . self::APPLICATION_ID . '_USERNAME'];

        $password = $headers['API_' . self::APPLICATION_ID . '_PASSWORD'];

        // Find the user
        $Tablet_User = TabletMaster::model()->findAll(array(
            'condition' => 'username = :username',
            'params' => array(':username' => $username)
        ));

        if ($Tablet_User[0] === null) {
            // Error: Unauthorized
            $Responce = [
                'Status_code' => '401',
                'Success' => 'Fail',
                'Message' => 'Authentication Fail !',
                'Error' => 'Username is invalid.'
            ];
            $this->_sendResponse(401, $Responce);
        } else if ($Tablet_User[0]->password != $password) {
            // Error: Unauthorized

            $Responce = [
                'Status_code' => '401',
                'Success' => 'Fail',
                'Message' => 'Authentication Fail !',
                'Error' => 'Password is invalid.'
            ];
            $this->_sendResponse(401, $Responce);
        }

        return $Tablet_User[0];
    }

    /**
     * Sends the API response 
     * 
     * @param int $status 
     * @param string $body 
     * @param string $content_type 
     * @access private
     * @return void
     */
    private function _sendResponse($status = 200, $body = '', $content_type = 'application/json') {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if ($body != '') {
            // send the body
            echo CJSON::encode($body);
        } else {
            // create some body messages
            $message = '';


            // this is purely optional, but makes the pages a little nicer to read
            // for your users.  Since you won't likely send a lot of different status codes,
            // this also shouldn't be too ponderous to maintain
            switch ($status) {
                case 401:
                    $message = 'You must be authorized to use this service.';
                    break;
                case 403:
                    $message = 'Forbidden to use this service.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            $body = [
                'Status_code' => $status,
                'Success' => 'False',
                'Message' => $message,
            ];

            echo CJSON::encode($body);
        }
        Yii::app()->end();
    }

    /**
     * Gets the message for a status code
     * 
     * @param mixed $status 
     * @access private
     * @return string
     */
    private function _getStatusCodeMessage($status) {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported'
        );

        return (isset($codes[$status])) ? $codes[$status] : '';
    }

}
