<?php

class User {
    protected $db;
    
    public function __construct() {
        $this->db = new Database;
    }
}