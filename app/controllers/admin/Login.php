<?php

class Login
{
    use Controller;

    public function index()
    {
        $data = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $admin = new Admin;
            $arr['email'] = $_POST['email'];

            $row = $admin->first($arr);

            if ($row) {
                // if ($row->password === $_POST['password']) {
                //     $_SESSION['USER'] = $row;
                //     redirect('home');
                // }

                if (password_verify($_POST['password'], $row->password)) {

                    $authToken = hash('sha384', microtime() . uniqid() . bin2hex(random_bytes(10)));
                    $admin->updateToken($arr['email'], $authToken);

                    $this->setSession('ADMIN', $row);
                    $this->setSession('user_id', $row->id);
                    $this->setSession('user_name', $row->name);
                    $this->setSession('auth_token', $authToken);

                    redirect('admin/dashboard');
                    exit();
                }
            }

            $admin->errors['email'] = "Wrong email or password";

            $data['errors'] = $admin->errors;
        }

        $this->view('admin/login', $data);
    }

}
