
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLearn Admin - Gestion des inscriptions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-purple-800 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-2xl mr-2"></i>
                    <span class="text-2xl font-bold">Youdemy</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="../Apps/adminCategorie.php" class="hover:text-purple-200">Dashboard</a>
                    <a href="../Apps/admin_page.php" class="hover:text-purple-200">Gestion des Comptes</a>
                    <a href="../Apps/adminStatistiques.php" class="hover:text-purple-200">Statistiques</a>
                   
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm"> <?php if (isset($_SESSION['user_nom'])): ?>
        <p><?php echo htmlspecialchars($_SESSION["user_nom"]); ?></p>
      <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-6 py-12">
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Catégories</h1>
            <a href="../Apps/formulaire_admin.php" 
                class="bg-purple-800 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition flex items-center">
                  <i class="fas fa-plus mr-2"></i>
                     Ajouter une catégorie
            </a>
    </div>        
        <div class="grid md:grid-cols-3 gap-8">
        <!-- ---------------------------------------------------------------------------- --> 
<?php foreach($categories as $categorie):?>
            <!-- Frontend Category -->
            <a href="../Apps/cours_etudiant.php?categorie_id=<?=htmlspecialchars($categorie->getcategorieId())?>" class="group">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:scale-105">
                    <div class="h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                        <img src="<?=htmlspecialchars($categorie->getimage())?>" alt="">
                    </div>
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2"><?=htmlspecialchars($categorie->getnom())?></h2>
                        <p class="text-gray-600"><?=htmlspecialchars($categorie->getdescription())?></p>

                        <form method="POST" action="" style="margin-top: 20px;" class="flex space-x-2 ">
                    <input type="hidden" name="categorie_id" value="<?php echo htmlspecialchars($categorie->getcategorieId()) ?>">
                <a href="../Apps/modifier_categorie.php?categorie_id=<?=  htmlspecialchars($categorie->getcategorieId()) ?>" name="modifier" value="modifier" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Modifier
                </a>
                <button name="supprimer" value="supprimer" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i>
                    Supprimer
                </button>
                </form>

                    </div>
                </div>
            </a>
            <?php endforeach;?>

<!-- ---------------------------------------------------------------------------- -->
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-auto">
        <div class="container mx-auto px-6 py-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-xl font-bold mb-4">EduLearn</h4>
                    <p class="text-gray-400">Plateforme d'apprentissage en ligne pour tous</p>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Liens rapides</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Accueil</a></li>
                        <li><a href="#" class="hover:text-white">Cours</a></li>
                        <li><a href="#" class="hover:text-white">À propos</a></li>
                        <li><a href="#" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><i class="fas fa-envelope mr-2"></i>contact@edulearn.com</li>
                        <li><i class="fas fa-phone mr-2"></i>+33 1 23 45 67 89</li>
                        <li><i class="fas fa-map-marker-alt mr-2"></i>Paris, France</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-xl font-bold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-purple-400"><i class="fab fa-facebook text-2xl"></i></a>
                        <a href="#" class="hover:text-purple-400"><i class="fab fa-twitter text-2xl"></i></a>
                        <a href="#" class="hover:text-purple-400"><i class="fab fa-linkedin text-2xl"></i></a>
                        <a href="#" class="hover:text-purple-400"><i class="fab fa-instagram text-2xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 EduLearn. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>