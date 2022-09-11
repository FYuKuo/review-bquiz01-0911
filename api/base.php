<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB
{
    protected $table;
    protected $pdo;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15-0911-2";


    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
    }

    public function all(...$arg)
    {
        $sql = "SELECT * FROM `$this->table` ";

        if(isset($arg[0])){
            if(is_array($arg[0])){

                foreach ($arg[0] as $key => $value) {
                    $tmp[] = " `$key` = '$value' ";
                }
                
                $sql .= " WHERE " . join("AND",$tmp);
            }else{
            $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }



    public function find($id)
    {
        $sql = "SELECT * FROM `$this->table` ";

            if(is_array($id)){

                foreach ($id as $key => $value) {
                    $tmp[] = " `$key` = '$value' ";
                }
                
                $sql .= " WHERE " . join("AND",$tmp);
            }else{
            $sql .= " WHERE `id` = '$id' ";
            }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }


    public function del($id)
    {
        $sql = "DELETE FROM `$this->table` ";

            if(is_array($id)){

                foreach ($id as $key => $value) {
                    $tmp[] = " `$key` = '$value' ";
                }
                
                $sql .= " WHERE " . join("AND",$tmp);
            }else{
            $sql .= " WHERE `id` = '$id' ";
            }

        return $this->pdo->exec($sql);
    }


    public function save($array)
    {
        if(isset($array['id'])){
            foreach ($array as $key => $value) {
                if($key != 'id'){
                    $tmp[] = " `$key` = '$value' ";
                }
            }

            $sql = "UPDATE `$this->table` SET " . join(',',$tmp) . " WHERE `id` = '{$array['id']}'";
        }else{

            $col = join("`,`",array_keys($array));
            $val = join("','",$array);

            $sql = "INSERT INTO `$this->table`(`$col`) VALUES ('$val')";
        }
        return $this->pdo->exec($sql);
    }



    public function math($math,$col,...$arg)
    {
        $sql = "SELECT $math($col) FROM `$this->table` ";

        if(isset($arg[0])){
            if(is_array($arg[0])){

                foreach ($arg[0] as $key => $value) {
                    $tmp[] = " `$key` = '$value' ";
                }
                
                $sql .= " WHERE " . join("AND",$tmp);
            }else{
            $sql .= $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql .= $arg[1];
        }

        return $this->pdo->query($sql)->fetchColumn();
    }
}


class STR
{
    protected $table;
    public $h;
    public $t;
    public $aH;
    public $aT;
    public $aB;
    public $uH;
    public $uT;
    public $uB;

    public function __construct($table)
    {
        $this->table = $table;

        switch ($table) {
            case 'ad':
                $this->h = "動態文字廣告管理";
                $this->t = ["動態文字廣告"];
                $this->aB = "新增動態文字廣告";
                $this->aH = "新增動態文字廣告";
                $this->aT = ["動態文字廣告："];
            break;
            case 'admin':
                $this->h = "管理者帳號管理";
                $this->t = ["帳號","密碼"];
                $this->aB = "新增管理者帳號";
                $this->aH = "新增管理者帳號";
                $this->aT = ["帳號：","密碼：","確認密碼："];
            break;
            case 'total':
                $this->h = "進站總人數管理";
                $this->t = ["進站總人數："];
            break;
            case 'image':
                $this->h = "校園映像資料管理";
                $this->t = ["校園映像資料圖片"];
                $this->uB = "更換圖片";
                $this->uH = "更新校園映像圖片";
                $this->uT = ["校園映像圖片："];
                $this->aB = "新增校園映像圖片";
                $this->aH = "新增校園映像圖片";
                $this->aT = ["校園映像圖片："];
            break;
            case 'menu':
                $this->h = "選單管理";
                $this->t = ["主選單名稱","選單連結網址","次選單數"];
                $this->uB = "編輯次選單";
                $this->uH = "編輯次選單";
                $this->uT = ["次選單名稱","次選單連結網址","刪除","更多選單"];
                $this->aB = "新增主選單";
                $this->aH = "新增主選單";
                $this->aT = ["主選單名稱：","選單連結網址："];
            break;
            case 'mvim':
                $this->h = "動畫圖片管理";
                $this->t = ["動畫圖片"];
                $this->uB = "更新動畫";
                $this->uH = "更新動畫圖片";
                $this->uT = ["動畫圖片："];
                $this->aB = "新增動畫圖片";
                $this->aH = "新增動畫圖片";
                $this->aT = ["動畫圖片："];
            break;
            case 'news':
                $this->h = "最新消息資料管理";
                $this->t = ["最新消息資料內容"];
                $this->aB = "新增最新消息資料";
                $this->aH = "新增最新消息資料";
                $this->aT = ["最新消息資料："];
            break;
            case 'title':
                $this->h = "網站標題管理";
                $this->t = ["網站標題","替代文字"];
                $this->uB = "更新圖片";
                $this->uH = "更新標題區圖片";
                $this->uT = ["標題區圖片："];
                $this->aB = "新增網站標題區圖片";
                $this->aH = "新增標題區圖片";
                $this->aT = ["標題區圖片：","標題區替代文字："];
            break;
            case 'bottom':
                $this->h = "頁尾版權資料管理";
                $this->t = ["頁尾版權資料："];
            break;
            
        }
    }
}






function to($url)
{
    header("location:$url");
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


if(isset($do)){
    $STR = new STR($do);
}

$Ad = new DB('ad');
$Admin = new DB('admin');
$Bottom = new DB('bottom');
$Image = new DB('image');
$Menu = new DB('menu');
$Mvim = new DB('mvim');
$News = new DB('news');
$Title = new DB('title');
$Total = new DB('total');


?>