<?php
// lớp giỏ hàng này ko tạo lớp 
function add_item($mah,$quantity,$mycolor,$size)// 24,3,mautrang,35
{
    // trước khi add thì phải kiểm tra xem mã hàng này có tồn tại trong giỏ hàng chưa
    if(isset($_SESSION['cart'][$mah]))
    {
        $quantity+=$_SESSION['cart'][$mah]['qty'];//$quantity=$quantity+$_SESSION['cart'][$mah]['qty']=3+2=5
        update_item($mah,$quantity);
        return;

    }
    // vì hình,tên, đơn giá chưa có, nhưng mã hàng có thì truy ngược lại
    $pros=new HangHoa();
    $pro=$pros->getListDetail($mah);
    // $pro[24,giày cao got vàng, 600000,0.24.jpg.....]
    $cost=$pro['dongia'];//$cost=600000
    $ten=$pro['tenhh'];//$ten="giày cao got vàng"
    $hinh=$pro['hinh'];//$hinh=24.jpg
    $total=$quantity*$cost;//$total=2*600000=1tr2
    // tạo thông tin của 1 sản phẩm, mà 1 sản phẩm có nhiều thuộc tính
    // do đó phải là 1 array để lưu thông tin
    // array[3,16,8]=>array[1]=>cho ra 16
    //array[key=>value], muốn lấy value array[key]
    // array['an'=>3,'bo'=>16,'dung'=8] array[b] cho kết quả 16
    $item=array(
        'mahh'=>$mah,
        'hinh'=>$hinh,
        'name'=>$ten,
        'mau'=>$mycolor,
        'size'=>$size,
        'cost'=>$cost,
        'qty'=>$quantity,
        'total'=>$total
    );
    //$item=['hinh'=>24.jpg,'name'=>giày cao got vàng,'mau'=>mautrang,
    //'size'=>35,'cost'=>600000,'qty'=>2,'total'=>1200000]
    // tạo item cho món hàng số 1
    //$item=['hinh'=>1.jpg,'name'=>dép vàng,'mau'=>mauvang,
    //'size'=>35,'cost'=>600000,'qty'=>1,'total'=>1200000]
    //a[][8][] muốn gán giá trị vào vị trí số 1 a[1]=8
    //$_SESSION['cart'][24]=item['hinh'=>24.jpg,'name'=>giày cao got vàng,'mau'=>mautrang,
    //'size'=>35,'cost'=>600000,'qty'=>2,'total'=>1200000]
    //$_SESSION['cart'][1]=item['hinh'=>1.jpg,'name'=>dép vàng,'mau'=>mauvang,
    //'size'=>35,'cost'=>600000,'qty'=>2,'total'=>1200000]
    $_SESSION['cart'][$mah]=$item;
   
    
       
}
// phương thức tính tổng thành tiền
function get_subtotal()
{
    $tong=0;
    foreach($_SESSION['cart'] as $item)
    {
        $tong+=$item['total'];
    }
    $tong =number_format($tong,2);
    return $tong;
}
function update_item($mah,$quantity)//24,5
{
    if($quantity<=0)
    {
        unset($_SESSION['cart'][$mah]);
    }
    else{
        $_SESSION['cart'][$mah]['qty']=$quantity;//$_SESSION['cart'][$mah]['qty']=5
        $totalnew=$_SESSION['cart'][$mah]['qty']*$_SESSION['cart'][$mah]['cost'];//5*6000000=3tr
        $_SESSION['cart'][$mah]['total']=$totalnew;
    }
    
}
?>