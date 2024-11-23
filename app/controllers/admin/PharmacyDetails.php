<?php

// class PharmacyDetails
// {
//     use Controller;

//     public function index()
//     {
//         // Protect the route
//         $this->protectRoute();

//         // Get session data
//         $pharmacyId = $this->getSession('pharmacy_id');
//         $pharmacyName = $this->getSession('pharmacy_name');
//         $authToken = $this->getSession('auth_token');

//         // Get all users
//         $PharmacyModel = new Pharmacy();
//         $pharmacy = $PharmacyModel->findAll();

//         // Pass session data to the view
//         $data = [
//             'pharmacyName' => $pharmacyName,
//             'pharmacyId' => $pharmacyId,
//             'authToken' => $authToken,
//             'pharmacy' => $pharmacy
//         ];

//         $this->view('admin/pharmacyDetails', $data);
//     }

//     public function pharmacydelete($id)
//     {
//         // Protect the route
//         $this->protectRoute();

//         $pharmacyModel = new Pharmacy();
//         $pharmacyModel->delete($id, 'PharmacyID');
//         redirect('PharmacyDetails');
//         exit();
//     }

//     // add other methods like edit, update, delete, etc.
// }

// PharmacyDetails.php (Controller)
class PharmacyDetails
{
    use Controller;

    public function index()
    {
        // Protect the route
        $this->protectRoute();

        // Get session data
        $pharmacyId = $this->getSession('pharmacy_id');
        $pharmacyName = $this->getSession('pharmacy_name');
        $authToken = $this->getSession('auth_token');

        // Get all pharmacies
        $PharmacyModel = new Pharmacy();
        $pharmacy = $PharmacyModel->findAll();

        if ($pharmacy === false) {
            $pharmacy = []; // Set to empty array if query fails
            // Optionally set an error message
            $this->setSession('error_message', 'Failed to fetch pharmacy data');
        }
        // Pass session data to the view
        $data = [
            'pharmacyName' => $pharmacyName,
            'pharmacyId' => $pharmacyId,
            'authToken' => $authToken,
            'pharmacy' => $pharmacy
        ];

        $this->unsetSession('error_message');
        $this->unsetSession('success_message');

        $this->view('admin/pharmacyDetails', $data);
    }

   
}