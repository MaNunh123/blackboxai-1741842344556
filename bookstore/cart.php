<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/header.php';

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Handle POST requests (Add to cart)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
    $book_id = (int)$_POST['book_id'];
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    
    // Add to cart
    if (!isset($_SESSION['cart'][$book_id])) {
        $_SESSION['cart'][$book_id] = $quantity;
    } else {
        $_SESSION['cart'][$book_id] += $quantity;
    }
}

// Handle GET requests (Remove from cart)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $book_id = (int)$_GET['id'];
    unset($_SESSION['cart'][$book_id]);
}

// Placeholder cart items (replace with database query later)
$cart_items = array();
$total = 0;

// Sample books data (replace with database query)
$books = array(
    1 => array(
        'id' => 1,
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'price' => 19.99,
        'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
    ),
    2 => array(
        'id' => 2,
        'title' => 'To Kill a Mockingbird',
        'author' => 'Harper Lee',
        'price' => 15.99,
        'image' => 'https://images.pexels.com/photos/1907785/pexels-photo-1907785.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'
    )
);

// Build cart items array
foreach ($_SESSION['cart'] as $book_id => $quantity) {
    if (isset($books[$book_id])) {
        $cart_items[] = array(
            'id' => $book_id,
            'title' => $books[$book_id]['title'],
            'author' => $books[$book_id]['author'],
            'price' => $books[$book_id]['price'],
            'quantity' => $quantity,
            'image' => $books[$book_id]['image'],
            'subtotal' => $books[$book_id]['price'] * $quantity
        );
        $total += $books[$book_id]['price'] * $quantity;
    }
}
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h1>

    <?php if (empty($cart_items)): ?>
    <!-- Empty cart message -->
    <div class="mt-8 text-center py-12 px-4 sm:px-6 lg:px-8">
        <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
        <h2 class="text-2xl font-medium text-gray-900">Your cart is empty</h2>
        <p class="mt-2 text-gray-500">Add some books to your cart and they will appear here.</p>
        <div class="mt-6">
            <a href="index.php" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                Continue Shopping
            </a>
        </div>
    </div>
    <?php else: ?>
    <!-- Cart items -->
    <div class="mt-8">
        <div class="flow-root">
            <ul role="list" class="-my-6 divide-y divide-gray-200">
                <?php foreach ($cart_items as $item): ?>
                <li class="py-6 flex">
                    <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" 
                             alt="<?php echo htmlspecialchars($item['title']); ?>" 
                             class="w-full h-full object-center object-cover">
                    </div>

                    <div class="ml-4 flex-1 flex flex-col">
                        <div>
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <h3>
                                    <a href="book_details.php?id=<?php echo $item['id']; ?>">
                                        <?php echo htmlspecialchars($item['title']); ?>
                                    </a>
                                </h3>
                                <p class="ml-4">$<?php echo number_format($item['subtotal'], 2); ?></p>
                            </div>
                            <p class="mt-1 text-sm text-gray-500"><?php echo htmlspecialchars($item['author']); ?></p>
                        </div>
                        <div class="flex-1 flex items-end justify-between text-sm">
                            <div class="flex items-center">
                                <label for="quantity-<?php echo $item['id']; ?>" class="mr-2 text-gray-500">Qty</label>
                                <select id="quantity-<?php echo $item['id']; ?>" 
                                        name="quantity" 
                                        class="rounded-md border border-gray-300 text-base"
                                        onchange="updateQuantity(<?php echo $item['id']; ?>, this.value)">
                                    <?php for($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?php echo $i; ?>" <?php echo ($i == $item['quantity']) ? 'selected' : ''; ?>>
                                            <?php echo $i; ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="flex">
                                <a href="cart.php?action=remove&id=<?php echo $item['id']; ?>" 
                                   class="font-medium text-red-600 hover:text-red-500">Remove</a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Cart summary -->
    <div class="mt-8 border-t border-gray-200 pt-8">
        <div class="flex justify-between text-base font-medium text-gray-900">
            <p>Subtotal</p>
            <p>$<?php echo number_format($total, 2); ?></p>
        </div>
        <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
        <div class="mt-6">
            <a href="checkout.php" 
               class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700">
                Checkout
            </a>
        </div>
        <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
            <p>
                or <a href="index.php" class="text-blue-600 font-medium hover:text-blue-500">Continue Shopping<span aria-hidden="true"> &rarr;</span></a>
            </p>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- JavaScript for quantity updates -->
<script>
function updateQuantity(bookId, quantity) {
    // In a real application, you would make an AJAX call to update the quantity
    // For now, we'll just reload the page
    window.location.href = `cart.php?action=update&id=${bookId}&quantity=${quantity}`;
}
</script>

<?php require_once 'includes/footer.php'; ?>
