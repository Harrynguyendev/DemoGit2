  <!-- quảng cáo -->
  <?php
  include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  <!-- phân trang -->
  <?php
//   tìm tổng số sản phẩm là bao nhiêu
   $hh=new HangHoa();
   $results=$hh->getListHangHoaNewAll();
//    $count=$hh->getListCount();//$count=21
   $count=$results->rowCount();// $count=21
   // mình cho giới hạn
   $limit=8;
   // tính số trang
   $p=new Page();
   $page=$p->findPage($count,$limit);//findPage(21,8)=3
   // tìm curreent_page
   $current_page=isset($_GET['page'])?$_GET['page']:1;//3
   // tính start
   $start=$p->findStart($limit);//16
  ?>
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 <?php
 if(isset($_GET['act']))
 {
     if($_GET['act']=="sanpham")
     {
         $ac=1;
     }
     elseif($_GET['act']=="khuyenmai")
     {
         $ac=2;
     }
     elseif($_GET['act']=="timkiem")
     {
         $ac=3;
     }
     else{
         $ac=0;
     }
 }
 ?>

  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
              <?php
              if($ac==1)
              {
                  echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM</h3>';
              }
              elseif($ac==2)
              {
                  echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM KHUYẾN MÃI</h3>';
              }
              elseif($ac==3)
              {
                  echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM TÌM KIẾM</h3>';
              }
              else{
                  echo '<h3 class="mb-5 font-weight-bold">KHÔNG CÓ SẢN PHẨM</h3>';
              }
              ?>
             
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
         <?php
         $hh=new HangHoa();
         if($ac==1)
         {
            // $results=$hh->getListHangHoaNewAll();// $result=23sp
            $results=$hh->getListHangHoaPageSP($start,$limit);//getListHangHoaPageSP(0,8)
            
         }
         elseif($ac==2)
         {
            $results=$hh->getListHangHoaSaleAll();//$result=5sp
         }
         elseif($ac==3)
         {
            //  gửi chữ mà người dùng nhấn submit $_POST=['txtsearch'=dép]
            if($_SERVER['REQUEST_METHOD']=='POST')// if(isset($_POST['submit])
            {
                $namesearch=$_POST['txtsearch'];
                $results=$hh->getSearch($namesearch);
            }
         }
        $j=1;
         while($set=$results->fetch()):
         ?>
              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                  <img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                  <?php
                  if($ac==2)
                  {
                      echo '<h5 class="my-4 font-weight-bold">
                      <font color="red">'.$set['giamgia'].'<sup><u>đ</u></sup></font>
                      <strike>'.$set['dongia'].'</strike><sup><u>đ</u></sup>
                        </h5>';
                  }else{
                      echo '<h5 class="my-4 font-weight-bold" style="color: red;">'.number_format($set['dongia']).'<sup><u>đ</u></sup></br></h5>';
                  }
                  ?>
                  
                  <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh'];?>">
                  <span><?php echo $set['tenhh'].'-'.$set['mausac'];?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                  <h5>Số lượt xem:<?php echo $set['soluotxem']?></h5>

              </div>
        <?php
        if($j%4==0)
        {
            echo '</div><div class="row">';
        }
        $j++;
        endwhile;
        ?>
      </div>

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
 
  <div class="col-md-6 div col-md-offset-3">
				<ul class="pagination">
					<?php
                    if($current_page>1 && $page>1)
                    {
                        echo ' <li ><a href="index.php?action=home&act=sanpham&page='.($current_page-1).'">Prev</a></li>';
                    }
                    for($i=1;$i<=$page;$i++)
                    {
                    ?>
				    <li ><a href="index.php?action=home&act=sanpham&page=<?php echo $i;?>"><?php echo $i; ?></a></li>
				    <?php
                    }
                    if($current_page<$page && $page>1)
                    {
                        echo ' <li ><a href="index.php?action=home&act=sanpham&page='.($current_page+1).'">Next</a></li>';
                    }
                    ?>
				</ul>
</div>