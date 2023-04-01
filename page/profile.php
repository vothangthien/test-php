<?php
require_once __DIR__ . '/../models/ConnectSQL.php';
//cách 1

// if (isset($_COOKIE["user_email"])) {
//    // Lấy thông tin tài khoản từ database
//    $email = $_COOKIE["user_email"];
//    $sql_check = "SELECT name, email, password, phone, date, COALESCE(avatar, 'https://icons.veryicon.com/png/o/miscellaneous/rookie-official-icon-gallery/225-default-avatar.png') AS avatar FROM administration WHERE email = '$email'";
//    $result_check = mysqli_query($conn, $sql_check);

//    // Hiển thị thông tin tài khoản
//    while ($row = mysqli_fetch_assoc($result_check)) {
//       echo "<div class='form-avatar'>
//       <img src='".($row["avatar"] ? $row["avatar"] : "https://icons.veryicon.com/png/o/miscellaneous/rookie-official-icon-gallery/225-default-avatar.png")."' alt='Avatar' class='avatar'>
//       </div>";

//       echo "<div class='form-name'>Name: " . $row["name"] . "</div>";
//       echo "<div>Email: " . $row["email"] . "</div>";
//       echo "<div>Password: " . $row["password"] . "</div>";
//       echo "<div>Phone: " . $row["phone"] . "</div>";
//       echo "<div>Date: " . $row["date"] . "</div>";
//    }

// } else {
//    // Hiển thị thông báo cho người dùng để đăng nhập hoặc đăng ký
//    echo "Please log in or register to view your account information.";
// }

// cách 2

if (isset($_COOKIE["user_email"])) {
   $email = $_COOKIE["user_email"];
   $sql_check = "SELECT name, email, password, phone, date, COALESCE(avatar, 'https://icons.veryicon.com/png/o/miscellaneous/rookie-official-icon-gallery/225-default-avatar.png') AS avatar FROM administration WHERE email = '$email'";
   $result_check = mysqli_query($conn, $sql_check);
   $row = mysqli_fetch_assoc($result_check);
   $username = $row['name'];
   $useremail = $row['email'];
   $userpassword=$row['password'];
   $userphone=$row['phone'];
   $userdate=$row['date'];
   $avatar=$row['avatar'];
} else {
   $username = '';
   $useremail="";
   $userpassword="";
   $userphone="";
   $userdate="";
   $avatar="";
}
?>

<head>
   <link rel="stylesheet" href="./public/style/profile.css"/>
</head>
<div class='form-profile'>
 <form>
 <div class='form-avatar'>
       <?php
               echo "<div class='form-avatar'>
               <img src='".($row["avatar"] ? $row["avatar"] : "https://icons.veryicon.com/png/o/miscellaneous/rookie-official-icon-gallery/225-default-avatar.png")."' alt='Avatar' class='avatar'>
               </div>";
       ?>
   </div> 
   <div clas='form-Username'>
       <?php
                 echo "Username: " . $username;

       ?>
   </div>

   <div class='form-username' >
      <?php
          echo" User Email: " . $useremail;
      ?>

   </div>

   <div class='form-userpassword'>
      <?php
         echo" Password: " . $userpassword;
      ?>

   </div>

   <div class='form-phone'>
       <?php 
            echo" Phone: " . $userphone;
       ?>
   </div>

   <div class='form-date'>
      <?php echo" Date: " .$userdate;?>
    </div>


 </form>

</div>
