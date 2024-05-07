<?php include('header.php'); ?>

        <div id="content">
            <div id="navbar">
                <h2>Add New Product</h2>
             
            </div>

            <form id="new-product-form" enctype="multipart/form-data" method="POST" action="create_product.php">
                <div class="form-group">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="product-description">Description:</label>
                    <input type="text" id="product-desc" name="description" required>
                </div>
                <div class="form-group">
                    <label for="product-price">Price:</label>
                    <input type="number" id="product-price" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="product-offer">Special Offer</label>
                    <input type="number" id="product-offer" name="offer" step="0.01" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-select" required name="category">
                        <option value="bags">Bags</option>
                        <option value="shoes">Shoes</option>
                        <option value="watches">Watches</option>
                        <option value="coats">Coats</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product-color">Color</label>
                    <input type="text" id="product-color" name="color" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Image 1</label>
                    <input type="file" id="image1" name="image1" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Image 2</label>
                    <input type="file" id="image2" name="image2" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Image 3</label>
                    <input type="file" id="image3" name="image3" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="product-image">Image 4</label>
                    <input type="file" id="image4" name="image4" accept="image/*" required>
                </div>
                <button type="submit" name="create_product">Add Product</button>
            </form>
        </div>
    </div>

</body>

</html>
