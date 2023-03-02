<?php
include('includes/conn.php');

if (isset($_POST['submit'])) {

  if($_POST['terms']=='on'){
     $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if($password==$confirm_password){
      $firstname = $_POST['firstname'];
      $surname = $_POST['surname'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      $document = $_POST['document'];
      $profile = $_POST['profile'];
    
      $query = "INSERT INTO users (firstname, surname, email, address, phone, password, confirm_password, document, profile) VALUES ('$firstname', '$surname', '$email', '$address', '$phone', '$password', '$confirm_password', '$document', '$profile')";
      $result = mysqli_query($conn, $query);
      if ($result) {
          header('Location: login.php');
      } else {
          header('Location: signin.php');
      }
    }
  }
}


include('includes/header.php');
?>

<div class="w-screen min-h-screen bg-gray-100 grid place-content-center">
    <div class="bg-white rounded-md px-10 py-8">
        <h2 class="text-3xl mb-4 font-bold">Register</h2>
        <p class="mb-4">
            Create your account. It's free and only take a minute
        </p>
        <form action="signin.php" method="POST" class="flex flex-col gap-4" onsubmit="return validatePassword()">
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="firstname" placeholder="Firstname"
                    class="border border-gray-400 px-6 py-4 rounded" required>
                <input type="text" name="lastname" placeholder="Surname"
                    class="border border-gray-400 px-6 py-4 rounded" required>
            </div>
            <div>
                <input type="email" name="email" placeholder="Email"
                    class="border border-gray-400 rounded-md px-6 py-4 w-full" required>
            </div>
            <div>
                <input type="text" name="address" placeholder="Address"
                    class="border border-gray-400 rounded-md px-6 py-4 w-full" required>
            </div>
            <div>
                <input type="number" name="phone-number" placeholder="Phone number"
                    class="border border-gray-400 rounded-md px-6 py-4 w-full" required>
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password"
                    class="border border-gray-400 rounded-md px-6 py-4 w-full" required>
            </div>
            <div>
                <input type="password" name="confirm-password" id="confirm_password" placeholder="Confirm Password"
                    class="border border-gray-400 rounded-md px-6 py-4 w-full" required>
            </div>
            <div class="flex gap-4">
                <label for="document">Document</label>
                <input type="file" name="document" accept=".jpg,.jpeg" required>
            </div>
            <div class="flex gap-4">
                <label for="profile">Profile Picture</label>
                <input type="file" name="profile" accept=".jpg,.jpeg">
            </div>
            <div class="flex gap-2">
                <input type="checkbox" name="terms" class="border border-gray-400" required>
                <span>
                    I accept the <a href="#" class="text-skyblue-800 font-semibold">Terms of Use</a> & <a href="#"
                        class="text-skyblue-800 font-semibold">Privacy Policy</a>
                </span>
            </div>
            <div>
                <input type="submit" name="submit"
                    class="border-2 border-indigo-600 bg-indigo-600 text-white px-6 py-4 w-full rounded-md hover:bg-transparent hover:text-indigo-600 font-semibold"
                    value="Sign In" />
            </div>
        </form>
        <div class="flex justify-end mt-1">
            <a href="login.php" class="text-indigo-600 hover:underline font-bold">Already have an account?
                Log In</a>
        </div>
    </div>
</div>



<script>
function validatePassword() {
    let password = document.getElementById("password")
    let confirm_password = document.getElementById("confirm_password");

    if (password.value != confirm_password.value) {
        alert("Passwords Don't Match");
        return false
    }
    return true
}
</script>

<?php
include('includes/footer.php')
?>