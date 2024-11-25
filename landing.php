<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Animate.css CDN -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .bg-titiknol {
            background-image: url('bg-titiknol.png');
        }

        .bg-lppd {
            background-image: url('bg-lppd.png');
        }
    </style>
</head>

<body>
    <div class="h-screen w-full bg-yellow-300 bg-cover bg-center z-[1] bg-titiknol relative">
        <div class="bg-gradient-to-t from-[#002E3D]/90 to-[#00B5EF]/30 from-10% w-full h-full absolute z-[2]"></div>
        <div class="z-[10] flex justify-center items-center h-full relative">
            <!-- Isi Page -->
            <div class="flex flex-col gap-5">
                <div class="w-[100px] h-[100px] bg-contain bg-no-repeat bg-center self-center bg-lppd"></div>
                <div class="text-white text-center">
                    <div
                        class="font-semibold text-[1.25rem] animate__animated animate__bounce animate__delay-2s animate__infinite animate__slower">
                        LPPD <br />
                    </div>
                    Pemerintahan Provinsi Jawa Timur
                </div>
                <a href="login.php" class="text-center text-white bg-[#00B5EF] rounded-md py-2 hover:contrast-[1.2]">Masuk</a>
            </div>
        </div>
    </div>
</body>

</html>