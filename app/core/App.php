<?php

// class App
// {
//     private $controller = 'Home';
//     private $method = 'index';

//     private function splitURL()
//     {
//         $URL = $_GET['url'] ?? 'home';
//         $URL = explode('/', trim($URL, "/"));
//         return $URL;
//     }

//     public function loadController()
//     {
//         $URL = $this->splitURL();

//         // Remove the public folder from the URL
//         unset($URL[0]);
//         $URL = array_values($URL); // Reindex the array
//         // show($URL);

//         // Determine if the URL contains 'admin'
//         $isAdmin = false;
//         if (!empty($URL[0]) && strtolower($URL[0]) === 'admin') {
//             $isAdmin = true;
//             unset($URL[0]);
//             $URL = array_values($URL);
//         }
//         // show($URL);

//         // Check if the controller exists and select it
//         $controllerPath = $isAdmin ? "../app/controllers/admin/" : "../app/controllers/user/";
//         $filename = $controllerPath . ucfirst($URL[0] ?? 'Dashboard') . ".php";
//         if (file_exists($filename)) {
//             require_once($filename);
//             $this->controller = ucfirst($URL[0] ?? 'Dashboard');
//             unset($URL[0]);
//         } else {
//             require_once("../app/controllers/_404.php");
//             $this->controller = '_404';
//         }

//         $controller = new $this->controller;

//         // Check if the method exists and select it
//         if (!empty($URL[1])) {
//             if (method_exists($controller, $URL[1])) {
//                 $this->method = $URL[1];
//                 unset($URL[1]);
//             }
//         }

//         // read the url and pass the remaining parts as arguments to the method
//         // If no method is specified, default to 'index'
//         call_user_func_array([$controller, $this->method], $URL);
//     }
// }


class App
{
    private $controller = 'Home';
    private $method = 'index';

    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'home';
        $URL = explode('/', trim($URL, "/"));
        return $URL;
    }

    public function loadController()
    {
        $URL = $this->splitURL();

        // Remove the public folder from the URL
        unset($URL[0]);
        $URL = array_values($URL); // Reindex the array

        // Determine if the URL contains 'admin'
        $isAdmin = false;
        if (!empty($URL[0]) && strtolower($URL[0]) === 'admin') {
            $isAdmin = true;
            unset($URL[0]);
            $URL = array_values($URL);
        }

        // Check if the controller exists and select it
        $controllerPath = $isAdmin ? "../app/controllers/admin/" : "../app/controllers/user/";
        $filename = $controllerPath . ucfirst($URL[0] ?? 'Dashboard') . ".php";
        if (file_exists($filename)) {
            require_once($filename);
            $this->controller = ucfirst($URL[0] ?? 'Dashboard');
            unset($URL[0]);
            $URL = array_values($URL); // Reindex after unsetting
        } else {
            require_once("../app/controllers/_404.php");
            $this->controller = '_404';
        }

        $controller = new $this->controller;

        // Check if the method exists and select it
        if (!empty($URL[0])) {
            if (method_exists($controller, $URL[0])) {
                $this->method = $URL[0];
                unset($URL[0]);
                $URL = array_values($URL); // Reindex after unsetting
            }
        }

        // Clean and validate parameters before passing them
        $params = [];
        foreach ($URL as $param) {
            if (is_numeric($param)) {
                $params[] = filter_var($param, FILTER_VALIDATE_INT);
            } else {
                $params[] = filter_var($param, FILTER_SANITIZE_STRING);
            }
        }

        // Call the controller method with the cleaned parameters
        call_user_func_array([$controller, $this->method], $params);
    }
}