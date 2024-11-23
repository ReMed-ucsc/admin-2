<?php

class Dashboard
{
    use Controller;
    public function index()
    {
        // Protect the route
        $this->protectRoute();

        // Pass session data to the view
        $data = [
            
        ];

        $this->view('admin/dashboard', $data);
    }
    // add other methods like edit, update, delete, etc.
}
