<?php
/**
 * 07_strings.php - 文字列操作
 *
 * PHPの文字列操作に関する便利な関数を学びます。
 */

// ============================================
// 文字列の長さ
// ============================================

$text = "Hello, PHP!";
$japanese = "こんにちは";

echo "--- 文字列の長さ ---\n";

// strlen: バイト数を返す
echo "strlen('$text'): ", strlen($text), " バイト\n";
// 出力: strlen('Hello, PHP!'): 11 バイト

echo "strlen('$japanese'): ", strlen($japanese), " バイト\n";
// 出力: strlen('こんにちは'): 15 バイト（UTF-8では日本語1文字=3バイト）

// mb_strlen: 文字数を返す（マルチバイト対応）
echo "mb_strlen('$japanese'): ", mb_strlen($japanese), " 文字\n";
// 出力: mb_strlen('こんにちは'): 5 文字

// ============================================
// 大文字・小文字の変換
// ============================================

$str = "Hello World";

echo "\n--- 大文字・小文字の変換 ---\n";

echo "元の文字列: $str\n";
// 出力: 元の文字列: Hello World

echo "大文字に: ", strtoupper($str), "\n";
// 出力: 大文字に: HELLO WORLD

echo "小文字に: ", strtolower($str), "\n";
// 出力: 小文字に: hello world

echo "先頭を大文字に: ", ucfirst("hello"), "\n";
// 出力: 先頭を大文字に: Hello

echo "単語の先頭を大文字に: ", ucwords("hello world"), "\n";
// 出力: 単語の先頭を大文字に: Hello World

// ============================================
// 文字列の検索
// ============================================

$sentence = "The quick brown fox jumps over the lazy dog";

echo "\n--- 文字列の検索 ---\n";

// strpos: 文字列の位置を検索（最初に見つかった位置）
$position = strpos($sentence, "fox");
echo "'fox' の位置: $position\n";
// 出力: 'fox' の位置: 16

// 見つからない場合はfalseを返す
$not_found = strpos($sentence, "cat");
if ($not_found === false) {
    echo "'cat' は見つかりませんでした\n";
    // 出力: 'cat' は見つかりませんでした
}

// str_contains: 文字列が含まれているか（PHP 8以降）
if (str_contains($sentence, "quick")) {
    echo "'quick' が含まれています\n";
    // 出力: 'quick' が含まれています
}

// str_starts_with / str_ends_with（PHP 8以降）
if (str_starts_with($sentence, "The")) {
    echo "文字列は 'The' で始まります\n";
    // 出力: 文字列は 'The' で始まります
}

// ============================================
// 文字列の切り出し
// ============================================

$text = "Hello, World!";

echo "\n--- 文字列の切り出し ---\n";

// substr: 指定位置から切り出し
echo "substr(text, 0, 5): ", substr($text, 0, 5), "\n";
// 出力: substr(text, 0, 5): Hello

echo "substr(text, 7): ", substr($text, 7), "\n";
// 出力: substr(text, 7): World!

echo "substr(text, -6): ", substr($text, -6), "\n";
// 出力: substr(text, -6): World!（末尾から6文字）

// mb_substr: マルチバイト対応
$japanese = "こんにちは世界";
echo "mb_substr: ", mb_substr($japanese, 0, 5), "\n";
// 出力: mb_substr: こんにちは

// ============================================
// 文字列の置換
// ============================================

$text = "I like apples. Apples are delicious.";

echo "\n--- 文字列の置換 ---\n";

// str_replace: 文字列を置換
echo "str_replace: ", str_replace("apples", "oranges", $text), "\n";
// 出力: str_replace: I like oranges. Apples are delicious.

// str_ireplace: 大文字小文字を区別しない置換
echo "str_ireplace: ", str_ireplace("apples", "oranges", $text), "\n";
// 出力: str_ireplace: I like oranges. oranges are delicious.

// ============================================
// 文字列の分割と結合
// ============================================

echo "\n--- 文字列の分割と結合 ---\n";

// explode: 文字列を配列に分割
$csv = "りんご,バナナ,オレンジ";
$fruits = explode(",", $csv);
echo "explode: ";
print_r($fruits);
// 出力: explode: Array ( [0] => りんご [1] => バナナ [2] => オレンジ )

// implode: 配列を文字列に結合
$joined = implode(" / ", $fruits);
echo "implode: $joined\n";
// 出力: implode: りんご / バナナ / オレンジ

// ============================================
// 空白の除去
// ============================================

$text = "   Hello, World!   ";

echo "\n--- 空白の除去 ---\n";

echo "元の文字列: '$text'\n";
// 出力: 元の文字列: '   Hello, World!   '

echo "trim（両端）: '", trim($text), "'\n";
// 出力: trim（両端）: 'Hello, World!'

echo "ltrim（左）: '", ltrim($text), "'\n";
// 出力: ltrim（左）: 'Hello, World!   '

echo "rtrim（右）: '", rtrim($text), "'\n";
// 出力: rtrim（右）: '   Hello, World!'

// ============================================
// 文字列のフォーマット
// ============================================

echo "\n--- 文字列のフォーマット ---\n";

// sprintf: フォーマットした文字列を返す
$name = "田中";
$age = 25;

$formatted = sprintf("名前: %s, 年齢: %d歳", $name, $age);
echo $formatted, "\n";
// 出力: 名前: 田中, 年齢: 25歳

// 数値のフォーマット
$price = 1234567.891;
echo "数値フォーマット: ", number_format($price, 2), "\n";
// 出力: 数値フォーマット: 1,234,567.89

// 桁揃え
echo sprintf("右揃え: %10s\n", "test");
// 出力: 右揃え:       test

echo sprintf("左揃え: %-10send\n", "test");
// 出力: 左揃え: test      end

echo sprintf("ゼロ埋め: %05d\n", 42);
// 出力: ゼロ埋め: 00042

// ============================================
// 文字列の繰り返し
// ============================================

echo "\n--- 文字列の繰り返し ---\n";

echo str_repeat("=", 20), "\n";
// 出力: ====================

echo str_repeat("PHP ", 3), "\n";
// 出力: PHP PHP PHP
