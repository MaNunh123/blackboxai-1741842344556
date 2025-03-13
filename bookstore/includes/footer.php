</div> <!-- End of Main Content Container -->
    
    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-16">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About Section -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">About BookStore</h3>
                    <p class="text-gray-600 text-sm">Your one-stop destination for all types of books. Discover millions of eBooks, textbooks, and audiobooks.</p>
                </div>
                
                <!-- Quick Links -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Links</h3>
                    <ul class="text-gray-600 text-sm">
                        <li class="mb-2"><a href="about.php" class="hover:text-blue-600 transition duration-300">About Us</a></li>
                        <li class="mb-2"><a href="contact.php" class="hover:text-blue-600 transition duration-300">Contact Us</a></li>
                        <li class="mb-2"><a href="privacy.php" class="hover:text-blue-600 transition duration-300">Privacy Policy</a></li>
                        <li class="mb-2"><a href="terms.php" class="hover:text-blue-600 transition duration-300">Terms & Conditions</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Info</h3>
                    <ul class="text-gray-600 text-sm">
                        <li class="mb-2"><i class="fas fa-phone mr-2"></i> +1 234 567 8900</li>
                        <li class="mb-2"><i class="fas fa-envelope mr-2"></i> info@bookstore.com</li>
                        <li class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i> 123 Book Street, Library City</li>
                    </ul>
                </div>
                
                <!-- Social Media -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-400 transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-pink-600 transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-blue-800 transition duration-300">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-200 mt-8 pt-8 text-center">
                <p class="text-sm text-gray-600">
                    &copy; <?php echo date('Y'); ?> BookStore. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
