<?php
require_once 'db_connection.php'; // Include db_connection.php file

class Employee
{
    private $conn;

    public function __construct()
    {
        $db = new Database(); // Create an instance of the Database class
        $this->conn = $db->conn; // Access the connection property from the Database class
    }

    // Add new employee
    public function addEmployee($name, $email, $designation, $salary)
    {
        // Insert the new employee with parameterized query
        $sql = "INSERT INTO employees (name, email, designation, salary) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssd", $name, $email, $designation, $salary);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    // Search Employee class to search employees by criteria
    public function searchEmployees($search_by, $keyword)
    {
        $sql = "SELECT * FROM employees WHERE $search_by LIKE ?";
        $stmt = $this->conn->prepare($sql);
        // Add '%' wildcards to search for partial matches
        $keyword = '%' . $keyword . '%';
        $stmt->bind_param("s", $keyword);
        $stmt->execute();
        return $stmt->get_result();
    }


    //View/Get all employees
    public function getEmployees()
    {
        $sql = "SELECT * FROM employees";
        $result = $this->conn->query($sql);
        return $result;
    }
    
    // Update employee
    public function updateEmployee($name, $email, $designation, $salary, $id) {
    $sql = "UPDATE employees SET name=?, email=?, designation=?, salary=? WHERE id=?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $email, $designation, $salary, $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

    // Delete employee
    public function deleteEmployee($id)
    {
        $sql = "DELETE FROM employees WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
