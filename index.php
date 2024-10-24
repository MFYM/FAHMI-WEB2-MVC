<?php
require_once 'config/database.php';
require_once 'app/controllers/UserController.php';

$dbConnection = getDBConnection();
$controller = new UserController($dbConnection);

$action = isset($_GET['action']) ? $_GET['action'] : 'list';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

switch ($action) {
    case 'detail':
        if ($id) {
            $controller->show($id);
        }
        break;
    case 'edit':
        if ($id) {
            $controller->edit($id);
        }
        break;
    case 'update':
        if ($id && isset($_POST['name']) && isset($_POST['email'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $controller->update($id, $name, $email);
        }
        break;
    case 'delete':
        if ($id) {
            $controller->delete($id);
        }
        break;
    case 'add':
        $controller->add($_POST['name'], $_POST['email']);
        break;
    default:
        $controller->showAll();
        break;
}
?>
