<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Page</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-yellow-200 flex h-screen justify-center items-center p-4">

    <!-- Button Previous -->
    <button
        id="prevButton"
        class="h-[10rem] hover:bg-black/10 text-white px-5 text-xl">
        &lt;
    </button>

    <!-- Slider Container -->
    <div class="w-[64rem] h-[10rem] overflow-hidden bg-teal-300 rounded-md relative">
        <!-- Slides -->
        <div id="slidesContainer" class="flex transition-transform duration-300">
            <?php
            // Array URL gambar
            $slides = [
                "bg-titiknol.png",
                "bg1.png",
                "bg2.jpg",

            ];

            // Render slides
            foreach ($slides as $url) {
                echo "
                <div 
                    class='h-[10rem] w-[64rem] flex-shrink-0 bg-cover bg-no-repeat bg-center' 
                    style='background-image: url($url); background-size: 100% 100%;'>
                </div>";
            }
            ?>
        </div>

        <!-- Pagination -->
        <div id="paginationContainer" class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <?php foreach ($slides as $index => $url): ?>
                <button
                    class="w-2 h-2 rounded-full bg-white/50"
                    data-index="<?php echo $index; ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Button Next -->
    <button
        id="nextButton"
        class="h-[10rem] hover:bg-black/10 text-white px-5 text-xl">
        &gt;
    </button>

    <!-- JavaScript -->
    <script>
        const slidesContainer = document.getElementById("slidesContainer");
        const paginationContainer = document.getElementById("paginationContainer");
        const buttons = paginationContainer.querySelectorAll("button");
        const prevButton = document.getElementById("prevButton");
        const nextButton = document.getElementById("nextButton");

        const totalSlides = <?php echo count($slides); ?>;
        let currentIndex = 0;

        // Update slide position and pagination indicator
        function updateSlidePosition() {
            slidesContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
            buttons.forEach((btn, index) => {
                btn.className = index === currentIndex ?
                    "w-2 h-2 rounded-full bg-white" :
                    "w-2 h-2 rounded-full bg-white/50";
            });
        }

        // Previous slide
        prevButton.addEventListener("click", () => {
            currentIndex = currentIndex === 0 ? totalSlides - 1 : currentIndex - 1;
            updateSlidePosition();
        });

        // Next slide
        nextButton.addEventListener("click", () => {
            currentIndex = currentIndex === totalSlides - 1 ? 0 : currentIndex + 1;
            updateSlidePosition();
        });

        // Pagination click
        buttons.forEach((button, index) => {
            button.addEventListener("click", () => {
                currentIndex = index;
                updateSlidePosition();
            });
        });
    </script>
</body>

</html>