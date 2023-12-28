<?php
include("connection.php");
include('sheader.html');
session_start();
$shopid = $_SESSION['shopid'];

// Fetch stock items for the dropdown
$sql = "SELECT * FROM stock WHERE shopid='$shopid'";
$stockResult = mysqli_query($conn, $sql);

// Check if the form is submitted to add a new row
if (isset($_POST['addRow'])) {
    $_SESSION['billing'][] = [
        'brand' => $_POST['brand'],
        'model' => $_POST['model'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity'],
    ];
}

// Check if the form is submitted to calculate the total
if (isset($_POST['calculateTotal'])) {
    // Process the quantities and calculate the total
    $total = 0;
    if (isset($_SESSION['billing']) && is_array($_SESSION['billing'])) {
        foreach ($_SESSION['billing'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }

    // Add extra payment if provided
    if (isset($_POST['extraPayment'])) {
        $total += floatval($_POST['extraPayment']);
    }

    // Redirect to the final bill page with the total amount
    header("Location: finalbill.php?total=" . $total);
    exit();
}
?>

<div class="account-in">
    <div class="container">
        <div class="caccount-top">
            <h3>Billing</h3>

            <form method="POST" action="">
                <table class="table">
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    // Display rows with dropdowns and input fields
                    foreach ($_SESSION['billing'] ?? [] as $item) {
                        echo "<tr>";
                        echo "<td>{$item['brand']}</td>";
                        echo "<td>{$item['model']}</td>";
                        echo "<td><input type='number' name='price[]' value='{$item['price']}'></td>";
                        echo "<td><input type='number' name='quantity[]' value='{$item['quantity']}'></td>";
                        echo "<td>{$item['price']} * {$item['quantity']}</td>";
                        echo "<td><button type='button' onclick='removeRow(this)'>Remove</button></td>";
                        echo "</tr>";
                    }
                    ?>

                    <tr>
                        <td>
                            <select name="brand">
                                <?php
                                while ($row = mysqli_fetch_assoc($stockResult)) {
                                    echo "<option value='{$row['brand']}'>{$row['brand']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="model">
                                <?php
                                mysqli_data_seek($stockResult, 0); // Reset the pointer
                                while ($row = mysqli_fetch_assoc($stockResult)) {
                                    echo "<option value='{$row['model']}'>{$row['model']}</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><input type="number" name="price[]" readonly></td>
                        <td><input type="number" name="quantity[]" value="1"></td>
                        <td><input type="text" name="total" readonly></td>
                        <td><button type="button" onclick="addRow()">Add Row</button></td>
                    </tr>

                    <tr>
                        <td colspan="5">Extra Payment</td>
                        <td><input type="number" name="extraPayment"></td>
                    </tr>

                    <tr>
                        <td colspan="6">
                            <button type="submit" name="calculateTotal">Go to Billing Page</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<script>
    function addRow() {
        // Clone the last row and append it to the table
        var lastRow = document.querySelector("table tr:last-child");
        var newRow = lastRow.cloneNode(true);
        document.querySelector("table").appendChild(newRow);

        // Clear values in the new row
        var inputs = newRow.querySelectorAll("input");
        inputs.forEach(function (input) {
            input.value = "";
        });

        // Set the onchange event for the brand dropdown in the new row
        var brandDropdown = newRow.querySelector("select[name='brand']");
        brandDropdown.onchange = function () {
            fetchPrice(newRow);
        };

        // Set the onchange event for the model dropdown in the new row
        var modelDropdown = newRow.querySelector("select[name='model']");
        modelDropdown.onchange = function () {
            fetchPrice(newRow);
        };

        // Set the oninput event for the price and quantity inputs in the new row
        var priceInput = newRow.querySelector("input[name='price[]']");
        var quantityInput = newRow.querySelector("input[name='quantity[]']");
        priceInput.oninput = function () {
            updateTotal(newRow);
        };
        quantityInput.oninput = function () {
            updateTotal(newRow);
        };
    }

    function removeRow(button) {
        // Remove the row when the Remove button is clicked
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function fetchPrice(row) {
        // Fetch and set the price based on the selected brand and model
        var brand = row.querySelector("select[name='brand']").value;
        var model = row.querySelector("select[name='model']").value;
        var priceInput = row.querySelector("input[name='price[]']");

        // Make an AJAX request to fetch the price from the server
        // Adjust this URL based on your actual server-side implementation
        var url = "fetch_price.php?brand=" + brand + "&model=" + model;
        fetch(url)
    .then(response => response.text())
    .then(data => {
        console.log("Fetched Data:", data);
        priceInput.value = data;
        updateTotal(row);
    })
    .catch(error => console.error('Error:', error));

    }

    function updateTotal(row) {
        // Update the total based on the price and quantity
        var price = parseFloat(row.querySelector("input[name='price[]']").value) || 0;
        var quantity = parseFloat(row.querySelector("input[name='quantity[]']").value) || 0;
        var totalInput = row.querySelector("input[name='total']");
        totalInput.value = price * quantity;
    }
</script>

<?php
include('footer.html');
?>
