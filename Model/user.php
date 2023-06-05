<?php
class User{
    // thuộc tính
    var $makh=0;// vì kiểu dl là số nguyên
    var $tenkh=null;
    var $user=null;
    var $matkhau=null;
    var $email=null;
    var $diachi=null;
    var $dthoai=null;
    var $vaitro=0;
    // hàm tạo
    public function __construct(){}
    // phương thức inser thông tin vào trong database
    public function insertUser($tenkh,$user,$matkhau,$email,$dchi,$dthoai)//(hai,hai,123,hai@gmail.com,hcm,123456)
    {
        $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,?,?,?,?,?,?,DEFAULT)";
        // ai sẽ thực thi câu truy vấn này? 1 là exec, 2 là prepare
        $db=new connect();
        $stm=$db->getListP($query);
        // muốn prepare đc thì phải execute
        $stm->execute([$tenkh,$user,$matkhau,$email,$dchi,$dthoai]);

    }
    // giá trị ràng buộc
    public function insertUser1($tenkh,$user,$matkhau,$email,$dchi,$dthoai)//(hai,hai,123,hai@gmail.com,hcm,123456)
    {
        $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,:tenkh,:username,:matkhau,:email,:diachi,:sodienthoai,DEFAULT)";
        // ai sẽ thực thi câu truy vấn này? 1 là exec, 2 là prepare
        $db=new connect();
        $stm=$db->getListP($query);
        // ràng buộc về giá trị
        // $stm->bindValue(':tenkh',$tenkh);
        // $stm->bindValue(':username',$user);
        // $stm->bindValue(':matkhau',$matkhau);
        // $stm->bindValue(':email',$email);
        // $stm->bindValue(':diachi',$dchi);
        // $stm->bindValue(':sodienthoai',$dthoai);
        $stm->bindParam(':tenkh',$tenkh);
        $stm->bindParam(':username',$user);
        $stm->bindParam(':matkhau',$matkhau);
        $stm->bindParam(':email',$email);
        $stm->bindParam(':diachi',$dchi);
        $stm->bindParam(':sodienthoai',$dthoai);
        // muốn prepare đc thì phải execute
        $stm->execute();
    }
    // dạng tiêu chuẩn tức là lệnh exec
    public function insertUser2($tenkh,$user,$matkhau,$email,$dchi,$dthoai)//(hai,hai,123,hai@gmail.com,hcm,123456)
    {
        $query="insert into khachhang1(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,'$tenkh','$user','$matkhau','$email','$dchi','$dthoai',DEFAULT)";
        // ai sẽ thực thi câu truy vấn này? 1 là exec
        $db=new connect();
        $stm=$db->exec($query);
    }
    public function logUser($user,$matkhau)//hai,123
    {
        // câu truy vấn
        $select="select * from khachhang1 where username='$user' and matkhau='$matkhau' ";
        // ai thực thi câu lệnh select
        $db=new connect();
        $result=$db->getList($select);//$result[29,hai,hai,123,hcm....]
        // vì trả về 1 dòng user nên fetch
        $set= $result->fetch();//$set[29,hai,hai,123,hcm....]
        return $set;
    }
    // phương thức loguer trả về thông tin của 1 người đã đc đăng ký
    // pt insert comment
    public function insertComment($mahh,$makh,$noidung)
    {
        $date=new DateTime("now");
        $ngay=$date->format("Y-m-d");
        $query="insert into binhluan1(mabl,mahh,makh,ngaybl,noidung)values(Null,:mahh,:makh,:ngaybl,:noidung)";
        $db=new connect();
        $stm=$db->getListP($query);
        // ràng buộc giá trị hoặc biến
        $stm->bindParam(':mahh',$mahh);
        $stm->bindParam(':makh',$makh);
        $stm->bindParam(':ngaybl',$ngay);
        $stm->bindParam(':noidung',$noidung);
        $stm->execute();
    }
    // hiển thị bình luận
    public function displayComment($mah)
    {
        // câu truy vấn
        $select="select a.tenkh,b.noidung  FROM khachhang1 a INNER join binhluan1 b 
        on a.makh=b.makh WHERE b.mahh=$mah";
        // ai thực thi câu lệnh select
        $db=new connect();
        $result=$db->getList($select);
        return $result;
    }
    public function countComment($mah)
    {
        // câu truy vấn
        $select="select count(mabl) from binhluan1 where mahh=$mah";
        // ai thực thi câu lệnh select
        $db=new connect();
        $result=$db->getInstance($select);
        return $result;
    }
}
?>