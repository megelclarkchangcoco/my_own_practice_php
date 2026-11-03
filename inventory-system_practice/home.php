<?php 

include "classes/products.php";

if(isset($_POST['save'])){

    $product_id = $_POST["product_id"];
    $product_name = $_POST["product_name"];
    $product_quantity = $_POST["quantity"];
    $product_price = $_POST["price"];

    $inputProduct = new products();

    $inputProduct->addProduct($product_id, $product_name, $product_quantity, $product_price);
    echo "<h1> Successfully Added </h1>";
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $product = new products();
    $product->deleteProduct($id);
}

$editProduct = null;

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $product = new products();
    $editProduct = $product->getSingleProduct($id);
}

if(isset($_POST['update']))
{
    $id = $_POST['id'];

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_quantity = $_POST['quantity'];
    $product_price = $_POST['price'];

    $product = new products();

    $product->updateProduct(
        $id,
        $product_id,
        $product_name,
        $product_quantity,
        $product_price
    );

    echo "<h1>Successfully Updated</h1>";
}

$productDisplay = new products();
$products = $productDisplay->getProducts();

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   <h2>Add Product</h2>
    <form action="" method="POST">

        <input
            type="hidden"
            name="id"
            value="<?php echo $editProduct['id'] ?? ''; ?>">

        <input
            type="text"
            name="product_id"
            placeholder="PRODUCT ID"
            value="<?php echo $editProduct['product_id'] ?? ''; ?>"
            required>

        <input
            type="text"
            name="product_name"
            placeholder="PRODUCT NAME"
            value="<?php echo $editProduct['product_name'] ?? ''; ?>"
            required>

        <input
            type="number"
            name="quantity"
            placeholder="Quantity"
            value="<?php echo $editProduct['quantity'] ?? ''; ?>"
            required>

        <input
            type="number"
            step="0.01"
            name="price"
            placeholder="Price"
            value="<?php echo $editProduct['price'] ?? ''; ?>"
            required>

        <?php if(isset($_GET['edit'])): ?>

            <button
                type="submit"
                name="update">
                Update
            </button>

        <?php else: ?>

            <button
                type="submit"
                name="save">
                Save
            </button>

        <?php endif; ?>

    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php foreach($products as $row): ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['product_id']?></td>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo $row['quantity']?></td>
                <td><?php echo $row['price']?></td>
                <td>
                    <a href="?edit=<?php echo $row['id']; ?>">
                        Edit
                    </a>
                    <a href="?delete=<?php echo $row['id']; ?>">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>