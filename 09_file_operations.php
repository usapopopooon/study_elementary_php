<?php
/**
 * 09_file_operations.php - ファイル操作
 *
 * ファイルの読み書きの基本を学びます。
 */

// ============================================
// ファイルへの書き込み
// ============================================

echo "--- ファイルへの書き込み ---\n";

// file_put_contents: 簡単にファイルに書き込む
$content = "これはテストファイルです。\nPHPで作成しました。";
file_put_contents("test_output.txt", $content);
echo "test_output.txt を作成しました\n";
// 出力: test_output.txt を作成しました

// 追記モード（FILE_APPEND）
file_put_contents("test_output.txt", "\n追記された行です。", FILE_APPEND);
echo "test_output.txt に追記しました\n";
// 出力: test_output.txt に追記しました

// ============================================
// ファイルの読み込み
// ============================================

echo "\n--- ファイルの読み込み ---\n";

// file_get_contents: ファイル全体を読み込む
$read_content = file_get_contents("test_output.txt");
echo "ファイルの内容:\n";
echo $read_content, "\n";
// 出力:
// ファイルの内容:
// これはテストファイルです。
// PHPで作成しました。
// 追記された行です。

// file: ファイルを行ごとに配列として読み込む
echo "\n行ごとに読み込み:\n";
$lines = file("test_output.txt", FILE_IGNORE_NEW_LINES);
foreach ($lines as $line_number => $line) {
    echo "行 " . ($line_number + 1) . ": $line\n";
}
// 出力:
// 行ごとに読み込み:
// 行 1: これはテストファイルです。
// 行 2: PHPで作成しました。
// 行 3: 追記された行です。

// ============================================
// ファイルの存在確認
// ============================================

echo "\n--- ファイルの存在確認 ---\n";

$filename = "test_output.txt";

// file_exists: ファイルが存在するか
if (file_exists($filename)) {
    echo "$filename は存在します\n";
    // 出力: test_output.txt は存在します
}

// is_file: 通常のファイルか
if (is_file($filename)) {
    echo "$filename は通常のファイルです\n";
    // 出力: test_output.txt は通常のファイルです
}

// is_readable: 読み取り可能か
if (is_readable($filename)) {
    echo "$filename は読み取り可能です\n";
    // 出力: test_output.txt は読み取り可能です
}

// is_writable: 書き込み可能か
if (is_writable($filename)) {
    echo "$filename は書き込み可能です\n";
    // 出力: test_output.txt は書き込み可能です
}

// ============================================
// ファイル情報の取得
// ============================================

echo "\n--- ファイル情報の取得 ---\n";

// filesize: ファイルサイズ
echo "サイズ: ", filesize($filename), " バイト\n";
// 出力: サイズ: XX バイト（ファイルサイズによる）

// filemtime: 最終更新時刻
echo "最終更新: ", date("Y-m-d H:i:s", filemtime($filename)), "\n";
// 出力: 最終更新: 2024-XX-XX XX:XX:XX（実行時刻による）

// ============================================
// fopen/fclose を使った操作
// ============================================
// より細かい制御が必要な場合に使います

echo "\n--- fopen/fclose を使った操作 ---\n";

// 書き込みモードで開く
$file = fopen("fopen_test.txt", "w"); // "w" = 書き込み（上書き）
if ($file) {
    fwrite($file, "1行目\n");
    fwrite($file, "2行目\n");
    fwrite($file, "3行目\n");
    fclose($file);
    echo "fopen_test.txt を作成しました\n";
    // 出力: fopen_test.txt を作成しました
}

// 読み込みモードで開く
$file = fopen("fopen_test.txt", "r"); // "r" = 読み込み
if ($file) {
    echo "1行ずつ読み込み:\n";
    while (($line = fgets($file)) !== false) {
        echo "  " . trim($line) . "\n";
    }
    fclose($file);
}
// 出力:
// 1行ずつ読み込み:
//   1行目
//   2行目
//   3行目

// ============================================
// ファイルモードの説明
// ============================================
echo "\n--- ファイルモード一覧 ---\n";
echo "r  : 読み込み専用\n";
echo "w  : 書き込み専用（上書き）\n";
echo "a  : 追記専用\n";
echo "r+ : 読み書き両方\n";
echo "w+ : 読み書き両方（上書き）\n";
echo "a+ : 読み書き両方（追記）\n";

// ============================================
// CSVファイルの操作
// ============================================

echo "\n--- CSVファイルの操作 ---\n";

// CSVファイルを作成
$csv_data = [
    ["名前", "年齢", "都市"],
    ["田中", "25", "東京"],
    ["山田", "30", "大阪"],
    ["佐藤", "22", "名古屋"]
];

$csv_file = fopen("test_data.csv", "w");
foreach ($csv_data as $row) {
    fputcsv($csv_file, $row);
}
fclose($csv_file);
echo "test_data.csv を作成しました\n";
// 出力: test_data.csv を作成しました

// CSVファイルを読み込む
echo "\nCSVファイルの内容:\n";
$csv_file = fopen("test_data.csv", "r");
while (($row = fgetcsv($csv_file)) !== false) {
    echo implode(" | ", $row) . "\n";
}
fclose($csv_file);
// 出力:
// CSVファイルの内容:
// 名前 | 年齢 | 都市
// 田中 | 25 | 東京
// 山田 | 30 | 大阪
// 佐藤 | 22 | 名古屋

// ============================================
// ファイルの削除
// ============================================

echo "\n--- ファイルの削除 ---\n";

// unlink: ファイルを削除
if (file_exists("test_output.txt")) {
    unlink("test_output.txt");
    echo "test_output.txt を削除しました\n";
    // 出力: test_output.txt を削除しました
}

if (file_exists("fopen_test.txt")) {
    unlink("fopen_test.txt");
    echo "fopen_test.txt を削除しました\n";
    // 出力: fopen_test.txt を削除しました
}

if (file_exists("test_data.csv")) {
    unlink("test_data.csv");
    echo "test_data.csv を削除しました\n";
    // 出力: test_data.csv を削除しました
}

echo "\n学習用ファイルをすべてクリーンアップしました\n";
// 出力: 学習用ファイルをすべてクリーンアップしました
