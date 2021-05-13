<?php include '../view/header.php'; ?>
<main>
    <h1>Customer Search</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="customer_search">

        <label>Last Name:</label>
        <input type="text" name="lastName" />
        
        <label>&nbsp;</label>
        <input type="submit" value="Select" />
        <br>
    </form>
    
    <h1>Results</h1>    
    <section>
        <!-- display a table of customers-->
        <table>
            <tr>
                <th class="left">Name</th>
                <th class="left">Email Address</th>
                <th class="right">City</th>                
                <th>&nbsp;</th>
            </tr>
            <?php if((isset($customers)))
            {
                foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'].' '.$customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td class="right"><?php echo $customer['city']; ?></td>                
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="select_customer">
                    <input type="hidden" name="customerID"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; 
            }?>
            
            
        </table>
             
    </section>
</main>
<?php include '../view/footer.php'; ?>