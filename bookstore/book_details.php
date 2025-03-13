<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

// Get book ID from URL
$book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Placeholder book data (replace with database query later)
$book = array(
    'id' => 1,
    'title' => 'The Great Gatsby',
    'author' => 'F. Scott Fitzgerald',
    'price' => 19.99,
    'description' => 'The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts narrator Nick Carraway\'s interactions with mysterious millionaire Jay Gatsby and Gatsby\'s obsession to reunite with his former lover, Daisy Buchanan.',
    'isbn' => '978-0743273565',
    'pages' => 180,
    'publisher' => 'Scribner',
    'year' => 1925,
    'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
);
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
        <!-- Image gallery -->
        <div class="flex flex-col">
            <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                <img src="<?php echo htmlspecialchars($book['image']); ?>" 
                     alt="<?php echo htmlspecialchars($book['title']); ?>" 
                     class="w-full h-full object-center object-cover">
            </div>
        </div>

        <!-- Book info -->
        <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900"><?php echo htmlspecialchars($book['title']); ?></h1>
            <div class="mt-3">
                <h2 class="sr-only">Book information</h2>
                <p class="text-xl text-gray-900">By <?php echo htmlspecialchars($book['author']); ?></p>
            </div>

            <!-- Price -->
            <div class="mt-6">
                <h3 class="sr-only">Price</h3>
                <p class="text-3xl text-gray-900">$<?php echo number_format($book['price'], 2); ?></p>
            </div>

            <!-- Book details -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-900">Details</h3>
                <div class="mt-4 space-y-3">
                    <p class="text-base text-gray-500">ISBN: <?php echo htmlspecialchars($book['isbn']); ?></p>
                    <p class="text-base text-gray-500">Pages: <?php echo htmlspecialchars($book['pages']); ?></p>
                    <p class="text-base text-gray-500">Publisher: <?php echo htmlspecialchars($book['publisher']); ?></p>
                    <p class="text-base text-gray-500">Year: <?php echo htmlspecialchars($book['year']); ?></p>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-900">Description</h3>
                <div class="mt-4">
                    <p class="text-base text-gray-500"><?php echo htmlspecialchars($book['description']); ?></p>
                </div>
            </div>

            <!-- Add to cart form -->
            <div class="mt-8">
                <form action="cart.php" method="POST" class="flex flex-col space-y-4">
                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                    <div class="flex items-center space-x-4">
                        <label for="quantity" class="text-base font-medium text-gray-700">Quantity</label>
                        <select name="quantity" id="quantity" class="rounded-md border-gray-300 py-2 px-4 text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <?php for($i = 1; $i <= 10; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add to Cart
                    </button>
                </form>
            </div>

            <!-- Additional features -->
            <div class="mt-8 border-t border-gray-200 pt-8">
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center">
                        <i class="fas fa-truck text-2xl text-blue-600 mb-2"></i>
                        <p class="text-sm text-gray-500">Free Shipping</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-undo text-2xl text-blue-600 mb-2"></i>
                        <p class="text-sm text-gray-500">Easy Returns</p>
                    </div>
                    <div class="text-center">
                        <i class="fas fa-lock text-2xl text-blue-600 mb-2"></i>
                        <p class="text-sm text-gray-500">Secure Payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related books section -->
    <div class="mt-16">
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">You might also like</h2>
        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <?php
            // Placeholder related books
            $related_books = array(
                array(
                    'id' => 2,
                    'title' => 'To Kill a Mockingbird',
                    'author' => 'Harper Lee',
                    'price' => 15.99,
                    'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                ),
                array(
                    'id' => 3,
                    'title' => '1984',
                    'author' => 'George Orwell',
                    'price' => 12.99,
                    'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                ),
                array(
                    'id' => 4,
                    'title' => 'Pride and Prejudice',
                    'author' => 'Jane Austen',
                    'price' => 9.99,
                    'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                ),
                array(
                    'id' => 5,
                    'title' => 'The Catcher in the Rye',
                    'author' => 'J.D. Salinger',
                    'price' => 11.99,
                    'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
                )
            );

            foreach ($related_books as $related_book):
            ?>
            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75">
                    <img src="<?php echo htmlspecialchars($related_book['image']); ?>" 
                         alt="<?php echo htmlspecialchars($related_book['title']); ?>" 
                         class="w-full h-full object-center object-cover">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="book_details.php?id=<?php echo $related_book['id']; ?>">
                                <?php echo htmlspecialchars($related_book['title']); ?>
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500"><?php echo htmlspecialchars($related_book['author']); ?></p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">$<?php echo number_format($related_book['price'], 2); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
