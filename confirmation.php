<?php
// 1. Session initialization at the absolute top
session_start();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --cyber-bg-top: #0b0f19;
            --cyber-bg-bottom: #1e1b4b;
            --neon-purple: #7c3aed;
            --neon-cyan: #06b6d4;
            --text-light: #f8fafc;
        }

        /* Continuous gradient flow across the entire viewport execution plane */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(180deg, var(--cyber-bg-top) 0%, var(--cyber-bg-bottom) 50%, #0f172a 100%);
            color: var(--text-light);
            min-height: 100vh;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        /* Long Rectangle layout integrated with glass-morphism and cyber metrics */
        .auth-bar-layout {
            width: 100%;
            max-width: 750px;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-left: 5px solid var(--neon-cyan);
            border-radius: 14px;
            padding: 50px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            text-align: center;
        }
        
        .auth-bar-layout:hover {
            border-color: rgba(6, 182, 212, 0.3);
            box-shadow: 0 20px 40px rgba(6, 182, 212, 0.15);
        }

        .luminous-icon {
            font-size: 4.5rem;
            color: var(--neon-cyan);
            text-shadow: 0 0 25px rgba(6, 182, 212, 0.6);
            display: inline-block;
        }

        /* Inner detail display box */
        .metrics-panel {
            background-color: rgba(11, 15, 25, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
        }

        .metric-row {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 12px 0;
        }

        .metric-row:last-child {
            border-bottom: none;
        }

        /* Luminous actions designed explicitly for AuraTech */
        .btn-auratech-submit {
            background: linear-gradient(90deg, var(--neon-cyan), #0891b2);
            color: #0b0f19 !important;
            font-weight: 700;
            border: none;
            border-radius: 30px;
            padding: 14px 35px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.4);
            text-decoration: none;
            display: inline-block;
        }

        .btn-auratech-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 35px rgba(6, 182, 212, 0.8);
        }
    </style>
</head>
<body>

    <div class="auth-bar-layout">
        <!-- Replaced classic emoji with a crisp, matching system icon -->
        <div class="mb-4">
            <i class="bi bi-check-circle-fill luminous-icon"></i>
        </div>
        
        <h1 class="fw-bold mb-3" style="background: linear-gradient(90deg, #ffffff, var(--neon-cyan)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Successfull!
        </h1>
        
        <p class="fs-5 text-light opacity-75 mb-4 mx-auto" style="max-width: 600px;">
     
        </p>
        
        <!-- Cybernetic order breakdown metrics panel -->
        <div class="metrics-panel p-4 my-4 text-start">
            <div class="row metric-row align-items-center">
                <div class="col-sm-4 text-light opacity-50 fw-medium">Invoice Order ID</div>
                <div class="col-sm-8 text-white fw-bold">#AUT-000<?php echo $order['id']; ?></div>
            </div>
            <div class="row metric-row align-items-center">
                <div class="col-sm-4 text-light opacity-50 fw-medium">Customer Name</div>
                <div class="col-sm-8 text-white"><?php echo htmlspecialchars($order['customer_name']); ?></div>
            </div>
            <div class="row metric-row align-items-center">
                <div class="col-sm-4 text-light opacity-50 fw-medium">Payment Gateway</div>
                <div class="col-sm-8" style="color: var(--neon-cyan); font-weight: 500;">
                    <i class="bi bi-shield-check me-1"></i> <?php echo htmlspecialchars($order['payment_method']); ?> (Authorized)
                </div>
            </div>
            <div class="row metric-row align-items-center">
                <div class="col-sm-4 text-light opacity-50 fw-medium">Settled Amount</div>
                <div class="col-sm-8 fs-4 fw-bold" style="color: var(--neon-cyan); text-shadow: 0 0 10px rgba(6, 182, 212, 0.3);">
                    $<?php echo number_format($order['total_amount'], 2); ?>
                </div>
            </div>
        </div>

        <p class="text-light opacity-50 small mb-5">
            Our logistics deployment unit will contact you on <strong class="text-white"><?php echo htmlspecialchars($order['customer_phone']); ?></strong> for shipping delivery handshake execution.
        </p>
        
        <a href="index.php" class="btn-auratech-submit px-5 py-3 fs-6">
         Return
        </a>
    </div>

</body>
</html>