<?php
declare(strict_types=1);
/**
 * Functions for interacting with the database
 */
namespace SuperBlog;

use PDO;

class SuperBlog
{
    private $db;

    /**
     * 
     */
    public function __construct()
    {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->db = new \PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * 
     */
    public function db_reset()
    {
        //$sql = "DROP TABLE posts";
        $sql = "DROP TABLE users";
        try {
            $this->db->query($sql);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    /**
     * 
     */
    public function create_user_table()
    {
        $sql = "CREATE TABLE users (
                    id INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(100) NOT NULL,
                    email VARCHAR(100) NOT NULL,
                    password VARCHAR(255) NOT NULL
                )";
    
        try {
            $this->db->query($sql);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    /**
     * 
     */
    public function create_user(array $args)
    {
        try {
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $args['username']);
            $stmt->bindParam(':email', $args['email']);
            $stmt->bindParam(':password', $args['password']);
            $stmt->execute();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    /**
     * 
     */
    public function create_options_table() 
    {

    }


    /**
     * 
     */
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
    
        try {
            $this->db->query($sql);
        }
        catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    /**
     * INSERT
     */
    public function create_post(array $args)
    {
        try {
            $sql = "INSERT INTO posts (user_id, post_title, post_content) VALUES (:user_id, :post_title, :post_content)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $args['user_id']);
            $stmt->bindParam(':post_title', $args['post_title']);
            $stmt->bindParam(':post_content', $args['post_content']);
            $stmt->execute();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Fetch all posts
     * 
     * @return array $data
     */
    public function get_posts(): array
    {
        try {
            $sql = "SELECT id, post_title, post_content, post_date FROM posts";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Fetch a single post
     * 
     * @param $post_id
     * @return array $data
     */
    public function get_single_post($post_id): array
    {
        try {
            $sql = "SELECT id, post_title, post_content, post_date FROM posts WHERE id=$post_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    /**
     * Update a post
     */
    public function update_post($post)
    {

    }
}