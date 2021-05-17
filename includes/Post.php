<?php
declare(strict_types=1);
/**
 * Functions for doing database stuff
 */
namespace SuperBlog;

class Post extends SuperBlog
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

    public function delete_post($post_id)
    {
        $sql = "DELETE FROM posts WHERE id=$post_id";
        //echo $sql; exit();
        $result = $this->conn->query($sql);
        $this->conn->close();
    }

}