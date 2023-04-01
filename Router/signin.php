<form id="login-form" class="form" action="/api/API_signin.php" method="POST">
  <div class="avatar">
    <h1>SingNin</h1>
  </div>
  <div class="between">
    <input class="inputsn" type="email" id="email" name="username" placeholder="Email@gmail.com.vn" required>
    <input class="inputsn" type="password" id="password" name="password" placeholder="password" required>
    <button class="inputsn" class="bn_between" type="submit">Đăng nhập</button>
    <button class="inputsn google"></button>
    <button class="inputsn facebook"></button>
    <button class="inputsn zalo"></button>
  </div>
  <div class="p">
    <button>You don't have an account<a href="index.php?page=register">Click</a></button>
  </div>
</form>

<div id="error-message"></div>

<script>
 const form = document.getElementById("login-form");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const errorMessage = document.getElementById("error-message");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // Prevent the form from submitting

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.success) {
  alert("Login successful!");
  // Set the user_id and other cookies
  const userCookies = {
    user_id: response.user_id,
    user_email: emailInput.value,
    user_role: response.user_role,
    // Add more cookies if needed
  };

  for (const [key, value] of Object.entries(userCookies)) {
    document.cookie = `${key}=${value}; expires=${new Date(Date.now() + 30 * 24 * 60 * 60 * 1000).toUTCString()}; path=/`;
  }

  // Redirect to home page or other page
  window.location.href = 'http://localhost/test/index.php?page=Cart';
} else {
  errorMessage.innerHTML = alert(response.message);
}


      } else {
        errorMessage.innerHTML = alert("Login error!");
      }
    }
  };

  xhr.open("POST", "api/API_signin.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`username=${emailInput.value}&password=${passwordInput.value}`);
});

</script>
