<?php
class User {
    
    private $dbHost = "ijburg-apps.nl.mysql";
    private $dbUsername = "ijburg_apps_nl_ijburg06";
    private $dbPassword = "YliA2644+";
    private $dbName = "ijburg_apps_nl_ijburg06";
    private $userTbl = 'users';

    function __construct() {
        if (!isset($this->db)) {
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Failed to connect with MySQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
            }
        }
    }

    function checkUser($userData = array()) {
        $email = $userData['email'];
        $id = $userData['oauth_uid'];
        $firstName = $userData['first_name'];
        $lastName = $userData['last_name'];
        $gender = $userData['gender'];
        $picturePath = $userData['picture'];
        $length = strlen(utf8_decode($email));
        if (!empty($userData)) {
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM " . $this->userTbl . " WHERE oauth_uid = '" . $userData['oauth_uid'] . "'";
            $prevResult = $this->db->query($prevQuery);

            if (preg_match("/[a-z]*+[0-9]/", $userData['email'])& strpos($userData['email'], '@gmail.com') !== false & strpos($userData['email'], ".") !== false | strpos($mystring, ".") == false) {

                if ($prevResult->num_rows > 0) {
                    //Update user data if already exists
                    $query = "UPDATE " . $this->userTbl . " SET email = '" . $email . "', oauth_uid = '" . $id . "', first_name = '" . $firstName . "', last_name = '" . $lastName. "', gender = '" . $gender . "', picture = '" . $picturePath . "', created = '" . date("Y-m-d H:i:s") . "', modified = '". date("Y-m-d H:i:s");         $update = $this->db->query($query);
                } else {
                    //Insert user data
                    $query = "INSERT INTO " . $this->userTbl . " SET email = '" . $email . "', oauth_uid = '" . $id . "', first_name = '" . $firstName . "', last_name = '" . $lastName. "', gender = '" . $gender . "', picture = '" . $picturePath . "', created = '" . date("Y-m-d H:i:s") . "', modified = '". date("Y-m-d H:i:s")."', role = '0'";
                    $insert = $this->db->query($query);
                }
            } else if (!preg_match("/[0-9]/", $userData['email']) & strpos($userData['email'], '@gmail.com' & strpos($userData['email'], ".") !== false | strpos($mystring, ".") == false)) {

                if ($prevResult->num_rows > 0) {
                    //Update user data if already exists
                    $query = "UPDATE " . $this->userTbl . " SET email = '" . $email . "', oauth_uid = '" . $id . "', first_name = '" . $firstName . "', last_name = '" . $lastName. "', gender = '" . $gender . "', picture = '" . $picturePath . "', created = '" . date("Y-m-d H:i:s") . "', modified = '". date("Y-m-d H:i:s");   $update = $this->db->query($query);
                } else {
                    //Insert user data
                    $query = "INSERT INTO " . $this->userTbl . " SET email = '" . $email . "', oauth_uid = '" . $id . "', first_name = '" . $firstName . "', last_name = '" . $lastName. "', gender = '" . $gender . "', picture = '" . $picturePath . "', created = '" . date("Y-m-d H:i:s") . "', modified = '". date("Y-m-d H:i:s")."', role = '1'";  $insert = $this->db->query($query);
                }
            } else if (strpos($userData['email'], '@gmail.com')) {
                echo "Wel gmail.com, geen leerling/docent";
                echo '<a href="index.php"> logout </a>';
            } else {
                echo "Geen gmail.com";
                echo '<a href="index.php"> logout </a>';
            }

            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }

        //Return user data
        return $userData;
    }

}