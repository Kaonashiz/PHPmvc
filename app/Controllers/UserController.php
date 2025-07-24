<?php
require_once '../app/Models/User.php';

class UserController extends Controller {
    public function index() {
        $model = new User();
        $users = $model->getAllUsers();
        $this->view('user/index', ['users' => $users]);
    }
}
