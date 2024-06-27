<?php

/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
/**
 * inicializate class constructor
 */
$moodleAPI = new moodle();

class moodle {

    public function __construct() {
        error_reporting(0);
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta             
                $action = $_GET['action'];
                if ($action == 'core_get_courses_moodle') {
                    $this->core_get_courses_moodle();
                }
                break;
            case 'POST'://inserta
                $action = $_POST['action'];
                if ($action == 'core_user_create_user_moodle') {
                    $this->core_user_create_user_moodle();
                }
                if ($action == 'core_user_update_password') {
                    $this->core_user_update_password();
                }
                if ($action == 'core_user_update_username') {
                    $this->core_user_update_username();
                }
                if ($action == 'enrol_manual_enrol_users') {
                    $this->enrol_manual_enrol_users();
                }
                if ($action == 'auth_userkey_request_login_url') {
                    $this->auth_userkey_request_login_url();
                }
                if ($action == 'core_user_update_institut') {
                    $this->core_user_update_institut();
                }
                break;
            case 'PUT':
                echo 'METODO NO SOPORTADO';
                break;
            case 'DELETE'://elimina
                echo 'METODO NO SOPORTADO';
                break;
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    public function auth_userkey_request_login_url() {
        $errorMSG = "";
        //moodle_email
        if (empty($_POST["moodle_email"])) {
            $errorMSG = "moodle_email is required ";
        } else {
            $moodle_email = $_POST["moodle_email"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            try {
                include './core_token_service_web_moodle.php';
                $functionname = 'auth_userkey_request_login_url';
                $restformat = 'json';

                $user = array(
                    'username' => $moodle_email, //unique
                );
                $param = array("user" => $user); // the paramater to send
                $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
                require_once('../msw/curl.php'); // You can put it in the top.
                $curl = new curl;
                $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
                $resp = $curl->post($serverurl . $restformat, $param);
                $this->print_json_resquest($resp);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    public function core_user_update_institut() {
        $errorMSG = "";
        //idmoodle
        if (empty($_POST["idimoodle"])) {
            $errorMSG = "idimoodle is required ";
        } else {
            $idimoodle = $_POST["idimoodle"];
        }
        //new institution
        if (empty($_POST["institution"])) {
            $errorMSG = "institution is required ";
        } else {
            $institution = $_POST["institution"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            try {
                include './core_token_service_web_moodle.php';
                $functionname = 'core_user_update_users';
                $restformat = 'json';
                $user = array(
                    "id" => $idimoodle,
                    "description" => "$institution",
                    "institution" => "$institution"
                );
                $users = array($user); // must be wrapped in an array because it's plural.
                $param = array("users" => $users); // the paramater to send
                $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
                require_once('../msw/curl.php'); // You can put it in the top.
                $curl = new curl;
                $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
                $resp = $curl->post($serverurl . $restformat, $param);
//                echo '<pre>';
//                print_r($resp);
//                echo '</pre>';
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    public function core_user_update_password() {
        $errorMSG = "";
        //idmoodle
        if (empty($_POST["idimoodle"])) {
            $errorMSG = "idimoodle is required ";
        } else {
            $idimoodle = $_POST["idimoodle"];
        }
        //new password
        if (empty($_POST["new_password"])) {
            $errorMSG = "new_password is required ";
        } else {
            $new_password = $_POST["new_password"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            try {
                include './core_token_service_web_moodle.php';
                $functionname = 'core_user_update_users';
                $restformat = 'json';
                $user = array(
                    "id" => $idimoodle,
                    "password" => $new_password
                );
                $users = array($user); // must be wrapped in an array because it's plural.
                $param = array("users" => $users); // the paramater to send
                $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
                require_once('../msw/curl.php'); // You can put it in the top.
                $curl = new curl;
                $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
                $resp = $curl->post($serverurl . $restformat, $param);
                echo 'Password updated correctly ';
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    public function core_user_update_username() {
        $errorMSG = "";
        //idmoodle
        if (empty($_POST["idimoodle"])) {
            $errorMSG = "idimoodle is required ";
        } else {
            $idimoodle = $_POST["idimoodle"];
        }
        //new password
        if (empty($_POST["username"])) {
            $errorMSG = "username is required ";
        } else {
            $username = $_POST["username"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            try {
                include './core_token_service_web_moodle.php';
                $functionname = 'core_user_update_users';
                $restformat = 'json';
                $user = array(
                    "id" => $idimoodle,
                    'username' => strtolower($username), // must be unique string in lowercase
                    'email' => strtolower($username), //unique
                );
                $users = array($user); // must be wrapped in an array because it's plural.
                $param = array("users" => $users); // the paramater to send
                $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
                require_once('../msw/curl.php'); // You can put it in the top.
                $curl = new curl;
                $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
                $resp = $curl->post($serverurl . $restformat, $param);
                echo 'username updated correctly ';
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * Trigger que inserta a alumno en moodle
     * Example invoque: core_user_create_user_moodle('dross', 'ytbo', 'yto', 'racing@lima.es');
     * @param type $username
     * @param type $firstname
     * @param type $lastname
     * @param type $email
     */
    public function core_user_create_user_moodle() {
        $errorMSG = "";
        //username
        if (empty($_POST["username"])) {
            $errorMSG .= "username is required ";
        } else {
            $username = $_POST["username"];
        }
        //firstname
        if (empty($_POST["firstname"])) {
            $errorMSG .= "firstname is required ";
        } else {
            $firstname = $_POST["firstname"];
        }
        //lastname
        if (empty($_POST["lastname"])) {
            $errorMSG .= "lastname is required ";
        } else {
            $lastname = $_POST["lastname"];
        }
        //email
        if (empty($_POST["email"])) {
            $errorMSG .= "email is required ";
        } else {
            $email = $_POST["email"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            try {
                header('Content-Type: application/json');
                include './core_token_service_web_moodle.php';
                $functionname = 'core_user_create_users';
                $restformat = 'json';

                $user = array(
                    'username' => strtolower($username), // must be unique string in lowercase
                    'password' => '123456789',
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email, //unique
                    'auth' => 'manual',
                    //'lang' => 'es',
                    //'description' => 'IZZI',
                    //'institution' => 'IZZI'
                );
                $users = array($user); // must be wrapped in an array because it's plural.
                $param = array("users" => $users); // the paramater to send
                $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' . $token . '&wsfunction=' . $functionname;
                require_once('../msw/curl.php'); // You can put it in the top.
                $curl = new curl;
                $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' . $restformat : '';
                $resp = $curl->post($serverurl . $restformat, $param);
                print_r($resp);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    /**
     * consulta la lista de cursos en moodle
     */
    public function core_get_courses_moodle() {
        // redirect to success page
        $errorMSG = "";
        if ($errorMSG == "") {
            include './core_token_service_web_moodle.php';
            $functionname = 'core_course_get_courses';
            $restformat = 'json';
            $course = array(
                    //'username' => strtolower($username), // must be unique string in lowercase
                    //'password' => '1234567891011',
                    //'firstname' => $firstname,
                    //'lastname' => $lastname,
                    //'email' => $email, //unique
                    //'auth' => 'manual',
                    //'lang' => 'en'
            );

            $courses = array($course); // must be wrapped in an array because it's plural.
            $param = array("options" => $courses); // the paramater to send
            $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' .
                    $token . '&wsfunction=' . $functionname;
            require_once('../msw/curl.php'); // You can put it in the top.
            $curl = new curl;
            $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' .
                    $restformat : '';
            $resp = $curl->post($serverurl . $restformat, $param);
            $this->print_json_resquest($resp);
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

    public function print_json_resquest($resp) {
        header('Content-Type: application/json');
        $arrays = json_decode(rtrim($resp));
        $data = array("data" => $arrays);
        print json_encode($data, JSON_PRETTY_PRINT);
    }

    public function enrol_manual_enrol_users() {
        $errorMSG = "";
        //groupid 
        if (empty($_POST["courseid"])) {
            $errorMSG = "courseid is required ";
        } else {
            $courseid = $_POST["courseid"];
        }
        //userid  
        if (empty($_POST["userid"])) {
            $errorMSG .= "userid is required ";
        } else {
            $userid = $_POST["userid"];
        }

        // redirect to success page
        if ($errorMSG == "") {
            include './core_token_service_web_moodle.php';
            $functionname = 'enrol_manual_enrol_users';
            $restformat = 'json';

            $members = array(
                'roleid' => 5, //student role
                'userid' => intval($userid), // must be unique string in lowercase        
                'courseid' => intval($courseid)
            );

            $users = array($members); // must be wrapped in an array because it's plural.

            $param = array("enrolments" => $users); // the paramater to send

            $serverurl = $domainname . '/webservice/rest/server.php' . '?wstoken=' .
                    $token . '&wsfunction=' . $functionname;

            require_once('../msw/curl.php'); // You can put it in the top.
            $curl = new curl;

            $restformat = ($restformat == 'json') ? '&moodlewsrestformat=' .
                    $restformat : '';

            $resp = $curl->post($serverurl . $restformat, $param);
            print_r($resp);
        } else {
            if ($errorMSG == "") {
                echo "Something went wrong :(";
            } else {
                echo $errorMSG;
            }
        }
    }

}
