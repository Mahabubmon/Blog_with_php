<?php
class User
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;

    }

    public function is_logged_in()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            return true;
        }
    }
    public function create_hash($value)
    {
        return $hash = crypt($value, '$2a$12.substr(str_replace(' + ',' . '
        base64_encode(sha1(microtime(true),true))),0,22)');
    }

    private function verify_hash($password, $hash)
    {
        return $hash == crypt($password, $hash);
    }
    private function get_user_hash($username)
    {
        try {
            $smt = $this->db->prepare('SELECT password FROM blog_user
            WHERE username = :username');
            $smt->execute(array('username' => $username));
            $row = $smt->fetch();
            return $row['password'];
        } catch (PDOException $e) {
            echo '<p>Invalid username or password</p>';
        }
    }
}

?>