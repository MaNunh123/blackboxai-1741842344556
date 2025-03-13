<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore - Your Online Book Shop</title>
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>📚</text></svg>">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex space-x-7">
                    <div>
                        <a href="index.php" class="flex items-center py-4">
                            <i class="fas fa-book text-2xl text-blue-600 mr-2"></i>
                            <span class="font-semibold text-gray-800 text-lg">BookStore</span>
                        </a>
                    </div>
                </div>
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="index.php" class="py-4 px-2 text-blue-600 font-semibold">Home</a>
                    <a href="books.php" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-600 transition duration-300">Books</a>
                    <a href="cart.php" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-600 transition duration-300">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="py-2 px-4 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-300">Login</a>
                        <a href="register.php" class="py-2 px-4 bg-gray-600 text-white rounded hover:bg-gray-700 transition duration-300">Register</a>
                    <?php endif; ?>
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="outline-none mobile-menu-button">
                        <i class="fas fa-bars text-gray-500 text-2xl"></i>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="hidden mobile-menu md:hidden">
                <ul class="pt-4 pb-3">
                    <li><a href="index.php" class="block px-2 py-3 text-blue-600 font-semibold">Home</a></li>
                    <li><a href="books.php" class="block px-2 py-3 text-gray-500 hover:text-blue-600 transition duration-300">Books</a></li>
                    <li><a href="cart.php" class="block px-2 py-3 text-gray-500 hover:text-blue-600 transition duration-300">Cart</a></li>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <li><a href="logout.php" class="block px-2 py-3 text-red-500 hover:text-red-600 transition duration-300">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="block px-2 py-3 text-blue-600 hover:text-blue-700 transition duration-300">Login</a></li>
                        <li><a href="register.php" class="block px-2 py-3 text-gray-600 hover:text-gray-700 transition duration-300">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content Container -->
    <div class="container mx-auto px-4 pt-20">
