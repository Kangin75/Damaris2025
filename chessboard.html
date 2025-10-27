<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 國際象棋</title>
    <style>
        /* 基礎 CSS 樣式 */
        table {
            border-collapse: collapse;
            width: 480px; /* 8 * 60px */
            height: 480px;
        }
        td {
            width: 60px;
            height: 60px;
            text-align: center;
            font-size: 40px; /* 棋子符號大小 */
            font-family: Arial, sans-serif;
            cursor: pointer;
        }
        .light {
            background-color: #f0d9b5; /* 淺色格 */
        }
        .dark {
            background-color: #b58863; /* 深色格 */
        }
      .white-piece {
            color: #FFFFFF; /* 白色棋子 (符號顏色) */
            text-shadow: 1px 1px 2px #000000;
        }
        .black-piece {
            color: #000000; /* 黑色棋子 (符號顏色) */
            text-shadow: 1px 1px 2px #FFFFFF;
        }
    </style>

    </style>
</head>
<body>
<?php

/**
 * 國際象棋棋盤的初始佈局 (使用 Unicode 符號)
 * 陣列索引對應 [行][列]，例如 $board[0][0] 是 A8
 * 8x8 棋盤，行從 0 到 7 (8 到 1)，列從 0 到 7 (A 到 H)
 * * Unicode 棋子符號:
 * 黑方: ♜ ♞ ♝ ♛ ♚ ♟ (Rook, Knight, Bishop, Queen, King, Pawn)
 * 白方: ♖ ♘ ♗ ♕ ♔ ♙ (Rook, Knight, Bishop, Queen, King, Pawn)
 */

$initial_board = [
    // 8 (第一行) - 黑色
    ['♜', '♞', '♝', '♛', '♚', '♝', '♞', '♜'],
    // 7 (第二行) - 黑色兵
    ['♟', '♟', '♟', '♟', '♟', '♟', '♟', '♟'],
    // 6, 5, 4, 3 (中間四行) - 空格
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    ['', '', '', '', '', '', '', ''],
    // 2 (第七行) - 白色兵
    ['♙', '♙', '♙', '♙', '♙', '♙', '♙', '♙'],
    // 1 (第八行) - 白色
    ['♖', '♘', '♗', '♕', '♔', '♗', '♘', '♖'],
];

// 將棋盤狀態儲存到 Session 中，以便在移動時保持狀態 (需要啟動 session_start())
// session_start();
// if (!isset($_SESSION['chess_board'])) {
//     $_SESSION['chess_board'] = $initial_board;
// }
// $board = $_SESSION['chess_board'];
$board = $initial_board; // 僅示範初始狀態

echo '<h1>PHP 國際象棋遊戲 (基礎佈局)</h1>';
echo '<p>這僅是使用 PHP 和 HTML 生成的靜態棋盤。移動邏輯和互動需要更複雜的 PHP/JavaScript 程式碼。</p>';
echo '<table>';

// 8 行 (r)
for ($r = 0; $r < 8; $r++) {
    echo '<tr>';
    // 8 列 (c)
    for ($c = 0; $c < 8; $c++) {
        // 判斷格子顏色 (r+c 是偶數為淺色，奇數為深色)
        $color_class = (($r + $c) % 2 == 0) ? 'light' : 'dark';
        
        // 判斷棋子顏色 (根據 Unicode 符號範圍)
        $piece = $board[$r][$c];
        $piece_class = '';
        
        // 檢查棋子是否為白色 (Unicode 範圍 2654-2659)
        if (mb_strlen($piece) > 0 && ord($piece) >= 9812 && ord($piece) <= 9817) {
            // 這個簡單的 ord() 檢查對於 Unicode 字符可能不準確，
            // 更好的方式是檢查符號本身:
            $white_pieces = ['♖', '♘', '♗', '♕', '♔', '♙'];
            $black_pieces = ['♜', '♞', '♝', '♛', '♚', '♟'];

            if (in_array($piece, $white_pieces)) {
                $piece_class = 'white-piece';
            } elseif (in_array($piece, $black_pieces)) {
                $piece_class = 'black-piece';
            }
        }

        // 輸出表格單元格 (<td>)
        // 加上 data-row 和 data-col 屬性以便後續 JavaScript 處理點擊事件
        echo '<td class="' . $color_class . '" data-row="' . $r . '" data-col="' . $c . '">';
        echo '<span class="' . $piece_class . '">' . $piece . '</span>';
        echo '</td>';
    }
    echo '</tr>';
}

echo '</table>';
?>    
</body>
</html>