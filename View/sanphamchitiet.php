<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=add_cart" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">
                           <!-- lấy thông tin của 1 sản phẩm để hiển thị lên cho người dùng thấy -->
                           <?php
                           if(isset($_GET['id']))
                           {
                               $id=$_GET['id'];//18
                               $hh=new HangHoa();
                               $results=$hh->getListDetail($id);
                               // vì kết quả trả về chỉ có 1 row nên ko cần while
                               // đây là thông tin của 1 sản phẩm mà người dùng chọn
                               $mahh=$results[0];
                               $tenhh=$results[1];
                               $dongia=$results[2];
                               $giamgia=$results[3];
                               $hinh=$results[4];
                               $mota=$results[10];
                               $nhom=$results[5];
                           }
                           ?>

                            <div class="tab-pane active" id=""><img src="<?php echo 'Content/imagetourdien/'.$hinh;?>" alt="" width="200px" height="350px">
                            </div>
                           
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                         <?php
                         $results=$hh->getListDetailNhom($nhom);
                         while($set=$results->fetch()):
                        ?>
                        <li class="active"><a href="#" data-toggle="tab">
                        <img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" alt="">
                        </a>

                        </li>
                        <?php
                        endwhile;
                        ?>
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $mahh;?>" />
                        <!-- hiển thị tên sp -->
                        <h3 class="product-title"><?php echo $tenhh;?> </h3>
                        <div class="rating">
                            <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <!-- mô tả -->
                        <p class="product-description">
                            <?php echo $mota;?>
                        </p>
                        <h4 class="price">Giá bán: <?php echo $dongia;?> đ</h4>
                        
                        <h5 class="colors">Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">
                               <?php
                               $results=$hh->getListDetailNhom($nhom);
                               // trả ra nhiều row
                               while($set=$results->fetch()):
                               ?>
                               <option value="<?php echo $set['mausac']; ?>">
                               <?php echo $set['mausac']; ?>
                                </option>
                               <?php
                               endwhile;
                               ?>
                            </select><br>
                           
                            <input type="hidden" name="size" id="size" value="0" />
                            Kích Thước:
                            <?php
                                   $results=$hh->getListDetailNhomSize($nhom);
                                   while($set=$results->fetch()):
                            ?>
                               <button type="button" onclick="chonsize(<?php echo $set['size'];?>)" 
                               name="<?php echo $set['size'];?>" id="hong" class="btn btn-default-hong btn-circle" 
                               value="<?php echo $set['size'];?>">
                                   <!-- đỗ dữ liệu size -->
                                  <?php echo $set['size'];?>
                               </button>
                            <?php
                            endwhile;
                            ?>
                            </br></br>
                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                        </h5>
                        
                        <div class="action">

                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">MUA NGAY
                            </button>

                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>
<?php
if(isset($_SESSION['makh'])):
?>
<section>
    <div class="col-12">
        <div class="row">
            <!-- kiểm tra thử là phải bình luận của id sản phẩm hay ko -->
            <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $dt=new User();
                $results=$dt->countComment($id);//$results[9]
                $tong=$results[0];
            }
            ?>
                <p class="float-left"><b>BÌnh luận: <?php echo $tong;?></b></p>
                <hr>
            </div>
            <form action="index.php?action=home&act=comment&id=<?php echo $_GET['id']; ?>" method="post">
            <div class="row">
              
                    <input type="hidden" name="txtmahh" value="<?php echo $_GET['id'];?>" />
                    <img src="Content/imagetourdien/people.png" width="50px" height="50px"; />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                    <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
                                
            </div>
            
            </form>
            <div class="row">
                <p class="float-left"><b>Các bình luận</b></p>
                <hr>
            </div>
            <div class="row">
                <?php
                    
                    $results=$dt->displayComment($_GET['id']);
                    while($set=$results->fetch()):
                ?>
                <div class="col-12">
                    <div class="row">
                        <img src="Content/imagetourdien/people.png" alt="" width="50px" height="50px">
                        <p><?php echo '<b>'.$set['tenkh'].':</b>'.$set['noidung'];?></p><br>
                    </div>
                </div>
                <?php
                endwhile;
                ?>
               <br/>
            </div>

        </div>
    </section>
<?php
endif;
?>