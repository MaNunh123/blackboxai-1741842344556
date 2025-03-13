<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full text-center">
        <div class="text-6xl text-red-600 mb-4">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">500</h1>
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Server Error</h2>
        <p class="text-gray-500 mb-4">Oops! Something went wrong on our end.</p>
        <p class="text-gray-500 mb-8">Our team has been notified and is working to fix the issue.</p>
        
        <div class="space-y-4">
            <a href="index.php" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                <i class="fas fa-home mr-2"></i> Return Home
            </a>
            <a href="javascript:history.back()" class="block text-blue-600 hover:text-blue-500">
                <i class="fas fa-arrow-left mr-2"></i> Go Back
            </a>
        </div>

        <!-- Contact Support -->
        <div class="mt-12 bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Need Help?</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-center">
                    <i class="fas fa-envelope text-blue-600 mr-2"></i>
                    <a href="mailto:support@bookstore.com" class="text-blue-600 hover:text-blue-500">
                        support@bookstore.com
                    </a>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fas fa-phone text-blue-600 mr-2"></i>
                    <span class="text-gray-600">1-800-BOOKS</span>
                </div>
            </div>
        </div>

        <!-- Error Details (for development only) -->
        <?php if (isset($_ENV['ENVIRONMENT']) && $_ENV['ENVIRONMENT'] === 'development'): ?>
        <div class="mt-8 bg-red-50 p-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-code text-red-400"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Error Details</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <p><?php echo isset($error_message) ? htmlspecialchars($error_message) : 'No error details available.'; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
