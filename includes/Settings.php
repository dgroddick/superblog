<?php
declare(strict_types=1);
/**
 * Functions for doing database stuff
 */
namespace SuperBlog;

class Settings extends SuperBlog
{
    private $conn;

    public function __construct()
    {
        parent::__construct();

        $this->conn = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function create_settings_table()
    {
        $sql = "CREATE TABLE settings (
                    id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    setting_name VARCHAR(100) NOT NULL,
                    setting_value VARCHAR(100) NOT NULL
                )";
    
        if($this->conn->query($sql)) {
            echo "<p>Settings table created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function add_setting(array $args)
    {
        $sql = "INSERT INTO settings (setting_name, setting_value) VALUES ('$args[setting_name]', '$args[setting_value]')";

        if ($this->conn->query($sql)) {
            echo "<p>Setting added successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function get_all_settings()
    {
        $data = [];

        $sql = "SELECT * FROM settings";
        $result = $this->conn->query($sql);
        //echo "<pre>"; print_r($result); echo "</pre>";
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }
        else {
            echo "No settings to display";
        }

        $this->conn->close();
        return $data;
    }

    public function get_setting($setting_name)
    {
        $sql = "SELECT * FROM settings WHERE setting_name='$setting_name'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }
        else {
            echo "<p style='color:red'>Error: Setting doesn't exist</p>";
        }

        $this->conn->close();
    }
}
