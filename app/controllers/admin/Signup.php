<?php

class Signup
{
    use Controller;
    public function index()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $admin = new Admin;
            $data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            if ($admin->validate($data)) {
                $admin->registerUser($data['username'], $data['email'], $data['password']);
                redirect('admin/login');
                exit();
            } else {
                $data['errors'] = $admin->errors;
            }
        }


        $this->view('admin/signup', $data);
    }
}
