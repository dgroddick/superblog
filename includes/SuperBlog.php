<?php
declare(strict_types=1);
/**
 * Functions for doing database stuff
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

    public function create_options_table() 
    {

    }
}