<?php
session_start();
if (isset($_POST['m_user'])) {
    //connect กับ data
    include("connectdb.php");
    //รับค่า user กับ pass
    $username = mysqli_real_escape_string($con, $_POST['m_user']);
    $passwd = mysqli_real_escape_string($con, $_POST['m_pass']);

    //query
    $sql = "SELECT * FROM tb_member 
                WHERE m_user='" . $username . "' 
                AND m_pass='" . $passwd . "'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION["m_id"] = $row["m_id"];
        $_SESSION["m_level"] = $row["m_level"];
        $_SESSION["m_fname"] = $row["m_fname"];
        $_SESSION["m_lname"] = $row["m_lname"];
        $_SESSION["m_img"] = $row["m_img"];




        if ($row['m_level'] == "admin") {
            Header("Location: admin/");
        } elseif ($row['m_level'] == "user") {
            Header("Location: user/");
        }
    } else {
        echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }


    //close else chk trim

    //exit();




} else {


    Header("Location: index.php"); //user & mem_password incorrect back to login again


}
