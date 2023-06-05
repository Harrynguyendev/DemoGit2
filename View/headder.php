
<header class="row no-gutters">
    <!-- nav san pham -->
    <section class="col-12" style="height:40px;">
        <div class="col-12" >
            <div class="row">

                <!-- test -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top scrolling-navbar" style="margin-bottom: 0px;">

                    <div class="collapse navbar-collapse" id="basicExampleNav">

                        <!-- Links -->
                        <ul class="navbar-nav mr-auto smooth-scroll">
                            
                        </ul>
                    </div>
                </nav>
                <!-- end test -->
            </div>
        </div>

    </section>
    <!-- dang ky -->
    <section class="col-12">
       
            <div class="col-12">
                <div class="row">
                    <nav class="navbar navbar-expand-lg n navbar-light bg-light" style="margin-bottom: 0px; ">

                        <!-- Right -->
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <form class="form-inline" action="index.php?action=home&act=timkiem" method="post">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <!-- <a href="Trangchu.php?trang=tk"> -->
                                            <input class="input-group-text" style="height: 35px;" name="submit" type="submit" id="btsearch" value="Tìm Kiếm"/>
                                        <!-- </a> -->
                                            <!-- <span class="input-group-text">@</span> -->
                                            <input type="text" name="txtsearch" class="form-control" placeholder="Tìm Kiếm"/>
                                        </div>

                                </form>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=registration" class="nav-link">Đăng Ký</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=login" class="nav-link">Đăng Nhập</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=login&act=log_out" class="nav-link">Đăng Xuất</a>
                            </li>
                            <li>
                                <a href="index.php?action=giohang" class="nav-link"><img src="Content/imagetourdien/cartx2.png" width="30px" height="30px" alt=""></a>

                            </li>
                            <li>
                                <?php
                                if(isset($_SESSION['cart']))
                                {
                                    $dem=count($_SESSION['cart']);
                                }
                                else{
                                    $dem=0;
                                }
                                ?>
                                 <p style="color: red; margin-top: 20px; margin-left: 0px;"><?php echo "(".$dem.")";?></p>
                            </li>
                            <li>
                                <!-- nếu đăng nhập thành công thì thông tin của 1 user nó sẽ đc lưu vào session
                             -->
                             <?php
                                if(isset($_SESSION['makh'])&& isset($_SESSION['tenkh'])):///{
                                    $name=$_SESSION['tenkh'];
                             ?>
                                <p style="color: red; margin-top: 20px; margin-left: 0px;"><?php echo "Xin chào ".$name?></p>
                              <?php
                              else:
                                echo '<p style="color: red; margin-top: 20px; margin-left: 0px;">"Xin chào "</p>';
                              ?> 
                              <?php
                              endif;
                              ?> 
                            
                                 
                            </li>
                            <li>
                                
                                    <p style="color: red; margin-top: 20px; margin-left: 0px;"></p>
                                
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
       
    </section>


</header>
<!-- dang ky -->

<!-- hinh dộng -->
<div class="row">

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>

                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner z-depth-1-half" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./Content/imagetourdien/9011583723026.png" style="height: 400px;" alt=" First slide">
                        </div>
                        <!--/First slide-->
                        <!--Second slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./Content/imagetourdien/9521594005272.png" style="height: 400px;" alt="Second slide">
                        </div>
                        <!--/Second slide-->
                        <!--Third slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./Content/imagetourdien/9541596012726.png" alt="Third slide" style="height: 400px;">
                        </div>

                        <!--/Third slide-->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </div>
        </div>
       
    </div>
</div>