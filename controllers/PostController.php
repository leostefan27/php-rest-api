<?php
include_once '../config/Database.php';
include_once '../models/Post.php';

class PostController {
    private $db;
    private $post;

    /*
        Class constructor that inits Database and Post objects
    */
    public function __construct() {
        $this->db = (new Database())->connect();
        $this->post = new Post($this->db);
    }

    /*
        Function that returns all posts from database
    */
    public function read_all_posts() {
        // Get posts from database
        $result = $this->post->read();

        // Check if there are any posts
        if(count($result) > 0) {
            echo json_encode($result);
        } else {
            // No posts
            echo json_encode(array('message' => 'No posts found'));
        }
    }
}
