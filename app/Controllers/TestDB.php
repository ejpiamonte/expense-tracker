<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();
            echo "✅ Database connected successfully!";
        } catch (\Exception $e) {
            echo "❌ Connection failed: " . $e->getMessage();
        }
    }
}
