<?php

class Signup
{
    use Controller;
    public function index()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new User;
            $data = [
                'name' => $_POST['name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'age' => $_POST['age'] ?? '',
                'address' => $_POST['address'] ?? '',
                'contact' => $_POST['contact'] ?? ''
            ];

            if ($user->validate($data)) {
                $user->registerUser($data['name'], $data['email'], $data['password'], $data['age'], $data['address'], $data['contact']);
                redirect('login');
                exit();
            } else {
                $data['errors'] = $user->errors;
            }
        }


        $this->view('user/signup', $data);
    }
}
