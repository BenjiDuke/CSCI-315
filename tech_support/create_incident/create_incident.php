<?php include '../view/header.php'; ?>
<main>
    <h1>Create Incident</h1>
        
    <form action="." method="post" id="add_product_form">
                   
    
    <label>Customer:</label>
        <label><?php echo $customer['firstName'].' '.$customer['lastName']; ?></label>
        <br>
    
    <label>Product:</label>
        <select name="productCode" >
            <?php 
                foreach ($products as $product) : ?>
  
            <option value=<?php echo $product['productCode']; ?>>"<?php echo $product['name']; ?>"</option>
            <?php endforeach;  
            
            ?>
            
        </select>
    <br>
    <label>Title:</label>
    <input type="text" name="title" value="">
    <br>
    <label>Description:</label>
    <input type="text" name="description" value="">
        <input type="hidden" name="action"
                           value="create_incident">
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <br>
                    <input type="submit" value="Create Incident">
        </form>

</main>
<?php include '../view/footer.php'; ?>