<?php
namespace App\Controllers;

use App\models\categories;

class CategorieController {
    public function index() {

        $categories=categories::getAllCategories();

        require_once __DIR__ . '/../views/categories.php';
    }
}