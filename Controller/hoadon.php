<?php
$action="hoadon";
switch($action){
    case "hoadon":
        // thực hiện việc là insert vào bảng hóa đơn
        // masohd,makh,ngaydat,tongtien
        if(isset($_SESSION['makh']))
        {
            $makhang=$_SESSION['makh'];//8
            $hd=new HoaDon();
            $sohdid=$hd->insertOrder($makhang);//$sohdid=50
            $_SESSION['sohd']=$sohdid;
            // đem những món hàng trong giỏ hàng chèn vào bảng cthoadon
            $total=0;
            foreach($_SESSION['cart'] as $key=>$item)
            {
                $hd->insertOrderDetail($sohdid,$item['mahh'],$item['qty'],$item['mau'],$item['size'],$item['total']);
                $total+=$item['total'];// tính tổng thành tiền
            }
            // sau đó đem tổng thành tiền update vào bảng hoadon1
            $hd->updateOrderTotal($sohdid,$total);
           
        }
        include "View/order.php";
        break;
}
?>