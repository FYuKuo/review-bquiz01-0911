<?php
include('./base.php');
$table = $_POST['table'];
$DB = new DB($table);


foreach ($_POST['id'] as $key => $id) {
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $DB->del($id);
    }else{
        $data = $DB->find($id);

        switch ($table) {
            case 'title':
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = ($_POST['sh'] == $id)?1:0;
            break;
        
            case 'image':
            case 'mvim':
                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

            break;    

            case 'news':
            case 'ad':
                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                $data['text'] = $_POST['text'][$key];

            break;
        
            
            case 'admin':

                $data['acc'] = $_POST['acc'][$key];
                $data['pw'] = $_POST['pw'][$key];
                
            break;
            case 'menu':

                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                $data['text'] = $_POST['text'][$key];
                $data['href'] = $_POST['href'][$key];
                
            break;
            
        
        }

        $DB->save($data);
    }
}
to("../back.php?do=$table");
?>