<?php
/**
 * 10_classes.php - クラスとオブジェクト
 *
 * オブジェクト指向プログラミングの基礎を学びます。
 */

// ============================================
// クラスの基本
// ============================================
// クラスはオブジェクトの設計図です

class Person
{
    // プロパティ（属性）
    public $name;
    public $age;

    // コンストラクタ（インスタンス生成時に呼ばれる）
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    // メソッド（機能）
    public function introduce()
    {
        echo "私は{$this->name}、{$this->age}歳です。\n";
    }

    public function birthday()
    {
        $this->age++;
        echo "{$this->name}さんは{$this->age}歳になりました！\n";
    }
}

echo "--- クラスの基本 ---\n";

// インスタンスを作成（newキーワード）
$person1 = new Person("田中太郎", 25);
$person2 = new Person("山田花子", 30);

// メソッドを呼び出す
$person1->introduce();
// 出力: 私は田中太郎、25歳です。

$person2->introduce();
// 出力: 私は山田花子、30歳です。

// プロパティにアクセス
echo "person1の名前: ", $person1->name, "\n";
// 出力: person1の名前: 田中太郎

// メソッドで状態を変更
$person1->birthday();
// 出力: 田中太郎さんは26歳になりました！

// ============================================
// アクセス修飾子
// ============================================
// public: どこからでもアクセス可能
// private: クラス内からのみアクセス可能
// protected: クラス内と子クラスからアクセス可能

class BankAccount
{
    private $balance;        // 残高（外部から直接アクセス不可）
    public $owner;           // 口座名義

    public function __construct($owner, $initial_balance = 0)
    {
        $this->owner = $owner;
        $this->balance = $initial_balance;
    }

    // 残高を取得（ゲッター）
    public function getBalance()
    {
        return $this->balance;
    }

    // 入金
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
            echo "{$amount}円を入金しました\n";
        }
    }

    // 出金
    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            echo "{$amount}円を出金しました\n";
            return true;
        }
        echo "出金できません\n";
        return false;
    }
}

echo "\n--- アクセス修飾子 ---\n";

$account = new BankAccount("田中", 10000);
echo "口座名義: ", $account->owner, "\n";
// 出力: 口座名義: 田中

echo "残高: ", $account->getBalance(), "円\n";
// 出力: 残高: 10000円

$account->deposit(5000);
// 出力: 5000円を入金しました

echo "残高: ", $account->getBalance(), "円\n";
// 出力: 残高: 15000円

$account->withdraw(3000);
// 出力: 3000円を出金しました

echo "残高: ", $account->getBalance(), "円\n";
// 出力: 残高: 12000円

// $account->balance = 1000000; // エラー: privateなのでアクセス不可

// ============================================
// 継承
// ============================================
// 既存のクラスを拡張して新しいクラスを作成

class Animal
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function speak()
    {
        echo "{$this->name}が鳴いています\n";
    }

    public function getName()
    {
        return $this->name;
    }
}

// Animalクラスを継承
class Dog extends Animal
{
    private $breed;

    public function __construct($name, $breed)
    {
        parent::__construct($name); // 親のコンストラクタを呼ぶ
        $this->breed = $breed;
    }

    // メソッドのオーバーライド（上書き）
    public function speak()
    {
        echo "{$this->name}（{$this->breed}）: ワンワン！\n";
    }

    public function fetch()
    {
        echo "{$this->name}がボールを取ってきました\n";
    }
}

class Cat extends Animal
{
    public function speak()
    {
        echo "{$this->name}: ニャーン！\n";
    }

    public function scratch()
    {
        echo "{$this->name}が爪を研いでいます\n";
    }
}

echo "\n--- 継承 ---\n";

$dog = new Dog("ポチ", "柴犬");
$cat = new Cat("タマ");

$dog->speak();
// 出力: ポチ（柴犬）: ワンワン！

$dog->fetch();
// 出力: ポチがボールを取ってきました

$cat->speak();
// 出力: タマ: ニャーン！

$cat->scratch();
// 出力: タマが爪を研いでいます

// ============================================
// 静的プロパティとメソッド
// ============================================
// インスタンスを作らずに使える

class Counter
{
    private static $count = 0;

    public static function increment()
    {
        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

echo "\n--- 静的プロパティとメソッド ---\n";

echo "カウント: ", Counter::getCount(), "\n";
// 出力: カウント: 0

Counter::increment();
Counter::increment();
Counter::increment();

echo "カウント: ", Counter::getCount(), "\n";
// 出力: カウント: 3

// ============================================
// 定数
// ============================================

class Config
{
    const VERSION = "1.0.0";
    const MAX_USERS = 100;
}

echo "\n--- クラス定数 ---\n";

echo "バージョン: ", Config::VERSION, "\n";
// 出力: バージョン: 1.0.0

echo "最大ユーザー数: ", Config::MAX_USERS, "\n";
// 出力: 最大ユーザー数: 100

// ============================================
// 実践例: 簡単な商品管理
// ============================================

class Product
{
    private $name;
    private $price;
    private $stock;

    public function __construct($name, $price, $stock = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getInfo()
    {
        return [
            "name" => $this->name,
            "price" => $this->price,
            "stock" => $this->stock
        ];
    }

    public function addStock($quantity)
    {
        $this->stock += $quantity;
    }

    public function sell($quantity)
    {
        if ($quantity <= $this->stock) {
            $this->stock -= $quantity;
            return $this->price * $quantity;
        }
        return false;
    }

    public function display()
    {
        echo "{$this->name}: {$this->price}円（在庫: {$this->stock}個）\n";
    }
}

echo "\n--- 実践例: 商品管理 ---\n";

$product1 = new Product("りんご", 150, 50);
$product2 = new Product("バナナ", 100, 30);

$product1->display();
// 出力: りんご: 150円（在庫: 50個）

$product2->display();
// 出力: バナナ: 100円（在庫: 30個）

echo "\nりんごを5個販売:\n";
$total = $product1->sell(5);
echo "売上: {$total}円\n";
// 出力: 売上: 750円

$product1->display();
// 出力: りんご: 150円（在庫: 45個）

echo "\nバナナを20個入荷:\n";
$product2->addStock(20);
$product2->display();
// 出力: バナナ: 100円（在庫: 50個）
