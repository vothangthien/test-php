<?php
// Kiểm tra xem user_id cookie đã được set hay chưa
if (!isset($_COOKIE['user_id'])) {
  // Nếu chưa set, chuyển hướng đến trang đăng nhập
  header('Location: http://localhost/test/index.php?page=signin');
  exit;
}

// Lấy user_id từ cookie
$user_id = $_COOKIE['user_id'];
?>
<div class="cartcss">
   <h1> this is page cart</h1>

</div>
