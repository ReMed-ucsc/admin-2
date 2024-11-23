<?php

class RemovePharmacy
{
    use Controller;
    public function index($id = null)
    {
        // Validate the ID
        if (!$id || !is_numeric($id)) {
            // Handle invalid ID
            $_SESSION['error'] = "Invalid pharmacy ID";
            redirect('admin/PharmacyDetails'); // Adjust the redirect path as needed
            return;
        }

        $pharmacy = new Pharmacy();
        $pharmacyModel = $pharmacy->getPharmacyById($id);

        if (!$pharmacyModel) {
            die("Pharmacy not found!"); // Optional debug message
        }

        $data = ['pharmacy' => $pharmacy];
        $this->view('admin/removePharmacy', $data);

        // Adjust the redirect path as needed


    }


    public function removePharmacy($action = '', $id = '')
    {
        // Protect the route
        $this->protectRoute();

        if ($action === 'delete' && !empty($id)) {
            $pharmacyModel = new Pharmacy();

            // Attempt to delete the pharmacy
            if ($pharmacyModel->delete($id)) {
                // Set success message in session if needed
                $this->setSession('success_message', 'Pharmacy deleted successfully');
            } else {
                // Set error message in session if needed
                $this->setSession('error_message', 'Failed to delete pharmacy');
            }

            // Redirect back to pharmacy listing
            redirect('admin/pharmacyDetails');
            exit();
        }

        // If no action or invalid action, redirect back
        redirect('admin/pharmacyDetails');
    }

    //add other methods like edit, update, delete, etc.
}

    // class RemovePharmacy 
    // {
    //     use Controller;
    //     public function index($id = null)
    //     {
    //         // Validate the ID
    //         if (!$id || !is_numeric($id)) {
    //             // Handle invalid ID
    //             $_SESSION['error'] = "Invalid pharmacy ID";
    //             redirect('admin/PharmacyDetails'); // Adjust the redirect path as needed
    //             return;
    //         }
    
    //         $pharmacy = new Pharmacy();
    //         $result = $pharmacy->getPharmacyById($id);
    
    //         if (!$result) {
    //             $_SESSION['error'] = "Pharmacy not found";
    //             redirect('admin/PharmacyDetails'); // Adjust the redirect path as needed
    //             return;
    //         }
    
    //         // Perform the deletion
    //         if ($pharmacy->delete($id, 'PharmacyID')) {
    //             $_SESSION['success'] = "Pharmacy deleted successfully";
    //         } else {
    //             $_SESSION['error'] = "Failed to delete pharmacy";
    //         }
    
    //         redirect('admin/PharmacyDetails'); // Adjust the redirect path as needed
    //     }
    // }
