<?php
session_start();

$error_message = "";

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $captchaInput = $_POST['captchaInput'];

    // Validasi captcha
    if ($captchaInput == $_SESSION['captcha_solution']) {
        // Redirect ke home.php jika captcha benar
        header("Location: home.php");
        exit();
    } else {
        $error_message = "<p class='text-red-500'>Captcha salah! Silakan coba lagi.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="h-screen w-full bg-yellow-300 bg-cover bg-center relative" style="background-image: url('bg-titiknol.png');">
        <div class="bg-gradient-to-t from-[#002E3D]/90 to-[#00B5EF]/30 from-10% w-full h-full absolute"></div>
        <div class="flex justify-center items-center h-full relative z-10">
            <form method="POST" action="" id="loginForm" class="flex flex-col gap-4 text-white w-1/3 bg-white/30 p-6 rounded-lg">
                <h1 class="text-[24px] font-medium text-center">Login</h1>

                <!-- Username -->
                <label for="username" class="flex flex-col gap-2">
                    <span>Username</span>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Masukkan Username"
                        class="rounded-md py-3 px-5 outline-none bg-white/40 placeholder-gray-500 text-black"
                        required />
                </label>

                <!-- Password -->
                <label for="password" class="flex flex-col gap-2">
                    <span>Password</span>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan Password"
                        class="rounded-md py-3 px-5 outline-none bg-white/40 placeholder-gray-500 text-black"
                        required />
                </label>

                <!-- Captcha -->
                <label for="captchaInput" class="flex flex-col">
                    <span class="mb-2">Captcha</span>
                    <div class="flex items-center mb-4">
                        <img src="captcha.php" alt="Captcha" class="mr-4" />
                        <button
                            type="button"
                            onclick="this.previousElementSibling.src='captcha.php?'+Math.random()"
                            class="p-2 bg-[#00B5EF] hover:contrast-125 rounded">
                            Refresh
                        </button>
                    </div>
                    <input
                        type="text"
                        name="captchaInput"
                        id="captchaInput"
                        placeholder="Masukkan Jawaban"
                        class="rounded-md py-3 px-5 outline-none bg-white/40 placeholder-gray-500 text-black"
                        required />
                    <!-- Error Message -->
                    <?php echo $error_message; ?>
                </label>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="text-white bg-[#00B5EF] rounded-md py-2 hover:contrast-125 w-full">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>

</html>