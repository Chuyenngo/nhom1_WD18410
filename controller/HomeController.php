<?php
require_once 'DAO/ProductDAO.php';
require_once 'DAO/CommentDAO.php';
require_once 'DAO/CategoryDAO.php';

class HomeController
{
    private $products;
    private $comments;
    private $categorys;

    public function __construct()
    {
        $this->products = new ProductDAO();
        $this->comments = new CommentDAO();
        $this->categorys = new CategoryDAO();
    }

    public function index()
    {
        if (isset($_SESSION["user"])) {
            $this->checkUserStatus();
            $user = $_SESSION['user'];
        }

        // var_dump($user);
        // Continue with other logic
        if (isset($_POST['search']) && $_POST['search'] != "") {
            $searchTerm = $_POST['search'];
            $products = $this->products->Search($searchTerm);
        } else {
            $products = $this->products->Select();
        }

        $categorys = $this->categorys->showCategory();
        require_once('view/home/user/home.php');
    }

    private function checkUserStatus()
    {
        $user = $_SESSION['user'];
        if ($user['status'] != 0) {
            // If the status is not valid, destroy the session and redirect to the login page
            unset($_SESSION['user']);
            header('Location: index.php?controller=login');
            exit;
        }
    }


    public function contact()
    {
        require_once('view/home/user/contact.php');
    }
    public function chatBox()
    {
        header('Location: ./view/chatbox/index.php');
        exit;
    }
}
