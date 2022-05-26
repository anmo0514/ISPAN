<?php
header('Content-Type: text/plain'); // 設定檔頭, 告訴用戶端內容為純文字


class Person
{

    // 屬性宣告
    static private $count = 0; // 靜態屬性

    var $name;
    public $mobile;
    private $sno = 'secret';

    // 建構函式定義
    function __construct($name = '', $mobile = '')
    {
        Person::$count++;
        $this->name = $name;
        $this->mobile = $mobile;
    }
    // 方法定義
    static function count()
    {
        return Person::$count;
    }
}

$p1 = new Person;
$p1->name = 'Carl';
$p1->mobile = '0918-123-456';
echo "{$p1->name} \n";
// echo "{$p1->sno} \n"; 會發生錯誤

$p2 = new Person('John', '0935111222');
var_dump($p2);

$p3 = new Person();
echo "共有 " . Person::count() . " 人\n"; // 呼叫靜態方法
