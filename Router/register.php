<form  id="register-form" class="form">
  <div>
    <h1>Register</h1>
  </div>
  <div class="between">
    <input class="inputrs" type="text" id="username" name="username" placeholder="username" required>
    <input class="inputrs" type="email" id="email" name="email"  placeholder="email@gamil.com.vn" required>
    <input class="inputrs" type="password" id="password" name="password"  placeholder="password" required>
    <input class="inputrs" type="password" id="cf_password" name="cf_password"  placeholder="comfrim paswword" required>
    <input class="inputrs" type="phone" id="phone" name="phone"  placeholder="Your Phone on number ten" required>
    <input class="inputrs" type="date" id="date" name="date"  placeholder="" required>
    <button class="butoonrs" type="submit" value="Register">Register</button>
  </div>
  <div class="p">
    <button>You already have an account? <a href="index.php?page=signin">Click here</a></button>
  </div>
</form>

<div id="error-message"></div>

<script>
  const form = document.getElementById("register-form");
  const errorMessage = document.getElementById("error-message");

  form.addEventListener("submit", (event) => {
    event.preventDefault(); // Ngăn form submit đi
    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            alert("Registration successful!");
            
          } else {
            errorMessage.textContent = alert(response.message);
          }
        } else {
          errorMessage.textContent = alert("Registration error!");
        }
      }
    };
    xhr.open("POST", "api/API_register.php");
    xhr.send(formData);
  });
</script>
