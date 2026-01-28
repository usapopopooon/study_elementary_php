<?php
/**
 * 08_associative_arrays.php - 連想配列
 *
 * キーと値のペアで管理する連想配列を学びます。
 */

// ============================================
// 連想配列の基本
// ============================================
// 連想配列は数値の代わりに文字列のキーを使います

$person = [
    "name" => "田中太郎",
    "age" => 30,
    "city" => "東京"
];

echo "--- 連想配列の基本 ---\n";
print_r($person);
// 出力:
// Array
// (
//     [name] => 田中太郎
//     [age] => 30
//     [city] => 東京
// )

// ============================================
// 要素へのアクセス
// ============================================

echo "\n--- 要素へのアクセス ---\n";

echo "名前: ", $person["name"], "\n";
// 出力: 名前: 田中太郎

echo "年齢: ", $person["age"], "\n";
// 出力: 年齢: 30

echo "都市: ", $person["city"], "\n";
// 出力: 都市: 東京

// ============================================
// 要素の追加・変更・削除
// ============================================

echo "\n--- 要素の追加・変更・削除 ---\n";

// 追加
$person["email"] = "tanaka@example.com";
echo "追加後: ";
print_r($person);
// 出力: 追加後: Array ( [name] => 田中太郎 [age] => 30 [city] => 東京 [email] => tanaka@example.com )

// 変更
$person["age"] = 31;
echo "変更後（年齢）: ", $person["age"], "\n";
// 出力: 変更後（年齢）: 31

// 削除
unset($person["email"]);
echo "削除後: ";
print_r($person);
// 出力: 削除後: Array ( [name] => 田中太郎 [age] => 31 [city] => 東京 )

// ============================================
// キーと値の確認
// ============================================

echo "\n--- キーと値の確認 ---\n";

// array_key_exists: キーが存在するか
if (array_key_exists("name", $person)) {
    echo "'name' キーは存在します\n";
    // 出力: 'name' キーは存在します
}

// isset: キーが存在し、値がNULLでないか
if (isset($person["age"])) {
    echo "'age' の値が設定されています\n";
    // 出力: 'age' の値が設定されています
}

// array_keys: すべてのキーを取得
echo "キー一覧: ";
print_r(array_keys($person));
// 出力: キー一覧: Array ( [0] => name [1] => age [2] => city )

// array_values: すべての値を取得
echo "値一覧: ";
print_r(array_values($person));
// 出力: 値一覧: Array ( [0] => 田中太郎 [1] => 31 [2] => 東京 )

// ============================================
// 連想配列のループ
// ============================================

echo "\n--- 連想配列のループ ---\n";

$scores = [
    "数学" => 85,
    "英語" => 90,
    "国語" => 78,
    "理科" => 92
];

foreach ($scores as $subject => $score) {
    echo "{$subject}: {$score}点\n";
}
// 出力:
// 数学: 85点
// 英語: 90点
// 国語: 78点
// 理科: 92点

// ============================================
// 多次元連想配列
// ============================================

echo "\n--- 多次元連想配列 ---\n";

$students = [
    [
        "name" => "田中",
        "age" => 20,
        "scores" => ["数学" => 85, "英語" => 90]
    ],
    [
        "name" => "山田",
        "age" => 21,
        "scores" => ["数学" => 78, "英語" => 85]
    ],
    [
        "name" => "佐藤",
        "age" => 19,
        "scores" => ["数学" => 92, "英語" => 88]
    ]
];

// アクセス方法
echo "田中さんの数学: ", $students[0]["scores"]["数学"], "点\n";
// 出力: 田中さんの数学: 85点

// ループで処理
echo "\n学生一覧:\n";
foreach ($students as $student) {
    echo "- {$student['name']}さん（{$student['age']}歳）\n";
    echo "  数学: {$student['scores']['数学']}点, ";
    echo "英語: {$student['scores']['英語']}点\n";
}
// 出力:
// 学生一覧:
// - 田中さん（20歳）
//   数学: 85点, 英語: 90点
// - 山田さん（21歳）
//   数学: 78点, 英語: 85点
// - 佐藤さん（19歳）
//   数学: 92点, 英語: 88点

// ============================================
// 連想配列の便利な関数
// ============================================

echo "\n--- 連想配列の便利な関数 ---\n";

$data = [
    "apple" => 100,
    "banana" => 80,
    "orange" => 120
];

// array_merge: 配列を結合
$extra = ["grape" => 200, "melon" => 500];
$merged = array_merge($data, $extra);
echo "結合: ";
print_r($merged);
// 出力: 結合: Array ( [apple] => 100 [banana] => 80 [orange] => 120 [grape] => 200 [melon] => 500 )

// array_flip: キーと値を入れ替え
$flipped = array_flip($data);
echo "キーと値を入れ替え: ";
print_r($flipped);
// 出力: キーと値を入れ替え: Array ( [100] => apple [80] => banana [120] => orange )

// array_combine: 2つの配列からキーと値を作成
$keys = ["a", "b", "c"];
$values = [1, 2, 3];
$combined = array_combine($keys, $values);
echo "結合して作成: ";
print_r($combined);
// 出力: 結合して作成: Array ( [a] => 1 [b] => 2 [c] => 3 )

// ============================================
// ソート
// ============================================

echo "\n--- 連想配列のソート ---\n";

$prices = [
    "apple" => 150,
    "banana" => 80,
    "orange" => 120
];

// asort: 値でソート（キーを維持）
asort($prices);
echo "値で昇順ソート: ";
print_r($prices);
// 出力: 値で昇順ソート: Array ( [banana] => 80 [orange] => 120 [apple] => 150 )

// ksort: キーでソート
ksort($prices);
echo "キーでソート: ";
print_r($prices);
// 出力: キーでソート: Array ( [apple] => 150 [banana] => 80 [orange] => 120 )

// arsort: 値で降順ソート
arsort($prices);
echo "値で降順ソート: ";
print_r($prices);
// 出力: 値で降順ソート: Array ( [apple] => 150 [orange] => 120 [banana] => 80 )
