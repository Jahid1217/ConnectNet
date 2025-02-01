<?php
session_start();
require_once '../model/db.php';

// ✅ Ensure customer session exists
if (!isset($_SESSION['customer_Id'])) {
    echo "<script>alert('Customer session not found. Please login again.'); window.location.href = '../view/customer.php';</script>";
    exit();
}

$db = new MyDB();

// ✅ Capture customer details
$customer_Id = $_POST['customer_Id'] ?? $_SESSION['customer_Id'];
$service_id = $_POST['service_id'] ?? null;
$order_date = $_POST['order_date'] ?? null;
$payment_method = $_POST['payment_method'] ?? null;

// ✅ Fetch customer details
$customerResult = $db->getCustomerByID($customer_Id);
if ($customerResult->num_rows > 0) {
    $customerRow = $customerResult->fetch_assoc();
    $customer_name = $customerRow['name']; // ✅ Get customer name
    $inst_address = $customerRow['inst_address']; // ✅ Get installation address
} else {
    echo "<script>alert('Customer record not found. Please login again.'); window.location.href = '../view/customer.php';</script>";
    exit();
}

// ✅ Fetch service details
$serviceDetails = $db->getServiceById($service_id)->fetch_assoc();
if (!$serviceDetails) {
    echo "<script>alert('Service record not found. Please select a valid service.'); window.location.href = '../view/customer_service.php';</script>";
    exit();
}
$service_plan = $serviceDetails['service_plan'] ?? null;
$service_type = $serviceDetails['serviceType'];
$speed = $serviceDetails['speed'];
$charge = $serviceDetails['charge'];

// ✅ Validate required fields
if (!$service_id || !$order_date || !$payment_method) {
    echo "<script>alert('All fields are required. Please fill in all details.'); window.location.href = '../view/customer_transaction.php';</script>";
    exit();
}

// ✅ Card payment details (only if required)
$card_number = $_POST['card_number'] ?? null;
$card_holder_name = $_POST['card_holder_name'] ?? null;
$exp_date = $_POST['exp_date'] ?? null;

// ✅ If "Card Payment" is selected, validate card details
if ($payment_method === "Card Payment") {
    if (empty($card_number) || empty($card_holder_name) || empty($exp_date)) {
        echo "<script>alert('Please enter all card details.'); window.location.href = '../view/customer_transaction.php';</script>";
        exit();
    }
} else {
    // ✅ If "Cash on Delivery", set card details to NULL
    $card_number = null;
    $card_holder_name = null;
    $exp_date = null;
}

// ✅ Insert order into database
$order_id = $db->insertOrder($customer_Id, $customer_name, $service_id, $order_date);
if (!$order_id) {
    echo "<script>alert('Failed to place order. Try again!'); window.location.href = '../view/customer_transaction.php';</script>";
    exit();
}

// ✅ Insert transaction (COD: NULL card details)
$insertTransaction = $db->insertTransaction($order_id, $service_id, $payment_method, $card_number, $card_holder_name, $exp_date);
if (!$insertTransaction) {
    echo "<script>alert('Transaction failed. Try again!'); window.location.href = '../view/customer_transaction.php';</script>";
    exit();
}

// ✅ Construct order description
$order_description = "Speed: " . $speed . " Mbps, Charge: " . $charge . " BDT, Payment: " . $payment_method;

// ✅ Insert order details into `orderdet` table (for tracking)
$insertOrderDetails = $db->insertOrderDetails($order_id, $service_id, $customer_Id, $service_plan, $service_type, $order_description, $inst_address);

if ($insertOrderDetails) {
    echo "<script>alert('Order placed successfully!'); window.location.href = '../view/order_details.php';</script>";
} else {
    echo "<script>alert('Failed to save order details. Try again!'); window.location.href = '../view/customer_transaction.php';</script>";
}

$db->closeCon();
?>
