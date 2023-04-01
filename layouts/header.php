 <?php
 // Kiểm tra trạng thái đăng nhập của người dùng
 $isLoggedIn = false;
 $username = '';
 if (isset($_COOKIE['user_id'])) {
   $isLoggedIn = true;
   if (isset($_COOKIE['user_email'])) {
     $username = $_COOKIE['user_email'];
   }
 }
 ?>



<div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     
    <a class="navbar-brand" href="index.php?page=Home">Learing</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">HOME</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=Cart">CART</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?page=Product">PRODUCT</a>
        </li>

        <li class="nav-item"<?php if ($isLoggedIn) {echo 'style="display:none"';} ?>>
          <a class="nav-link" href="index.php?page=signin">SIGNIN</a>
        </li>

        <li class="nav-item"<?php if ($isLoggedIn) {echo 'style="display:none"';} ?>>
          <a class="nav-link" href="index.php?page=register">REGISTER</a>
        </li>



        <li class="nav-item dropdown"<?php if (!$isLoggedIn) {echo 'style="display:none"';} ?>>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $username ? $username : 'User Name'; ?>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?page=profile">Profile</a></li>
            <li><a class="dropdown-item" href="#">Item</a></li>
            <li><a class="dropdown-item" href="#">Product</a></li>
            <li><a class="dropdown-item" href="#">Accout</a></li>



            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"onclick="logout()">LogOut</a></li>
          </ul>
        </li>
       
      </ul>
      <form class="d-flex" <?php if ($isLoggedIn) {echo 'style="width: 300px"';} ?>>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>


<script>

  
  function logout() {
    // Xóa cookie "user_id"
    document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

    // Chuyển hướng đến trang đăng nhập
    window.location.href = 'http://localhost/test/index.php?page=Home';
  }
</script>
