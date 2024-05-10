<?php
require_once 'DAO/LoginDAO.php';
class LoginController
{

    private $user;
    public function login()
    {
        if ($this->isUserLoggedIn()) {
            // User is already logged in, perform logout
            unset($_SESSION['user']);
            header('Location: index.php?controller=login');
        } else {
            // User is not logged in

            if ($this->isLoginFormSubmitted()) {
                // Form submission handling

                $username = $_POST['username'];
                $password = $_POST['password'];
                $this->user = new LoginDAO();
                $checkUser = $this->user->checkUser($username, $password);


                if ($checkUser) {
                    if ($checkUser['status'] != 0) {
                        // User account is disable
                        echo "<script>alert('Your account has been disabled.');</script>";
                        include 'view/login/login.php';
                    } else {
                        // Successful login handling
                        $_SESSION['user'] = $checkUser;

                        // Set user_id cookie
                        setcookie('user_id', $checkUser['id_user'], time() + (86400 * 15), "/");

                        // Redirect based on user permissions
                        $this->redirectBasedOnPermissions($checkUser['permissions']);
                    }
                } else {
                    // Incorrect login credentials handling
                    echo "<script>alert('The login information is incorrect. Please try again.');</script>";

                    include 'view/login/login.php';
                }
            } else {
                // Display login form
                include 'view/login/login.php';
            }
        }
    }

    private function redirectBasedOnPermissions($permissions)
    {
        if ($permissions == 0) {
            header('Location: index.php?controller=home');
        } elseif ($permissions == 1) {
            header('Location: admin_/index.php');
        }
    }



    private function isUserLoggedIn()
    {
        return isset($_SESSION['user']);
    }

    private function isLoginFormSubmitted()
    {
        return isset($_POST['login']) && ($_POST['login']);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        // Điều hướng hoặc thông báo đăng xuất thành công
        header("Location: index.php?controller=home");
    }



    public function signup()
    {
        if (isset($_POST['register']) && ($_POST['register'])) {
            // Lấy dữ liệu từ form
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $username = isset($_POST['username']) ? $_POST['username'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $phone = isset($_POST['phone']) ? $_POST['phone'] : null;
            $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : null;

            // Kiểm tra tính hợp lệ của dữ liệu
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Invalid email address.');</script>";
            } elseif (empty($username)) {
                echo "<script>alert('Please enter a username.');</script>";
                // } elseif ($username = htmlspecialchars($username, ENT_QUOTES)) {
                //     echo "<script>alert('error.');</script>";
            } elseif (empty($password)) {
                echo "<script>alert('Please enter a password.');</script>";
                // } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
                //     echo "<script>alert('Số điện thoại không hợp lệ.');</script>";
                // } elseif (empty($full_name)) {
                //     echo "<script>alert('Vui lòng nhập tên đầy đủ.');</script>";
            } else {
                // Kiểm tra xem tài khoản đã tồn tại hay chưa
                $user = new LoginDAO();
                if ($user->check_user_exists($username)) {
                    // Tài khoản đã tồn tại, hiển thị thông báo hoặc thực hiện các hành động khác
                    echo "<script>alert('Account already exists. Please choose a different username.');</script>";
                } else {
                    // Tài khoản chưa tồn tại, thêm vào cơ sở dữ liệu
                    $user->insert_user($email, $username, $password);
                    header('Location:index.php?controller=login');
                }
            }
        }
        include 'view/login/sigin.php';
    }

    function is_valid_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function is_valid_username($username)
    {
        return $username = htmlspecialchars($username, ENT_QUOTES);
    }
    public function home_user()
    {
        if (isset($_SESSION['user'])) {
            require_once('view/home/user/page/home_user.php');
        } else {
            header('Location:index.php?controller=login');
        }
    }

    public function forgot()
    {
        if (isset($_POST['sendEmail']) && ($_POST['sendEmail'])) {
            $email = $_POST['email'];
            $this->user = new LoginDAO();
            $checkemail = $this->user->check_email($email);

            if (is_array($checkemail)) {
                $mess = '<div>Your Password is: ' . $checkemail['password'] . '</div>';
            } else {
                $mess = '<div>Incorect Email, Please enter corect email!</div>';
            }
        }

        include 'view/login/forGotPass.php';
    }

    public function edit()
    {
        // echo '11';
        if (isset($_POST['update']) && ($_POST['update'])) {
            // echo "22";
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['number_phone'];

            $user = $_SESSION['user'];
            $id_user = $user['id_user'];
            $this->user = new LoginDAO();
            $this->user->update_user($id_user, $username, $password, $email, $address, $phone);
            $_SESSION['user'] = $this->user->checkuser($username, $password);
            header('location: index.php?controller=home');
        }
        include "./view/login/edit.php";
    }
}
