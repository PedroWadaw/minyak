 <?php
// Create connection
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'pbl');

// SQL query to get top 4 rows ordered by qty descending
// $sql = "SELECT nama_produk, qty FROM produk ORDER BY qty DESC LIMIT 4";

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     echo "<h2>Top 4 Produk berdasarkan Qty Terbanyak</h2>";
//     echo "<table border='1' cellpadding='8' cellspacing='0'>";
//     echo "<tr><th>Nama Produk</th><th>Qty</th></tr>";
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "<tr><td>" . htmlspecialchars($row["nama_produk"]) . "</td><td>" . intval($row["qty"]) . "</td></tr>";
//     }
//     echo "</table>";
// } else {
//     echo "Tidak ada data.";
// }

// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="website icon" type="png" href="asset/img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style/dashboard.css">
    <style>
        #orderPopup {
            display: none;
            /* Sembunyikan popup secara default */
        }

        #orderPopup.active {
            display: flex;
            /* Tampilkan popup saat aktif */
        }

        #orderPopup img {
            max-width: 100%;
            height: 54vh;
        }
    </style>
</head>

<body style="font-family: Montserrat;">
    <div id="orderPopup" class="hidden fixed w-full inset-0 bg-white z-1000 bg-opacity-50">
        <div class="bg-white border-t border-gray-300 mt-[8vh] p-5 h-full shadow-lg w-full">
            <div class="pb-2" aria-label="Breadcrumb">
                <ol class="flex items-center gap-1 text-sm">
                    <li>
                        <a href="index.html" class="block transition-colors hover:font-medium"> Home </a>
                    </li>

                    <li class="rtl:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </li>

                    <li>
                        <a href="#" id="nameProduct" class="block font-medium"></a>
                    </li>
                </ol>
            </div>
            <div class="flex w-full">
                <img id="popupProductImage" src="" alt="Product Image" class="w-4/10 h-full object-cover mr-4">
                <div class="flex flex-col w-[30%] justify-between">
                    <div>
                        <p><span class="text-3xl italic font-semibold pt-2" id="popupProductName"></span></p>
                        <p><span class="text-xl font-semibold pt-2" id="popupProductCat"></span></p>
                        <span class="text-2xl text-green-500 font-semibold" id="popupProductPrice"></span>
                        <p><span class="text-xl font-semibold pt-2">Deskripsi produk : </span></p>
                        <div class="font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, cumque
                            magni! At cumque maiores corporis quis, facilis laborum eligendi sint autem eaque
                            accusantium laboriosam ducimus? Fugit perferendis quia iste iusto.</div>
                    </div>
                    <div class="">
                        <button id="closePopup" class="bg-gray-300 px-4 py-2 font-semibold rounded">Cancel</button>
                    </div>
                </div>
                <div class="w-[27%] ml-6">
                    <div class="border mt-5 rounded-xl border-gray-300 p-5 h-auto">
                        <div class="font-semibold text-lg pb-1">Jumlah : </div>
                        <div class="flex">
                            <button class="p-0.5 text-3xl w-10 bg-gray-300" id="minus">-</button>
                            <input type="number" id="productQuantity" value="1" min="1"
                                class="border py-0.5 pl-11 w-24 text-xl font-semibold">
                            <button class="p-0.5 text-3xl w-10 bg-gray-300" id="plus">+</button>
                        </div>
                        <p class="text-xl pt-1 font-semibold">Harga Total: <span class="text-xl font-semibold"
                                id="popupTotalPrice"></span></p>
                        <button id="buyNowButton"
                            class="bg-green-500 text-white px-4 mt-1 w-full py-2 font-semibold rounded">Beli
                            Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="p-4 h-full w-full">
                <div class=" text-xl font-semibold ">Kenapa beli di toko kami?</div>
                <div class="text-lg font-medium">Dengan membeli di toko kami tanpa sadar kamu berperan dalam :</div>
                <div class="text-lg font-medium">- Menggerakan ekonomi bangsa lewat umkm,</div>
                <div class="text-lg font-medium">- Menjaga budaya kita tetap hidup,</div>
                <div class="text-lg font-medium">- Satu pembelianmu, jadi harapan besar bagi kami untuk terus berkembang
                    kedepannya.</div>
            </div>
        </div>
    </div>


    <div class="box bg-green-900 lg:block hidden">
        <div class="w-full h-dvh">
            <nav class="h-[9dvh] fixed w-full top-0 z-1000 flex justify-between bg-transparent pl-6 pr-5">
                <div class="flex gap-x-2 pt-4.5">
                    <img src="asset/img/logo.png" alt="" class="pb-2.5">
                    <div class="text-[20px] font-bold pt-0.5">Oleh-Oleh Nusantara</div>
                    <a href="produk-page.html" class="text-[18.5px] pt-1 font-medium cursor-pointer">Shop</a>
                    <!-- <div class="text-[18.5px] pt-1 font-medium cursor-pointer pr-3">Gallery</div> -->
                    <a href="about.html" class="text-[18.5px] pt-1 font-medium cursor-pointer">About</a>
                    <div class="text-[18.5px] pt-1 font-medium cursor-pointer">Product</div>
                </div>
                <div class="flex pt-4 pb-2.5">
                    <div class="items-center flex pt-0.5 text-[18px] font-medium" id="acc"></div>
                    <!-- <img src="https://icon-library.com/images/member-icon-png/member-icon-png-4.jpg" alt=""
                        class="pt-1 w-7 h-8 mx-2.5"> -->
                    <a href="login.php" class="text-[18px] pt-1 font-semibold cursor-pointer">
                        Sign in</a>
                    <!-- <div class=" text-[18px] pt-1 font-medium cursor-pointer">
                        Logout</div> -->
                </div>
            </nav>

            <div class="w-full h-dvh top-0 overflow-hidden absolute">
                <div class="slides-wrapper flex w-full">
                    <img src="asset/img/img1.jpg" alt="Beautiful Landscape 2" class="slide cursor-pointer"
                        onclick="window.location.href = 'produk-page.html#beauty'" />
                    <img src="asset/img/img2.jpg" class="slide cursor-pointer"
                        onclick="window.location.href = 'produk-page.html#food'" />
                    <img src="asset/img/img3.jpg" alt="Beautiful Landscape 4" class="slide cursor-pointer"
                        onclick="window.location.href = 'produk-page.html#cake'" />
                </div>
                <button class="prev" aria-label="Previous Slide flex justify-content items-center"></button>
                <button class="next" aria-label="Next Slide flex justify-content items-center"></button>
            </div>
        </div>

        <div class="bg-white overflow-hidden">
            <div id="under" class="w-full flex flex-col items-center bg-white">
                <div class="pt-10 text-center w-2/3">
                    <div class="text-[40px] font-bold pb-5 text-red-800">Let's grow up together.</div>
                    <div class="pb-2 text-[19px] font-medium">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Cum
                        voluptatum itaque repudiandae quia suscipit facilis sunt quidem facere consequatur labore,
                        blanditiis possimus ipsa amet beatae laudantium eius quaerat mollitia? Dolorum.
                    </div>
                    <div class="font-medium text-[19px]">Kita mempunyai beberapa jenis produk yang dipasarkan yakni
                        healthy &
                        beauty,
                        healthy food, cake, drink, dan t-shirt.</div>
                    <div class="text-2xl font-semibold pt-5">Member of</div>
                    <div class="flex justify-center">
                        <img src="asset/img/solo.jpg" alt="" class="pl-2 w-80">
                    </div>
                </div>

                <div class="flex pt-5 pb-8 h-dvh gap-x-5 w-full overflow-hidden">
                    <img src="tess/food1.jpg" alt="" class="w-[30%]">

                    <div class="h-full max-w-[35%] h-full">
                        <img src="tess/snack2.jpg" alt="" class="h-[50%] w-full pb-5">
                        <div class="flex max-w-full h-[50%] gap-x-5">
                            <img src="tess/tshirt.jpg" alt="" class="h-full w-[50%]">
                            <img src="tess/snack.jpg" alt="" class="h-full w-[50%]">
                        </div>
                    </div>
                    <div class="h-full max-w-[35%] h-full">
                        <div class="flex max-w-full h-[50%] gap-x-5">
                            <img src="tess/cake.jpg" alt="" class="h-full w-[50%]">
                            <img src="tess/drink.jpg" alt="" class="h-full w-[50%]">
                        </div>
                        <img src="tess/snack2.jpg" alt="" class="h-[50%] w-full pt-5">
                    </div>
                </div>


                <div id="product-section" class="pb-7 pt-5 bg-gray-100 border-t border-gray-300">
                    <div class="text-center text-2xl pb-3 font-semibold">Produk Terlaris</div>
                    <div class="gap-x-7 flex justify-center">
                        <div class="underline text-xl font-medium cursor-pointer" id="beautybtn">Healthy & Beauty</div>
                        <div class="text-xl font-medium cursor-pointer" id="foodbtn">Healthy Food</div>
                        <div class="text-xl font-medium cursor-pointer" id="cakebtn">Cake</div>
                        <div class="text-xl font-medium cursor-pointer" id="drinkbtn">Drink</div>
                        <div class="text-xl font-medium cursor-pointer" id="tshirtbtn">T-Shirt</div>
                    </div>

                    <div id="beautyProduct" class="">
                        <div class="grid grid-cols-4 gap-x-8 px-20 pt-7">
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/samurai-anime-girl-katana-kimono-sci-fi-4k-wallpaper-uhdpaper.com-311@5@d.jpg"
                                            alt="" class="product-img min-w-full min-h-full object-cover">
                                    </div>
                                </div>
                                <div class="px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap Datuk 150ml
                                </div>
                                <div class="px-3 font-semibold text-lg">Rp 75.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    200ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 100.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    250ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 150.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    325ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 200.000</div>
                            </div>
                        </div>
                    </div>

                    <div id="foodProduct" class="hidden">
                        <div class="grid grid-cols-4 gap-x-8 px-20 pt-7">
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class="px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap Datuk 150ml
                                </div>
                                <div class="px-3 font-semibold text-lg">Rp 75.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    200ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 100.000</div>
                            </div>
                        </div>
                    </div>

                    <div id="drinkProduct" class="hidden">
                        <div class="grid grid-cols-4 gap-x-8 px-20 pt-7">
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/samurai-anime-girl-katana-kimono-sci-fi-4k-wallpaper-uhdpaper.com-311@5@d.jpg"
                                            alt="" class="product-img min-w-full min-h-full object-cover">
                                    </div>
                                </div>
                                <div class="px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara</div>
                                <div class="px-3 font-semibold text-lg">Rp 75.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    200ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 100.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    250ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 150.000</div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1000"
                                class="card cursor-pointer border border-gray-300 bg-white rounded-md hover:shadow-lg h-86 overflow-hidden">
                                <div
                                    class="z-index-100 inner-card transition-transform duration-300 ease-in-out hover:scale-105 h-[72%] overflow-hidden">
                                    <div class="h-full">
                                        <img src="asset/img/def.png" alt=""
                                            class="product-img min-w-full max-h-full object-cover">
                                    </div>
                                </div>
                                <div class=" px-3 pt-3 font-medium h-14.5 text-[16px]">Minyak Nusantara Cap
                                    Datuk
                                    325ml</div>
                                <div class="px-3 font-semibold text-lg">Rp 200.000</div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-center mt-4">
                        <button onclick="window.location.href = 'produk-page.html'"
                            class="font-semibold border border-gray-400 hover:shadow-lg hover:font-bold px-8 py-1 rounded-2xl cursor-pointer">LIHAT
                            SEMUA</button>
                    </div>
                </div>

            </div>

            <div class="w-full bg-gray-100">
                <div class="mx-24 border border-gray-200">
                    <div class="flex bg-green-50">
                        <div class="w-1/2">
                            <img src="asset/1dadc849-9456-4653-8754-665704b8d4c5 (1).jpeg" alt="">
                        </div>
                        <a href="produk-page.html#beauty" class="w-1/2 px-7 py-10" data-aos="fade-left"
                            data-aos-duration="1000">
                            <div class="kanan text-2xl font-semibold">Beauty & Healthy</div>
                            <div class="kanan pt-5 text-lg font-medium">Lorem ipsum dolor sit amet,
                                consectetur adipisicing
                                elit. Eaque quidem est labore atque reprehenderit voluptate fuga expedita totam,
                                consectetur, ea molestiae quo doloremque ipsam ratione? Voluptatum harum unde impedit
                                quo.</div>
                        </a>
                    </div>
                    <div class="flex bg-green-50">
                        <a href="produk-page.html#drink" class="w-1/2 px-7 py-10" data-aos="fade-right"
                            data-aos-duration="1000">
                            <div class="kiri text-2xl font-semibold">Drink</div>
                            <div class="kiri pt-5 text-lg font-medium">Lorem ipsum dolor sit amet,
                                consectetur
                                adipisicing elit. Eaque quidem est labore atque reprehenderit voluptate fuga
                                expedita totam, consectetur, ea molestiae quo doloremque ipsam ratione? Voluptatum
                                harum unde impedit quo.</div>
                        </a>
                        <div class="w-1/2">
                            <img src="asset/760eae5c88e587c80d8a06b2f9c278dc (1).jpg" alt="">
                        </div>
                    </div>
                    <div class="flex bg-green-50">
                        <div class="w-1/2">
                            <img src="asset/1dadc849-9456-4653-8754-665704b8d4c5 (1).jpeg" alt="">
                        </div>
                        <a href="produk-page.html#food" class="w-1/2 px-7 py-10" data-aos="fade-left"
                            data-aos-duration="1000">
                            <div class="kanan text-2xl font-semibold">Healthy Food</div>
                            <div class="kanan pt-5 text-lg font-medium">Lorem ipsum dolor sit amet,
                                consectetur
                                adipisicing elit. Eaque quidem est labore atque reprehenderit voluptate fuga
                                expedita totam, consectetur, ea molestiae quo doloremque ipsam ratione? Voluptatum
                                harum unde impedit quo.</div>
                        </a>
                    </div>
                    <div class="flex bg-green-50">
                        <a href="produk-page.html#cake" class="w-1/2 px-7 py-10" data-aos="fade-right"
                            data-aos-duration="1000">
                            <div class="kanan text-2xl font-semibold">Cake</div>
                            <div class="kanan pt-5 text-lg font-medium">Lorem ipsum dolor sit
                                amet, consectetur
                                adipisicing elit. Eaque quidem est labore atque reprehenderit voluptate fuga
                                expedita totam, consectetur, ea molestiae quo doloremque ipsam ratione? Voluptatum
                                harum unde impedit quo.</div>
                        </a>
                        <div class="w-1/2">
                            <img src="asset/760eae5c88e587c80d8a06b2f9c278dc (1).jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slideshow-container pt-15 pb-3 w-full rounded-b-[40px] bg-gray-100 overflow-hidden relative"
            id="slideLogo">
            <div class="slideshow-track flex" aria-label="Logo slideshow">
                <img src="asset/img/logo1.png" alt="Logo 1" />
                <img src="asset/img/logo2.png" alt="Logo 2" />
                <img src="asset/img/logo3.png" alt="Logo 3" />
                <img src="asset/img/logo4.png" alt="Logo 4" />
                <img src="asset/img/logo5.png" alt="Logo 5" />

                <img src="asset/img/logo1.png" alt="Logo 1" />
                <img src="asset/img/logo2.png" alt="Logo 2" />
                <img src="asset/img/logo3.png" alt="Logo 3" />
                <img src="asset/img/logo4.png" alt="Logo 4" />
                <img src="asset/img/logo5.png" alt="Logo 5" />

                <img src="asset/img/logo1.png" alt="Logo 1" />
                <img src="asset/img/logo2.png" alt="Logo 2" />
                <img src="asset/img/logo3.png" alt="Logo 3" />
                <img src="asset/img/logo4.png" alt="Logo 4" />
                <img src="asset/img/logo5.png" alt="Logo 5" />

                <img src="asset/img/logo1.png" alt="Logo 1" />
                <img src="asset/img/logo2.png" alt="Logo 2" />
                <img src="asset/img/logo3.png" alt="Logo 3" />
                <img src="asset/img/logo4.png" alt="Logo 4" />
                <img src="asset/img/logo5.png" alt="Logo 5" />

                <img src="asset/img/logo1.png" alt="Logo 1" />
                <img src="asset/img/logo2.png" alt="Logo 2" />
                <img src="asset/img/logo3.png" alt="Logo 3" />
                <img src="asset/img/logo4.png" alt="Logo 4" />
                <img src="asset/img/logo5.png" alt="Logo 5" />
            </div>
        </div>

        <div class="text-white" id="footer">
            <div class="flex justify-between py-5 px-8">
                <div class="flex gap-x-2.5">
                    <img src="asset/img/logo-white.png" alt="" class="w-10 h-11">
                    <div class="pt-2 text-xl font-semibold">Oleh-oleh Nusantara</div>
                </div>
                <div class="flex gap-x-13 pt-1.5">
                    <div class="">
                        <div class="text-center text-[17px] font-medium">Follow us</div>
                        <div class="flex gap-x-3">
                            <img src="asset/img/footer1.png" alt="" class="w-7 cursor-pointer">
                            <a href="https://instagram.com/jkt48.delynn">
                                <img src="asset/img/footer2.png" alt="" class="w-7 cursor-pointer">
                            </a>
                            <img src="asset/img/footer3.png" alt="" class="w-7 cursor-pointer">
                            <img src="asset/img/footer4.png" alt="" class="w-7 cursor-pointer">
                            <img src="asset/img/footer5.png" alt="" class="w-7 cursor-pointer">
                        </div>
                    </div>
                    <div class="">
                        <a href="index.html" class="font-medium cursor-pointer text-center text-[17px]">Home</a>
                        <div class="font-medium cursor-pointer text-[17px]">About Us</div>
                    </div>
                    <div class="text-center pr-3">
                        <div class="font-medium cursor-pointer text-[17px]">Blog</div>
                        <div class="font-medium cursor-pointer text-[17px]">Contact Us</div>
                        <div class="font-medium cursor-pointer text-[17px]">Feedback</div>
                        <div class="font-medium cursor-pointer text-[17px]">Bug Report</div>
                    </div>
                </div>
            </div>
            <div class="pb-5 text-center font-medium text-[15px]">© 2025 Oleh-oleh Nusantara. All right reserved.
            </div>
        </div>
    </div>




    <script src="js/js.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init();
        });
    </script>
    <script>
        window.addEventListener("pageshow", function (event) {
            console.log("pageshow event fired", event.persisted);
            if (event.persisted || (window.performance && window.performance.getEntriesByType("navigation")[0].type === "back_forward")) {
                AOS.init();
                AOS.refresh();
            }
        });
    </script>
    <script>
        window.addEventListener("pageshow", function (event) {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>

</html>