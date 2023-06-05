<?php
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];////login_action
}
switch($action)
{
    case "login":
        include "View/login.php";
        break;
    case "login_action":
        // gửi thông tin về login_action$_POST=array('txtusername'='hai','txtpassword'='123')
        $user=$_POST['txtusername'];//hai
        $matkhau=$_POST['txtpassword'];//123
        $crypt=md5($matkhau);
        $dt=new User();
        $u=$dt->logUser($user, $crypt);//$u=[29,hai,hai,123,hcm....]
        // session là gì? là phiên làm viêc cho từng khách truy cập,php sẽ tạo file
        // trong thư mục tạm php.ini:session.save.path để lưu thông này, thông tin này đc dùng cho tất 
        // cả các trang mà khách truy cập
        // session nó bắt đầu làm việc khi có hàm sesion_start
        // tốt nhất nên gọi hàm này ở đầu trang.
        // lúc này cần lưu thông tin của khách hàng vào sesion
        if($u !='false')
        {
            $_SESSION['makh']=$u[0];//29
            $_SESSION['tenkh']=$u[1];//hai
            $_SESSION['username']=$u[2];
            $_SESSION['matkhau']=$u[3];
            $_SESSION['email']=$u[4];
            $_SESSION['diachi']=$u[5];
            $_SESSION['sodienthoai']=$u[6];
            echo '<script> alert("Đăng nhập thành công");</script>';
            // đăng nhập thành công thì quay lại trang mua hàng
            echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=home"/>';
            // include "View/home.php";

        }
        break;
    case "log_out":
        // hàm unset: là loại bỏ 1 biến hoặc nhiều biến được truyền vào, và nó cũng có thể sử dụng để loại bỏ 1 phần tử xác định trong mảng
        // cú pháp: unset(var $a);
        // lưu ý: Nếu 1 biến toàn cục bị unset trong một hàm nào đó thì biến đó sẽ bị loại trong phạm vi hàm đó, để xóa biến toàn
        // cục ta sử sụng mảng $GLOBALS
        // ví dụ: $array=['php','angular','nodejs'];=>unset($array[1])=>$array=['php','nodejs']
        // ví dụ dạng lưu ý: $test='a'
        // function testA(){unset($GLOBAL['test'])}=> lúc gọi hàm testA()
        // nếu muốn log-out ra thì tức là xóa đi maxkh đã được lưu vào sesion
        if(isset($_SESSION['makh']))
        {
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            unset($_SESSION['username']);
            unset($_SESSION['matkhau']);
            unset($_SESSION['email']);
            unset($_SESSION['diachi']);
            unset($_SESSION['sodienthoai']);
            unset($_SESSION['cart']);

        }
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=home"/>';
        // include "View/home.php";
        break;

    
}
?>