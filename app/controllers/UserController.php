<?php
require_once("app/models/User.php");

class UserController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function showAll() {
        $users = $this->userModel->getAllUsers();
        require_once("app/views/UserListView.php");
    }

    public function show($id) {
        $user = $this->userModel->getUserById($id);
        require_once("app/views/UserView.php");
    }

    public function edit($id) {
        $user = $this->userModel->getUserById($id);
        require_once("app/views/EditUserView.php");
    }

    public function update($id, $name, $email) {
        $this->userModel->updateUser($id, $name, $email);
        header("Location: index.php");
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header("Location: index.php");
    }

    public function add($name, $email) {
        $this->userModel->addUser($name, $email);
        header("Location: index.php");
    }
}
?>
