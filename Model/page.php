<?php
class Page{
    function findPage($count,$limit)
    {
        // 24%8==0?24/8:floor(24/8)+1;
         // 21%8==0?21/8:floor(21/8)+1;
        $page=(($count%$limit)==0)?$count/$limit:floor($count/$limit)+1;
        return $page;//3
    }
    // phương thức tìm start
    function findStart($limit)
    {
        // nếu trang hiện tại($_GET['page']) ko tồn tại hoặc trang hiện tại =1
        if(!isset($_GET['page'])||($_GET['page']==1))
        {
            $start=0;
            $_GET['page']=1;
        }
        else{
            $start=($_GET['page']-1)*$limit;
        }
        return $start;
    }
}
?>