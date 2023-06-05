<?php
$action="giohang";
// kiểm tra xem có tồn tại cái giỏ hàng hay ko, nếu ko có thì tạo
if(!isset($_SESSION['cart']))
{
    // tạo giỏ hàng
    $_SESSION['cart']=array();
}
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "giohang":
        include "View/cart.php";
        break;
    case "add_cart":
        // truyền dữ liệu qua đây bằng phương thúc POST, mà POST thì nhận giá trị thông qua
        // name(input, select)
        $mahh=$_POST['mahh'];//24
        $mau=$_POST['mymausac'];//màu trắng
        $size=$_POST['size'];//35
        $soluong=$_POST['soluong'];//2
        add_item($mahh,$soluong,$mau,$size);
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang&act=giohang"/>';
        break;
    case "delete_item":
        // vì phương thức nó gửi qua là get, truyền qua đây là id hàng hóa
        if(isset($_GET['id']))
        {
         
            $mahang=$_GET['id'];
            unset($_SESSION['cart'][$mahang]);
        }
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang&act=giohang"/>';
        break;
    case "update_item":
        // gởi qua đây là những name trong thẻ input hoặc select(option),lưu trong $_Post
        //newsl['1'=>6,'2'=>3] với số lượng trong giỏ hàng của cô, $_Session['1']=[1,tenhang, ,3]$_Session['2']=[1,tenhang, 3]
        $newsl=$_POST['newqty'];//
        foreach($newsl as $key=>$qty)
        {
            if($_SESSION['cart'][$key]['qty']!=$qty)
            {
                // update là phải có mã và số lượng
                update_item($key,$qty);
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang&act=giohang"/>';
        break;
        //
        //$-SESSION['cart'][1]=['1, giay cao got vang,mauden, 38,60.000,6,3tr6]
        //$-SESSION['cart'][2]=['2, dép quai chu v, 38,60.000,3,3tr6]
        //newqty[1]=>3,newqty[2]=3
        //newqty[1=>6,2=>3]
}
?>