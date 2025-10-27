<?php include 'db.php'; ?>

<?php
// 新增借閱紀錄
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $book_title = $_POST["book_title"];
    $borrower_name = $_POST["borrower_name"];
    $student_id = $_POST["student_id"];
    $borrow_date = $_POST["borrow_date"];
    $borrow_days = intval($_POST["borrow_days"]);
    $note = $_POST["note"];

    $sql = "INSERT INTO borrow_records 
            (book_title, borrower_name, student_id, borrow_date, borrow_days, status, note)
            VALUES (?, ?, ?, ?, ?, '借出中', ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssis", $book_title, $borrower_name, $student_id, $borrow_date, $borrow_days, $note);
    $stmt->execute();
    $stmt->close();
}

// 搜尋條件
$search = "";
if (isset($_GET["q"])) {
    $search = trim($_GET["q"]);
    $query = "SELECT * FROM borrow_records 
              WHERE book_title LIKE ? OR borrower_name LIKE ? 
              ORDER BY id DESC";
    $stmt = $conn->prepare($query);
    $searchLike = "%$search%";
    $stmt->bind_param("ss", $searchLike, $searchLike);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM borrow_records ORDER BY id DESC");
}

// 統計報表
$stats = $conn->query("
    SELECT book_title, COUNT(*) AS times 
    FROM borrow_records 
    GROUP BY book_title 
    ORDER BY times DESC 
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8">
    <title>教室書籍借閱登記表</title>
    <style>
        body {
            font-family: "微軟正黑體";
            background: #f4f4f4;
            padding: 40px;
        }

        h1,
        h2 {
            text-align: center;
        }

        form,
        table {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            width: 420px;
            margin: 20px auto;
            padding: 20px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 10px;
            padding: 10px 15px;
            background: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background: #f0f0f0;
        }

        .overdue {
            background: #ffe5e5;
            color: #d00;
            font-weight: bold;
        }

        .warn {
            background: #fff8e1;
            color: #b57f00;
        }

        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <h1>📚 教室書籍借閱登記表</h1>

    <form method="POST" action="">
        <input type="hidden" name="add" value="1">
        <label>書名：</label>
        <input type="text" name="book_title" required>

        <label>借閱者姓名：</label>
        <input type="text" name="borrower_name" required>

        <label>學號（可選）：</label>
        <input type="text" name="student_id">

        <label>借閱日期：</label>
        <input type="date" name="borrow_date" required>

        <label>借閱期限（天）：</label>
        <select name="borrow_days">
            <option value="7">7 天</option>
            <option value="14" selected>14 天</option>
            <option value="30">30 天</option>
        </select>

        <label>備註：</label>
        <textarea name="note" rows="2"></textarea>

        <button type="submit">登記借閱</button>
    </form>

    <div class="search-box">
        <form method="GET" action="">
            🔍 <input type="text" name="q" placeholder="搜尋書名或借閱者..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">搜尋</button>
        </form>
    </div>

    <h2>📖 借閱紀錄</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>書名</th>
            <th>借閱者</th>
            <th>學號</th>
            <th>借閱日期</th>
            <th>期限</th>
            <th>剩餘/逾期</th>
            <th>狀態</th>
            <th>備註</th>
            <th>操作</th>
        </tr>

        <?php
        $today = new DateTime();
        while ($row = $result->fetch_assoc()):
            $borrow_date = new DateTime($row["borrow_date"]);
            $borrow_days = intval($row["borrow_days"]);
            $due_date = clone $borrow_date;
            $due_date->modify("+{$borrow_days} days");

            $interval = $today->diff($due_date);
            $daysLeft = $interval->days;
            $isOverdue = $today > $due_date && $row["status"] == "借出中";

            // 樣式分類
            $rowClass = "";
            $remainText = "";
            if ($row["status"] == "已歸還") {
                $remainText = "已歸還";
            } elseif ($isOverdue) {
                $rowClass = "overdue";
                $remainText = "逾期 {$daysLeft} 天";
            } elseif ($daysLeft <= 3) {
                $rowClass = "warn";
                $remainText = "剩餘 {$daysLeft} 天";
            } else {
                $remainText = "剩餘 {$daysLeft} 天";
            }
            ?>
            <tr class="<?= $rowClass ?>">
                <td><?= $row["id"] ?></td>
                <td><?= htmlspecialchars($row["book_title"]) ?></td>
                <td><?= htmlspecialchars($row["borrower_name"]) ?></td>
                <td><?= htmlspecialchars($row["student_id"]) ?></td>
                <td><?= htmlspecialchars($row["borrow_date"]) ?></td>
                <td><?= $borrow_days ?> 天</td>
                <td><?= $remainText ?></td>
                <td><?= $row["status"] ?></td>
                <td><?= htmlspecialchars($row["note"]) ?></td>
                <td>
                    <?php if ($row["status"] == "借出中"): ?>
                        <form method="POST" action="return.php" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit">歸還</button>
                        </form>
                    <?php else: ?>
                        ✅
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>📊 最常被借閱的書籍（前五名）</h2>
    <table>
        <tr>
            <th>書名</th>
            <th>借閱次數</th>
        </tr>
        <?php while ($s = $stats->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($s["book_title"]) ?></td>
                <td><?= $s["times"] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>