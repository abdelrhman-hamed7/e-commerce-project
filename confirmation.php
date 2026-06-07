<?php
require_once "config.php";
$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// سحب بيانات الفاتورة للتأكد من وجودها
$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation | AuraTech Agency</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5 text-center" style="max-width: 600px; margin-top: 50px;">
        <div class="card p-5 shadow-sm border-0 rounded-3 bg-white">
            <div class="text-success mb-3" style="font-size: 4rem;">🎉</div>
            <h1 class="fw-bold text-dark mb-2">Order Authenticated Successfully!</h1>
            <p class="text-muted">Your enterprise computing hardware allocation request has been committed to the AuraTech repository layers.</p>
            
            <div class="bg-light p-3 rounded-3 my-4 border text-start">
                <p class="mb-1"><strong>Invoice Order ID:</strong> #AUT-000<?php echo $order['id']; ?></p>
                <p class="mb-1"><strong>Customer Node:</strong> <?php echo htmlspecialchars($order['customer_name']); ?></p>
                <p class="mb-1"><strong>Payment Gateway:</strong> <?php echo htmlspecialchars($order['payment_method']); ?> (Authorized)</p>
                <p class="mb-0"><strong>Settled Amount:</strong> <span class="text-success fw-bold">$<?php echo number_format($order['total_amount'], 2); ?></span></p>
            </div>

            <p class="small text-muted mb-4">Our logistics deployment unit will contact you on <strong><?php echo htmlspecialchars($order['customer_phone']); ?></strong> for shipping delivery handshake execution.</p>
            <a href="index.php" class="btn btn-dark px-4 py-2 rounded-pill fw-bold">Return to Authorized Mainframe</a>
        </div>
    </div>

</body>
</html>