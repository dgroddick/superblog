<?php
declare(strict_types=1);
/**
 * Functions for doing database stuff
 */
namespace SuperBlog;

class User extends SuperBlog
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

    public function create_user_table()
    {
        $sql = "CREATE TABLE users (
                    id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL,
                    password VARCHAR(255) NOT NULL
                )";
    
        if($this->conn->query($sql)) {
            echo "<p>User table created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function create_user(array $args)
    {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$args[username]', '$args[email]', '$args[password]')";

        if ($this->conn->query($sql)) {
            echo "<p>User created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function update_user(array $args)
    {
        $sql = "UPDATE users SET username='$args[username]', email='$args[email]', password='$args[password]' WHERE id='$args[id]'";

        if ($this->conn->query($sql)) {
            echo "<p>User created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function get_user_by_username($username): array
    {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }
        else {
            echo "<p style='color:red'>Error: Username doesn't exist</p>";
        }

        $this->conn->close();
    }

    public function get_user_by_id(int $user_id)
    {
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $result = $this->conn->query($sql);
        //echo "<pre>"; print_r($result); echo "</pre>";

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                return $row;
            }
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        $this->conn->close();
    }

    public function get_users(): array
    {
        $data = [];
        $sql = "SELECT * FROM users";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }
        else {
            echo "<p style='color:red'>Error: No users</p>";
        }

        $this->conn->close();
        return $data;
    }

}