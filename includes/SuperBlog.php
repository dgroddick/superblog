<?php
declare(strict_types=1);
/**
 * Functions for interacting with the database
 */
namespace SuperBlog;

class SuperBlog
{
    private $conn;

    /**
     * 
     */
    public function __construct()
    {
        $this->conn = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * 
     */
    public function db_reset()
    {
        //$sql = "DROP TABLE posts";
        $sql = "DROP TABLE users";
        $this->conn->query($sql);
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

    public function get_user($username, $password): array
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


    public function create_options_table() 
    {

    }

    public function create_post_table()
    {    
        $sql = "CREATE TABLE posts (
                    id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    user_id INTEGER NOT NULL,
                    post_title VARCHAR(255) NOT NULL,
                    post_content TEXT NOT NULL,
                    post_date DATETIME  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (user_id) REFERENCES users(id)
                )";
    
        if($this->conn->query($sql)) {
            echo "<p>Post table created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function create_post(array $args)
    {
        $sql = "INSERT INTO posts (user_id, post_title, post_content) VALUES ('$args[user_id]', '$args[post_title]', '$args[post_content]')";

        if ($this->conn->query($sql)) {
            echo "<p>Post created successfully</p>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    /**
     * Fetch all posts
     * 
     * @return array $data
     */
    public function get_posts(): array
    {
        $data = [];

        $sql = "SELECT * FROM posts";
        $result = $this->conn->query($sql);
        //echo "<pre>"; print_r($result); echo "</pre>";
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }
        else {
            echo "No posts to display";
        }

        $this->conn->close();
        return $data;
    }

    /**
     * Fetch a single post
     * 
     * @param $post_id
     * @return array $data
     */
    public function get_single_post($post_id): array
    {
        $data = [];
        $sql = "SELECT id, post_title, post_content, post_date FROM posts WHERE id=$post_id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($data, $row);
            }
        }

        $this->conn->close();
        
        return $data;
    }


    /**
     * Update a post
     */
    public function update_post($post)
    {

    }
}