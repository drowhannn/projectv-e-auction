<?php
session_start();
include('includes/header.php');
include('conn.php');

if ($_SESSION['toast-success'] != null) {
    echo '<script>toastr.success("' . $_SESSION['toast-success'] . '")</script>';
    $_SESSION['toast-success'] = null;
}

if (isset($POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['isLoggedIn'] = true;
        header('Location: home.php');
    } else {
        header('Location: login.php');
    }
}



?>
<div class="w-screen h-screen grid place-content-center bg-gray-100">
    <form action="login.php" method="POST" class=" w-[500px] p-6 flex flex-col gap-4 shadow-lg bg-white rounded-md border">
        <h1 class="text-3xl flex gap-4 justify-center font-semibold">
            <i class="fa-solid fa-user"></i> <span class="uppercase">Log In</span>
        </h1>
        <hr class="mt-3" />
        <div class="mt-3">
            <label for="username" class="block text-base mb-2">Username</label>
            <input type="text" id="username" class="border w-full text-base px-6 py-4 rounded-md focus:outline-none focus:border-gray-600" placeholder="Enter Username" />
        </div>
        <div class="mt-3">
            <label for="password" class="block text-base mb-2">Password</label>
            <input type="password" id="password" class="border w-full text-base px-6 py-4 rounded-md focus:outline-none focus:border-gray-600" placeholder="Enter password" />
        </div>
        <div class="mt-3 flex justify-between items-center">
            <div>
                <input type="checkbox" id="remember" class="mr-2" />
                <label for="remember" class="text-gray-600 text-sm">Remember Me</label>
            </div>
            <div>
                <a href="#" class="text-indigo-800 font-semibold">
                    Forgot Password?</a>
            </div>
        </div>
        <div class="mt-5">
            <button type="submit" class="border-2 border-indigo-600 bg-indigo-600 text-white py-3  w-full rounded-md hover:bg-transparent hover:text-indigo-700 font-semibold">
                Log In
            </button>
            <hr>
            <div class="flex items-center gap-2 mt-2">
                <a href="signin.php" class="text-indigo-600  bg-white-700 hover:underline py-1  rounded hover:bg-transparent hover:text-indigo-600 font-semibold">
                    Not a member? Sign
                    In</a>
            </div>
        </div>
    </form>
</div>

<?php
include('includes/footer.php')
?>