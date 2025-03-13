<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

// Get search query
$query = isset($_GET['q']) ? trim($_GET['q']) : '';

// Placeholder search results (replace with database query)
$search_results = array();
if (!empty($query)) {
    // Simulate search results
    $search_results = array(
        array(
            'id' => 1,
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'price' => 19.99,
            'description' => 'A story of decadence and excess...',
            'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        ),
        array(
            'id' => 2,
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'price' => 15.99,
            'description' => 'A classic of modern American literature...',
            'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
        )
    );
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Search Header -->
    <div class="max-w-3xl mx-auto">
        <form action="search.php" method="GET" class="mt-1 flex rounded-md shadow-sm">
            <input type="text" 
                   name="q" 
                   value="<?php echo htmlspecialchars($query); ?>" 
                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-l-md sm:text-sm border-gray-300" 
                   placeholder="Search for books by title, author, or ISBN...">
            <button type="submit" 
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-r-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-search mr-2"></i>
                Search
            </button>
        </form>
    </div>

    <!-- Search Results -->
    <div class="mt-12">
        <?php if (empty($query)): ?>
            <!-- Initial State -->
            <div class="text-center py-12">
                <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
                <h2 class="text-xl font-medium text-gray-900">Start your search</h2>
                <p class="mt-2 text-gray-500">Enter a search term to find books</p>
            </div>
        <?php elseif (empty($search_results)): ?>
            <!-- No Results -->
            <div class="text-center py-12">
                <i class="fas fa-book-open text-6xl text-gray-300 mb-4"></i>
                <h2 class="text-xl font-medium text-gray-900">No results found</h2>
                <p class="mt-2 text-gray-500">Try adjusting your search terms or browse our categories</p>
                <div class="mt-6">
                    <a href="index.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        Browse All Books
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Results Found -->
            <h2 class="text-xl font-bold text-gray-900 mb-6">
                Search Results for "<?php echo htmlspecialchars($query); ?>"
            </h2>
            <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <?php foreach ($search_results as $book): ?>
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75">
                        <img src="<?php echo htmlspecialchars($book['image']); ?>" 
                             alt="<?php echo htmlspecialchars($book['title']); ?>" 
                             class="w-full h-full object-center object-cover">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="book_details.php?id=<?php echo $book['id']; ?>">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    <?php echo htmlspecialchars($book['title']); ?>
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500"><?php echo htmlspecialchars($book['author']); ?></p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$<?php echo number_format($book['price'], 2); ?></p>
                    </div>
                    <!-- Quick Add to Cart -->
                    <div class="mt-4">
                        <a href="cart.php?action=add&id=<?php echo $book['id']; ?>" 
                           class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Filters (Optional) -->
            <div class="mt-12 grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Filter by Category
                        </h3>
                        <div class="mt-4 space-y-2">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600">
                                <span class="ml-2">Fiction</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox text-blue-600">
                                <span class="ml-2">Non-Fiction</span>
                            </label>
                            <!-- Add more categories as needed -->
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Price Range
                        </h3>
                        <div class="mt-4 space-y-2">
                            <input type="range" min="0" max="100" class="w-full">
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>$0</span>
                                <span>$100</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
