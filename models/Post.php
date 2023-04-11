<?php
class Post {
    private $conn;
    private $table = 'posts';
    public $id;
    public $title;
    public $author_id;
    public $body;
    public $created_at;

    /*
        Class constructor with database
    */
     public function __construct($db) {
        $this->conn = $db;
    }

    /*
        GET posts from database
    */
    public function read() {
        // Create query
        $query = "SELECT post.id, post.title, post.body, post.created_at, user.name
                    FROM {$this->table} post
                    INNER JOIN users user ON post.author_id = user.id
                    ORDER BY post.created_at DESC";
        
        // Prepare query for execution -> preparing a query makes is safer and faster for execution
        $stmt = $this->conn->prepare($query);

        // Execute the query
        $stmt->execute();

        return $stmt;
    }
}