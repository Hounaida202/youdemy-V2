<?php
namespace App\Controllers;

use App\models\cours;
use App\models\lescours;

class CoursController {
    public function index($id) {

        $limit = 3;
        $pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($pageActuelle - 1) * $limit;
        $categorie_id = $id;
        $totalCours=cours::CountCours($categorie_id);
        $cours = lescours::getElementsPaginé($limit,$offset,$categorie_id);
        $totalPages = ceil($totalCours / $limit);
        $nomRecherche = isset($_GET['search']) ? trim($_GET['search']) : '';

        require_once __DIR__ . '/../views/cours.php';
    }
}