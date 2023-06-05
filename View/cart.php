
<div class="table-responsive">
  <!-- kiểm tra nếu ko có hàng trong giỏ hàng thì thông báo cho người dùng biết -->
  <?php
  if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0):
    echo '<script>alert("Giỏ hàng bạn chưa có");</script>';
   include "home.php";
   //echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home&act=sanpham"/>';
  ?>
  <?php
  else:
  ?>
    <form action="index.php?action=giohang&act=update_item" method="post">
      <table class="table table-bordered">
        <thead>
          <tr><td colspan="5"><h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2></td></tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // foreach(mang as $key=>value)
          // foreach(mang as $item)
          $j=0;
          foreach($_SESSION['cart'] as $key=>$item):
            $j++;
            $costnew=number_format($item['cost'],2);
            $totalnew=number_format($item['total'],2);
          ?>
            <tr>
              <td><?php echo $j;?></td>
              <td><img width="50px" height="50px" src="Content/imagetourdien/<?php echo $item['hinh'] ;?>">
              <?php echo $item['name'] ;?></td>
              <td>Màu: <?php echo $item['mau'] ;?> Size: <?php echo $item['size'] ;?></td>
              <td>Đơn Giá:<?php echo $costnew ;?> - Số Lượng:
              
               <input type="text" name="newqty[<?php echo $item['mahh'];?>]" value="<?php echo $item['qty'] ;?>" /><br />
                <p style="float: right;"> Thành Tiền <?php echo $totalnew ;?><sup><u>đ</u></sup></p>
              </td>
              <td><a href="index.php?action=giohang&act=delete_item&id=<?php echo $item['mahh'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a>

                <button type="submit" class="btn btn-secondary">Sửa</button>

              </td>
            </tr>
          <?php
          endforeach;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b><?php echo get_subtotal();?> <sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=hoadon">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
    </form>
 <?php
 endif;
 ?>
</div>
</div>