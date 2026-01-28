<?php
/**
 * 06_functions.php - 関数の基本
 *
 * 関数の定義、引数、戻り値について学びます。
 */

// ============================================
// 関数の基本
// ============================================
// 関数は再利用可能なコードのまとまりです
// functionキーワードで定義します

function sayHello() {
    echo "こんにちは！\n";
}

echo "--- 関数の基本 ---\n";

// 関数を呼び出す
sayHello();
// 出力: こんにちは！

sayHello(); // 何度でも呼び出せます
// 出力: こんにちは！

// ============================================
// 引数のある関数
// ============================================
// 関数に値を渡すことができます

function greet($name) {
    echo "こんにちは、{$name}さん！\n";
}

echo "\n--- 引数のある関数 ---\n";

greet("田中");
// 出力: こんにちは、田中さん！

greet("山田");
// 出力: こんにちは、山田さん！

// 複数の引数
function introduce($name, $age) {
    echo "{$name}さんは{$age}歳です\n";
}

introduce("佐藤", 25);
// 出力: 佐藤さんは25歳です

// ============================================
// デフォルト引数
// ============================================
// 引数にデフォルト値を設定できます

function greetWithDefault($name = "ゲスト") {
    echo "ようこそ、{$name}さん！\n";
}

echo "\n--- デフォルト引数 ---\n";

greetWithDefault("鈴木");
// 出力: ようこそ、鈴木さん！

greetWithDefault(); // デフォルト値が使われる
// 出力: ようこそ、ゲストさん！

// ============================================
// 戻り値のある関数
// ============================================
// returnで値を返すことができます

function add($a, $b) {
    return $a + $b;
}

function multiply($a, $b) {
    return $a * $b;
}

echo "\n--- 戻り値のある関数 ---\n";

$sum = add(5, 3);
echo "5 + 3 = $sum\n";
// 出力: 5 + 3 = 8

$product = multiply(4, 7);
echo "4 × 7 = $product\n";
// 出力: 4 × 7 = 28

// 戻り値を直接使う
echo "10 + 20 = ", add(10, 20), "\n";
// 出力: 10 + 20 = 30

// ============================================
// 複数の処理を行う関数
// ============================================

function calculateCircle($radius) {
    $area = 3.14159 * $radius * $radius;      // 面積
    $circumference = 2 * 3.14159 * $radius;    // 円周

    echo "半径 {$radius} の円:\n";
    echo "  面積: {$area}\n";
    echo "  円周: {$circumference}\n";

    return $area; // 面積を返す
}

echo "\n--- 複数の処理を行う関数 ---\n";

$area = calculateCircle(5);
// 出力:
// 半径 5 の円:
//   面積: 78.53975
//   円周: 31.4159

// ============================================
// 配列を返す関数
// ============================================

function getMinMax($numbers) {
    return [
        "min" => min($numbers),
        "max" => max($numbers)
    ];
}

echo "\n--- 配列を返す関数 ---\n";

$numbers = [5, 2, 8, 1, 9, 3];
$result = getMinMax($numbers);

echo "配列: ";
print_r($numbers);
// 出力: 配列: Array ( [0] => 5 [1] => 2 [2] => 8 [3] => 1 [4] => 9 [5] => 3 )

echo "最小値: {$result['min']}\n";
// 出力: 最小値: 1

echo "最大値: {$result['max']}\n";
// 出力: 最大値: 9

// ============================================
// 変数のスコープ
// ============================================
// 関数内の変数は関数内でのみ有効です

$globalVar = "グローバル変数";

function testScope() {
    $localVar = "ローカル変数";
    echo "関数内: $localVar\n";

    // グローバル変数を使うにはglobalキーワードが必要
    global $globalVar;
    echo "関数内からグローバル: $globalVar\n";
}

echo "\n--- 変数のスコープ ---\n";

testScope();
// 出力:
// 関数内: ローカル変数
// 関数内からグローバル: グローバル変数

echo "関数外: $globalVar\n";
// 出力: 関数外: グローバル変数

// echo $localVar; // エラー: ローカル変数は関数外では使えない

// ============================================
// 型宣言（PHP 7以降）
// ============================================
// 引数と戻り値の型を指定できます

function addNumbers(int $a, int $b): int {
    return $a + $b;
}

function formatName(string $name): string {
    return "【" . $name . "】";
}

echo "\n--- 型宣言 ---\n";

echo addNumbers(10, 20), "\n";
// 出力: 30

echo formatName("PHP"), "\n";
// 出力: 【PHP】
