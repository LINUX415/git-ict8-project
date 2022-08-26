<?php
include('connectdb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
// print_r($_POST);
// exit();
$m_level = 'member';
$username = mysqli_real_escape_string($con, $_POST["m_user"]);
$passwd = mysqli_real_escape_string($con, $_POST["m_pass"]);
$m_fname = mysqli_real_escape_string($con, $_POST["m_fname"]);
$m_lname = mysqli_real_escape_string($con, $_POST["m_lname"]);
$m_tel = mysqli_real_escape_string($con, $_POST["m_tel"]);
$m_email = mysqli_real_escape_string($con, $_POST["m_email"]);
$m_address = mysqli_real_escape_string($con, $_POST["m_address"]);

$date1 = date("Ymd_His");
$numrand = (mt_rand());
$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
$upload = $_FILES['m_img']['name'];
if ($upload != '') {
    $path = "m_img/";
    $type = strrchr($_FILES['m_img']['name'], ".");
    $newname = $numrand . $date1 . $type;
    $path_copy = $path . $newname;
    $path_link = "m_img/" . $newname;
    move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);
}
//เพิ่มเข้าไปในฐานข้อมูล
$sql = "INSERT INTO tb_member(m_level,m_user, m_pass, m_fname, m_lname,  m_email, m_tel, m_address,m_img)
			 VALUES('$m_level','$username', '$passwd', '$m_fname','$m_lname','$m_email', '$m_tel', '$m_address','$newname')";
$result = mysqli_query($con, $sql);
// exit();
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('สมัครสมาชิกสำเร็จ !');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ไม่สามารถทำรายการได้ !');";
    echo "</script>";
}
