<?php

// class Pharmacy
// {
//     use Model;

//     protected $table = 'pharmacy';
//     protected $allowedColumns = ['PharmacyID', 'RegNo', 'contactNo', 'address', 'pharmacyName', 'pharmacistName', 'license', 'approvedDate', 'email', 'status', 'latitude', 'longitude'];
//     protected $order_column = "PharmacyID";

//     public function searchNearbyPharmacy($latitude, $longitude, $range = 10)
//     {
//         $rangeInMeters = $range * 1000;

//         // Define columns to select
//         $columns = [
//             'PharmacyID',
//             'pharmacyName',
//             'contactNo',
//             'address',
//             'latitude',
//             'longitude',
//             'ST_Distance_Sphere(POINT(longitude, latitude), POINT(:longitude, :latitude)) AS distance'
//         ];

//         // Define conditions
//         $conditions = [
//             'raw' => "ST_Distance_Sphere(POINT(longitude, latitude), POINT(:longitude, :latitude)) <= :rangeInMeters"
//         ];

//         // Bind additional parameters for raw SQL conditions
//         $additionalData = [
//             'longitude' => $longitude,
//             'latitude' => $latitude,
//             'rangeInMeters' => $rangeInMeters
//         ];

//         return $this->selectWhere($columns, $conditions, $additionalData, 'distance ASC');
//     }

//     function checkLicenseNumberUnique($licenseNumber)
//     {
//         // Assuming you have a database connection $db
//         global $db;
//         $query = $db->prepare("SELECT COUNT(*) FROM pharmacy WHERE license = ?");
//         $query->execute([$licenseNumber]);
//         $count = $query->fetchColumn();

//         return $count == 0;
//     }


//     function validate($licenseNumber)
//     {
//         $this->errors = []; // Clear any existing errors

//         // Check if license number is unique
//         if (!$this->checkLicenseNumberUnique($licenseNumber)) {
//             $this->errors['license'] = "License number already exists.";
//         }

//         return empty($this->errors); // Validation passes if there are no errors
//     }

// public function getPharmacyById($id)
// {
//     $data = ['PharmacyID' => $id];
//     return $this->first($data);
// }

//     public function delete($id, $id_column = 'PharmacyID')
//     {
//         try {
//             $data[$id_column] = $id;
//             $query = "delete from $this->table where $id_column = :$id_column";
//             return $this->query($query, $data) !== false;
//         } catch (Exception $e) {
//             error_log("Error deleting pharmacy: " . $e->getMessage());
//             return false;
//         }
//     }
// }


class Pharmacy
{
    use Model;

    protected $table = 'pharmacy';
    protected $allowedColumns = [
        'PharmacyID',
        'RegNo',
        'contactNo',
        'address',
        'pharmacyName',
        'pharmacistName',
        'license',
        'approvedDate',
        'email',
        'status',
        'latitude',
        'longitude'
    ];
    protected $order_column = "PharmacyID";

    public function delete($id, $id_column = 'PharmacyID')
    {
        try {
            // Validate ID
            if (empty($id)) {
                throw new Exception("Invalid pharmacy ID");
            }

            $data[$id_column] = $id;
            $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";

            // Execute the query and check result
            $result = $this->query($query, $data);

            if ($result === false) {
                throw new Exception("Failed to execute delete query");
            }

            return true;
        } catch (Exception $e) {
            error_log("Error deleting pharmacy: " . $e->getMessage());
            return false;
        }
    }
    public function getPharmacyById($id)
    {
        $data = ['PharmacyID' => $id];
        return $this->first($data);
    }

    function checkLicenseNumberUnique($licenseNumber)
    {
        // Assuming you have a database connection $db
        global $db;
        $query = $db->prepare("SELECT COUNT(*) FROM pharmacy WHERE license = ?");
        $query->execute([$licenseNumber]);
        $count = $query->fetchColumn();

        return $count == 0;
    }

    function validate($licenseNumber)
    {
        $this->errors = []; // Clear any existing errors

        // Check if license number is unique
        if (!$this->checkLicenseNumberUnique($licenseNumber)) {
            $this->errors['license'] = "License number already exists.";
        }

        return empty($this->errors); // Validation passes if there are no errors
    }
}
