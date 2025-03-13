<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

// Fetch featured books (placeholder data for now)
$featured_books = [
    [
        'id' => 1,
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'price' => 19.99,
        'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
    ],
    [
        'id' => 2,
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'price' => 15.99,
        'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
    ],
    [
        'id' => 3,
        'title' => '1984',
        'author' => 'George Orwell',
        'price' => 12.99,
        'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
    ],
    [
        'id' => 4,
        'title' => 'Pride and Prejudice',
        'author' => 'Jane Austen',
        'price' => 9.99,
        'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
    ]
];
?>

<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Welcome to</span>
                        <span class="block text-blue-600 xl:inline">BookStore</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Discover millions of eBooks, textbooks, and audiobooks. Your next adventure begins here.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <!-- Search Bar -->
                        <div class="mt-3 sm:mt-0 sm:ml-3 w-full max-w-xl">
                            <form action="search.php" method="GET" class="flex">
                                <input type="text" name="q" placeholder="Search for books..." class="w-full px-4 py-3 rounded-l-lg border border-gray-300 focus:outline-none focus:border-blue-500">
                                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 transition duration-300">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Library">
    </div>
</div>

<!-- Featured Books Section -->
<div class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Featured Books
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Check out our latest collection of bestselling books
            </p>
        </div>

        <!-- Books Grid -->
        <div class="mt-12 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($featured_books as $book): ?>
            <div class="group relative bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                <div class="w-full min-h-80 aspect-w-1 aspect-h-1 rounded-t-lg overflow-hidden group-hover:opacity-75">
                    <img src="<?php echo htmlspecialchars($book['image']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" class="w-full h-full object-center object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-medium text-gray-900">
                        <a href="book_details.php?id=<?php echo $book['id']; ?>">
                            <?php echo htmlspecialchars($book['title']); ?>
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500"><?php echo htmlspecialchars($book['author']); ?></p>
                    <div class="mt-3 flex items-center justify-between">
                        <p class="text-lg font-semibold text-gray-900">$<?php echo number_format($book['price'], 2); ?></p>
                        <a href="cart.php?action=add&id=<?php echo $book['id']; ?>" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Browse by Category
            </h2>
        </div>
        <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4">
            <?php
            $categories = ['Fiction', 'Non-Fiction', 'Science', 'History', 'Biography', 'Technology', 'Art', 'Children'];
            foreach ($categories as $category):
            ?>
            <a href="category.php?name=<?php echo urlencode($category); ?>" 
               class="flex flex-col items-center p-6 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-300">
                <i class="fas fa-book-open text-3xl text-blue-600 mb-3"></i>
                <h3 class="text-lg font-medium text-gray-900"><?php echo htmlspecialchars($category); ?></h3>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-blue-600 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                Subscribe to Our Newsletter
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-blue-100">
                Get updates about new books and special offers
            </p>
            <form class="mt-8 sm:flex justify-center">
                <input type="email" placeholder="Enter your email" class="w-full sm:max-w-md px-5 py-3 rounded-l-lg focus:outline-none">
                <button type="submit" class="mt-3 sm:mt-0 w-full sm:w-auto px-6 py-3 bg-white text-blue-600 font-medium rounded-r-lg hover:bg-gray-100 transition duration-300">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
