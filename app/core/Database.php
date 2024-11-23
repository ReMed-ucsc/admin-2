<?php

trait Database
{
    private function connect()
    {
        $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $con = new PDO($string, DBUSER, DBPASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // public function query($query, $data = [])
    // {
    //     $con = $this->connect();
    //     $stmt = $con->prepare($query);
    //     $check = $stmt->execute($data);
    //     if ($check) {
    //         $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    //         if (is_array($result) && count($result)) {
    //             return $result;
    //         }
    //     }

    //     return false;
    // }


    public function query($query, $data = [])
    {
        try {
            $con = $this->connect();
            $stmt = $con->prepare($query);

            // Debug logging
            error_log("SQL Query: " . $query);
            error_log("Parameters: " . print_r($data, true));

            $check = $stmt->execute($data);
            if ($check) {
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                if (is_array($result) && count($result)) {
                    return $result;
                }
            }
            return false;
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            error_log("SQL Query: " . $query);
            error_log("Parameters: " . print_r($data, true));
            throw $e;
        }
    }




    public function get_row($query, $data = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);
        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result[0];
            }
        }

        return false;
    }
}
