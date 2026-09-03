
<?php
$electronics = [
    "name" => "Wireless Bluetooth Headphones",
    "brand" => "SoundMax",
    "category" => "Electronics",
    "subcategory" => "Headphones",
    "amount" => 5999,
    "currency" => "PKR",
    "quantity" => 150,
    "status" => "available",
    "color" => "Black",
    "battery" => "30 Hours",
    "warranty" => "1 Year",
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Card</title>

    <style>
       

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            font-family: Arial, Helvetica, sans-serif;

            background:
                radial-gradient(circle at top left, #4f46e5 0%, transparent 35%),
                radial-gradient(circle at bottom right, #06b6d4 0%, transparent 35%),
                #0f172a;
        }

        .product-card {
            width: 100%;
            max-width: 420px;
            overflow: hidden;

            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 28px;

            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.35);

            transition: 0.4s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow:
                0 35px 80px rgba(0, 0, 0, 0.45);
        }

        /* Product Image Area */
        .product-image {
            height: 230px;
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    135deg,
                    #4f46e5,
                    #7c3aed,
                    #06b6d4
                );
        }

        .product-icon {
            font-size: 100px;
            filter: drop-shadow(0 15px 15px rgba(0, 0, 0, 0.3));
            transition: 0.4s ease;
        }

        .product-card:hover .product-icon {
            transform: scale(1.12) rotate(-5deg);
        }

        .badge {
            position: absolute;
            top: 18px;
            left: 18px;

            padding: 8px 14px;
            border-radius: 50px;

            color: white;
            background: rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);

            font-size: 12px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }

        .stock-badge {
            position: absolute;
            top: 18px;
            right: 18px;

            padding: 8px 13px;
            border-radius: 50px;

            color: #166534;
            background: #dcfce7;

            font-size: 12px;
            font-weight: bold;
        }

        /* Content */
        .product-content {
            padding: 28px;
        }

        .brand {
            margin-bottom: 7px;

            color: #6366f1;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .product-name {
            margin-bottom: 10px;

            color: #111827;
            font-size: 25px;
            line-height: 1.2;
        }

        .category {
            color: #64748b;
            font-size: 14px;
        }

        /* Price */
        .price-section {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 25px 0;
            padding: 18px;

            border-radius: 18px;
            background: #f8fafc;
        }

        .price-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .price {
            color: #111827;
            font-size: 28px;
            font-weight: 800;
        }

        .currency {
            color: #6366f1;
            font-size: 13px;
            font-weight: 700;
        }

        .quantity {
            text-align: right;
        }

        .quantity-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .quantity-value {
            color: #111827;
            font-size: 18px;
            font-weight: 700;
        }

        /* Details */
        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .detail-box {
            padding: 14px;

            border: 1px solid #e2e8f0;
            border-radius: 15px;

            background: #ffffff;

            transition: 0.3s ease;
        }

        .detail-box:hover {
            border-color: #818cf8;
            background: #f8faff;
            transform: translateY(-2px);
        }

        .detail-key {
            display: block;
            margin-bottom: 5px;

            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        .detail-value {
            display: block;

            color: #334155;
            font-size: 14px;
            font-weight: 600;

            word-break: break-word;
        }

        /* Button */
        .buy-button {
            width: 100%;
            margin-top: 22px;
            padding: 15px;

            border: none;
            border-radius: 15px;

            color: white;
            background: linear-gradient(
                135deg,
                #4f46e5,
                #7c3aed
            );

            font-size: 15px;
            font-weight: 700;

            cursor: pointer;

            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);

            transition: 0.3s ease;
        }

        .buy-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(79, 70, 229, 0.4);
        }
    </style>


</head>

<body>


<div class="product-card">
    <!-- Product Image -->
    <div class="product-image">

        <span class="badge">
            <?= htmlspecialchars($electronics["category"]) ?>
        </span>

        <span class="stock-badge">
            ● <?= ucfirst($electronics["status"]) ?>
        </span>

        <div class="product-icon">
            🎧
        </div>

    </div>


    <!-- Product Content -->
    <div class="product-content">

        <div class="brand">
            <?= htmlspecialchars($electronics["brand"]) ?>
        </div>

        <h1 class="product-name">
            <?= htmlspecialchars($electronics["name"]) ?>
        </h1>

        <p class="category">
            <?= htmlspecialchars($electronics["subcategory"]) ?>
        </p>


        <!-- Price -->
        <div class="price-section">

            <div>
                <div class="price-label">PRICE</div>

                <div class="price">
                    <?= number_format($electronics["amount"]) ?>
                    <span class="currency">
                        <?= htmlspecialchars($electronics["currency"]) ?>
                    </span>
                </div>
            </div>

            <div class="quantity">
                <div class="quantity-label">
                    AVAILABLE
                </div>

                <div class="quantity-value">
                    <?= number_format($electronics["quantity"]) ?> units
                </div>
            </div>

        </div>


        <!-- Dynamic Details -->
        <div class="details">

            <?php foreach ($electronics as $key => $value): ?>

                <?php
                    // Don't repeat these fields because
                    // they are already displayed above.
                    if (
                        $key === "name" ||
                        $key === "amount" ||
                        $key === "currency" ||
                        $key === "quantity"
                    ) {
                        continue;
                    }
                ?>

                <div class="detail-box">
                    <span class="detail-key">
                        <?= htmlspecialchars(ucwords(str_replace("_", " ", $key))) ?>
                    </span>

                    <span class="detail-value">
                        <?= htmlspecialchars($value) ?>
                    </span>

                </div>

            <?php endforeach; ?>

        </div>


        <!-- Button -->
        <button class="buy-button">
            🛒 Add to Cart
        </button>

    </div>

</div>



</body>
</html>