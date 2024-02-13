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
        return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
    }

    public function create_hash($value)
    {
        return password_hash($value, PASSWORD_DEFAULT);
    }

    private function verify_hash($password, $hash)
    {
        return password_verify($password, $hash);
    }

    private function get_user_hash($user_name)
    {
        try {

            $smt = $this->db->prepare('SELECT password FROM blog_user WHERE user_name = :user_name');
            $smt->execute(array('user_name' => $user_name));
            $row = $smt->fetch();
            if ($row) {
                return $row['password'];
            } else {
                return null; // User not found
            }
        } catch (PDOException $e) {
            echo '<p class="error">' . $e->getMessage() . '</p>';
        }
    }


    public function login($user_name, $password)
    {
        $hashed = $this->get_user_hash($user_name);
        if ($hashed !== false && $hashed !== null && $this->verify_hash($password, $hashed)) {
            $_SESSION['loggedin'] = true;
            return true;
        } else {
            return false;
        }
    }
    public function logout()
    {
        session_destroy();
    }
}
?>