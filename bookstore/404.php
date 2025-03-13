<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full text-center">
        <div class="text-6xl text-blue-600 mb-4">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">404</h1>
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Page Not Found</h2>
        <p class="text-gray-500 mb-8">The page you're looking for doesn't exist or has been moved.</p>
        <div class="space-y-4">
            <a href="index.php" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                <i class="fas fa-home mr-2"></i> Go Home
            </a>
            <a href="javascript:history.back()" class="block text-blue-600 hover:text-blue-500">
                <i class="fas fa-arrow-left mr-2"></i> Go Back
            </a>
        </div>
        
        <!-- Book Suggestions -->
        <div class="mt-12">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Meanwhile, check out these books</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="book_details.php?id=1" class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                    <div class="text-2xl text-blue-600 mb-2">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900">The Great Gatsby</h4>
                    <p class="text-xs text-gray-500">F. Scott Fitzgerald</p>
                </a>
                <a href="book_details.php?id=2" class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition-shadow">
                    <div class="text-2xl text-blue-600 mb-2">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900">To Kill a Mockingbird</h4>
                    <p class="text-xs text-gray-500">Harper Lee</p>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
