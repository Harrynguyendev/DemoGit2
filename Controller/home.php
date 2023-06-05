<?php
$action="home";
if(isset($_GET['act']))
{
    $action=$_GET['act'];//detail
}
switch($action){
    case "home":
        include "View/home.php";
        break;
    case "sanpham":
        include "View/sanpham.php";
        break;
    case "khuyenmai":
        // tại sao phải gọi đến view/sản phẩm vì trang khuyến mà trang sản phẩm all thiết kế giống
        // template(mẫu)
        include "View/sanpham.php";
        break;
    case "detail":
        //$GET['id']=18
        include "View/sanphamchitiet.php";
        break;
    case "comment":
        //$_POST['txtmahh'=18,'comment'="đen huyền bí",]
        $mahh=$_POST['txtmahh'];
        $noidung=$_POST['comment'];
        $makh=$_SESSION['makh'];
        // đem toàn bộ cái mà lấy về insert vô đatabase
        $u=new User();
        $u->insertComment($mahh,$makh,$noidung);
        include "View/sanphamchitiet.php";
        break;
    case "timkiem":
        include "View/sanpham.php";
        break;
}
?>