<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        echo "No data received.";
        exit;
    }

    $products = $data['products'];
    $grandTotal = $data['grandTotal'];
    $customer = $data['customer'];

    // Clean and create folder
    $safeCustomerName = preg_replace("/[^a-zA-Z0-9]/", "_", strtolower($customer['name']));
    $folder = "invoices/" . $safeCustomerName;
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Generate Invoice Number
    $invoiceNumber = strtoupper(uniqid("INV_"));
    $filename = "$folder/invoice_$invoiceNumber.txt";

    // Build invoice content
    $content = "INVOICE #: $invoiceNumber\n";
    $content .= "Date: " . date("Y-m-d H:i:s") . "\n";
    $content .= "Customer Name: " . $customer['name'] . "\n";
    $content .= "Mobile: " . $customer['mobile'] . "\n";
    $content .= "Address: " . $customer['address'] . "\n";
    $content .= "-----------------------------------\n";

    foreach ($products as $index => $item) {
        $content .= ($index + 1) . ". " . $item['name'] .
                    " | Price: $" . $item['price'] .
                    " | Qty: " . $item['qty'] .
                    " | Total: $" . $item['total'] . "\n";
    }

    $content .= "-----------------------------------\n";
    $content .= "Grand Total: $" . $grandTotal . "\n";

    // Save the invoice to a text file
    file_put_contents($filename, $content);

    // Send back the invoice number and success message to the frontend
    echo json_encode([
        "message" => "✅ Invoice saved: $invoiceNumber",
        "invoiceNumber" => $invoiceNumber
    ]);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    #invoice { background-color: #fff; }
    @media print {
      form, .btn { display: none !important; }
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <h2 class="text-center mb-4">Invoice</h2>

    <!-- Customer Info -->
    <form id="productForm" class="mb-4">
      <div class="row g-2 mb-3">
        <div class="col-md-4">
          <input type="text" class="form-control" id="custName" placeholder="Customer Name" required>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" id="custMobile" placeholder="Mobile Number" required>
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control" id="custAddress" placeholder="Address" required>
        </div>
      </div>
      <div class="row g-2">
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Product Name" name="name" required>
        </div>
        <div class="col-md-3">
          <input type="number" class="form-control" placeholder="Price" name="price" required>
        </div>
        <div class="col-md-3">
          <input type="number" class="form-control" placeholder="Quantity" name="qty" required>
        </div>
        <div class="col-md-2">
          <button type="submit" class="btn btn-success w-100">Add</button>
        </div>
      </div>
    </form>

    <!-- Invoice Output -->
    <div id="invoice" class="border p-4 bg-white shadow-sm">
      <div class="mb-4">
        <h5>Invoice Details</h5>
        <p><strong>Customer Name:</strong> <span id="printCustName">-</span></p>
        <p><strong>Mobile:</strong> <span id="printCustMobile">-</span></p>
        <p><strong>Address:</strong> <span id="printCustAddress">-</span></p>
        <p><strong>Invoice No:</strong> <span id="printInvoiceNumber">-</span></p>
      </div>
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="invoiceBody"></tbody>
      </table>
      <div class="text-end">
        <h5>Grand Total: $<span id="grandTotal">0.00</span></h5>
      </div>
      <div class="text-center mt-4">
        <button onclick="window.print()" class="btn btn-primary">Print Invoice</button>
        <button class="btn btn-secondary mt-2" onclick="clearInvoice()">Clear Invoice</button>
      </div>
    </div>
  </div>

<script>
  let invoiceBody = document.getElementById("invoiceBody");
  let grandTotalEl = document.getElementById("grandTotal");
  let productForm = document.getElementById("productForm");
  let invoiceData = [];
  let grandTotal = 0;

  window.onload = function () {
    const saved = localStorage.getItem("invoiceData");
    if (saved) {
      invoiceData = JSON.parse(saved);
      renderTable();
    }
  };

  productForm.addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(productForm);
    const name = formData.get("name");
    const price = parseFloat(formData.get("price"));
    const qty = parseInt(formData.get("qty"));
    const total = price * qty;

    invoiceData.push({ name, price, qty, total });
    saveToLocal();
    renderTable();
    saveInvoice();
    productForm.reset();
  });

  invoiceBody.addEventListener("click", function(e) {
    if (e.target.classList.contains("delete-btn")) {
      const index = parseInt(e.target.dataset.index);
      invoiceData.splice(index, 1);
      saveToLocal();
      renderTable();
      saveInvoice();
    }
  });

  function renderTable() {
    invoiceBody.innerHTML = "";
    grandTotal = 0;

    invoiceData.forEach((item, i) => {
      const row = document.createElement("tr");
      const total = item.price * item.qty;
      grandTotal += total;

      row.innerHTML = `
        <td>${i + 1}</td>
        <td>${item.name}</td>
        <td>$${item.price.toFixed(2)}</td>
        <td>${item.qty}</td>
        <td class="row-total">${total.toFixed(2)}</td>
        <td><button class="btn btn-sm btn-danger delete-btn" data-index="${i}">Delete</button></td>
      `;
      invoiceBody.appendChild(row);
    });

    grandTotalEl.textContent = grandTotal.toFixed(2);
  }

  function saveToLocal() {
    localStorage.setItem("invoiceData", JSON.stringify(invoiceData));
  }

  function clearInvoice() {
    invoiceData = [];
    saveToLocal();
    renderTable();
    location.reload();
  }

//   function saveInvoice() {
//     const customer = {
//       name: document.getElementById("custName").value.trim(),
//       mobile: document.getElementById("custMobile").value.trim(),
//       address: document.getElementById("custAddress").value.trim()
//     };

//     document.getElementById("printCustName").textContent = customer.name;
//     document.getElementById("printCustMobile").textContent = customer.mobile;
//     document.getElementById("printCustAddress").textContent = customer.address;

//     fetch('', {
//       method: 'POST',
//       headers: { 'Content-Type': 'application/json' },
//       body: JSON.stringify({
//         products: invoiceData,
//         grandTotal: grandTotal.toFixed(2),
//         customer: customer
//       })
//     })
//     .then(response => response.text())
//     .then(data => {
//       const match = data.match(/INV[_A-Z0-9]+/i);
//       if (match) {
//         document.getElementById("printInvoiceNumber").textContent = match[0];
//       }
//       console.log(data);
//     })
//     .catch(error => console.error("Error saving invoice."));
//   }

function saveInvoice() {
    const customer = {
        name: document.getElementById("custName").value.trim(),
        mobile: document.getElementById("custMobile").value.trim(),
        address: document.getElementById("custAddress").value.trim()
    };

    document.getElementById("printCustName").textContent = customer.name;
    document.getElementById("printCustMobile").textContent = customer.mobile;
    document.getElementById("printCustAddress").textContent = customer.address;

    fetch('', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            products: invoiceData,
            grandTotal: grandTotal.toFixed(2),
            customer: customer
        })
    })
    .then(response => response.json()) // Expect JSON response from PHP
    .then(data => {
        if (data.invoiceNumber) {
            // Display the invoice number on the page
            document.getElementById("printInvoiceNumber").textContent = data.invoiceNumber;
        } else {
            console.error("Invoice number not returned.");
        }
    })
    .catch(error => console.error("Error saving invoice:", error));
}

</script>
</body>
</html>
