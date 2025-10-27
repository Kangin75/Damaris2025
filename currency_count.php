<?php

// ------------------------------------------------
// 1. 核心邏輯區塊：將計算邏輯封裝成函式
// ------------------------------------------------

/**
 * 執行新台幣 (TWD) 到美元 (USD) 的換算。
 *
 * @param float $twd_amount 要換算的新台幣金額。
 * @param float $rate 新台幣兌美元的匯率 (1 TWD = $rate USD)。
 * @return float 換算後的美元金額。
 */
function convert_twd_to_usd(float $twd_amount, float $rate): float {
    return $twd_amount * $rate;
}

// ------------------------------------------------
// 2. 配置與流程控制
// ------------------------------------------------

// **優化點：將匯率定義為常數，方便未來修改**
// 注意：這仍然是靜態範例匯率，非即時。
const EXCHANGE_RATE_TWD_TO_USD = 0.03269; 

$twd_amount = null;
$usd_amount = null;
$error_message = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input_amount = $_POST['twd_amount'] ?? '';

    // 優化點：更嚴格的輸入驗證
    if (is_numeric($input_amount) && $input_amount >= 0) {
        $twd_amount = (float)$input_amount;
        
        // 使用封裝的函式進行計算
        $usd_amount = convert_twd_to_usd($twd_amount, EXCHANGE_RATE_TWD_TO_USD);

    } else if (!empty($input_amount)) {
        // 只有在輸入非空但無效時才顯示錯誤
        $error_message = "請輸入有效且大於或等於零的新台幣金額。";
    }
}

// ------------------------------------------------
// 3. 顯示區塊 (HTML/CSS)
// ------------------------------------------------
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>優化版：新台幣換美元匯率計算</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; padding: 30px; background-color: #f4f7f6; }
        .container { max-width: 500px; margin: 0 auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        form { display: flex; gap: 10px; margin-bottom: 20px; }
        input[type="text"] { padding: 10px; border: 1px solid #ccc; border-radius: 4px; flex-grow: 1; }
        button { padding: 10px 15px; background-color: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; }
        button:hover { background-color: #2980b9; }
        .result { margin-top: 15px; padding: 15px; background-color: #ecf0f1; border-left: 5px solid #2ecc71; border-radius: 4px; }
        .result p { margin: 5px 0; }
        .final-usd { font-size: 1.5em; font-weight: bold; color: #e74c3c; }
        .error { color: #c0392b; background-color: #fceae9; border: 1px solid #c0392b; padding: 10px; border-radius: 4px; }
    </style>
</head>
<body>

    <div class="container">
        <h1>新台幣 (TWD) 換 美元 (USD) 計算機</h1>
        <p>當前固定範例匯率：1 TWD = USD <?php echo EXCHANGE_RATE_TWD_TO_USD; ?></p>

        <?php if ($error_message): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input 
                type="text" 
                id="twd_amount" 
                name="twd_amount" 
                placeholder="請輸入新台幣金額"
                value="<?php echo $twd_amount !== null ? htmlspecialchars($twd_amount) : ''; ?>" 
                required
            >
            <button type="submit">計算換算</button>
        </form>

        <?php if ($usd_amount !== null): ?>
            <div class="result">
                <h3>換算結果</h3>
                <p>輸入金額： TWD <?php echo number_format($twd_amount, 2); ?></p>
                <p>換算金額： <span class="final-usd">USD <?php echo number_format($usd_amount, 2); ?></span></p>
            </div>
        <?php endif; ?>

        <p style="margin-top: 25px; font-size: 0.7em; color: #7f8c8d;">
            *注意：本計算機使用靜態範例匯率。實際交易請以銀行當時牌告為準。
        </p>
    </div>

</body>
</html>