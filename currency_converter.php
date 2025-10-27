<!DOCTYPE html>
<html>
<head>
    <title>新台幣換美元匯率計算</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .result { margin-top: 15px; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9; }
        .error { color: red; }
    </style>
</head>
<body>

    <h1>新台幣 (TWD) 換 美元 (USD) 計算機</h1>

    <?php
    // 範例匯率：1 新台幣 = 0.03269 美元
    // **注意：這是一個固定範例值，非即時匯率！**
    $exchange_rate = 0.03269; 
    $twd_amount = '';
    $usd_amount = '';
    $error_message = '';

    // 檢查表單是否已提交
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 檢查輸入的新台幣金額
        if (isset($_POST['twd_amount']) && is_numeric($_POST['twd_amount']) && $_POST['twd_amount'] >= 0) {
            $twd_amount = (float)$_POST['twd_amount'];
            
            // 執行換算： 美元金額 = 新台幣金額 * 匯率
            $usd_amount = $twd_amount * $exchange_rate;

        } else {
            $twd_amount = $_POST['twd_amount'] ?? '';
            $error_message = "請輸入有效且大於或等於零的新台幣金額。";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="twd_amount">新台幣金額 (TWD):</label>
        <input type="text" id="twd_amount" name="twd_amount" value="<?php echo htmlspecialchars($twd_amount); ?>" required>
        <button type="submit">計算</button>
    </form>

    <?php if (!empty($error_message)): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <?php if (!empty($usd_amount) || ($usd_amount === 0.0 && $_SERVER["REQUEST_METHOD"] == "POST")): ?>
        <div class="result">
            <h2>換算結果</h2>
            <p><strong>新台幣金額:</strong> TWD <?php echo number_format($twd_amount, 2); ?></p>
            <p><strong>範例匯率:</strong> 1 TWD = USD <?php echo $exchange_rate; ?></p>
            <p><strong>美元金額:</strong> <span style="font-size: 1.2em; color: blue;">USD <?php echo number_format($usd_amount, 2); ?></span></p>
        </div>
    <?php endif; ?>

    <p style="margin-top: 20px; font-size: 0.8em; color: #666;">
        *請注意：本程式使用的匯率 $0.03269$ 僅為範例，並非即時或銀行交易匯率。實際交易請以銀行當時牌告為準。
    </p>
</body>
</html>