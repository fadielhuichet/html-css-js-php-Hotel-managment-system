<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        <?php include "../style.css" ?>
    </style>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php include "../section/header.php" ?>
<div class="">
    <section class="home">
        <div class="content">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="../images/banner-1.png">
                    <div class="text">
                        <h1 id="spnd">Spend Your Holiday</h1>
                        <p>where unforgettable stays meet unbeatable prices. Book your perfect getaway today!</p>
                        <div class="flex">
                            <button class="primary-btn">BOOK YOUR DREAM HOTEL</button>
                            <button class="secondary-btn">CONTACT US</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../images/banner-2.png">
                    <div class="text">
                        <h1 id="spnd">Spend Your Holiday</h1>
                        <p>where unforgettable stays meet unbeatable prices. Book your perfect getaway today!</p>
                        <div class="flex">
                            <button class="primary-btn">BOOK YOUR DREAM HOTEL</button>
                            <button class="secondary-btn">CONTACT US</button>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="../images/banner-3.png">
                    <div class="text">
                        <h1 id="spnd">Spend Your Holiday</h1>
                        <p>where unforgettable stays meet unbeatable prices. Book your perfect getaway today!</p>
                        <div class="flex">
                            <button class="primary-btn">BOOK YOUR DREAM HOTEL</button>
                            <button class="secondary-btn">CONTACT US</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="principale">
            <h1>Find your perfect stay™</h1>
            <form id="search-form">
    <ul class="flex-space designIn">
        <li>
            <span>Your Destination</span><br>
            <input type="search" id="destination-input" name="destination" placeholder="Where are you going?">
            <div id="search"></div>
        </li>
        <li>
            <span>Check In</span><br>
            <input type="date" id="check-in" name="check_in" placeholder="Check-in">
        </li>
        <li>
            <span>Check Out</span><br>
            <input type="date" id="check-out" name="check_out" placeholder="Check-out">
        </li>
        <li>
            <span>Adults</span><br>
            <select id="adults" name="adults">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
        </li>
        <li>
            <span>Kids</span><br>
            <select id="kids" name="kids">
                <option value="0" selected>0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4+</option>
            </select>
        </li>
        <li>
    <span style="visibility: hidden;">Search</span><br> 
    <button class="search-btn" type="submit">Search</button>
        </li>
    </ul>
    </form>
        </div>
        <div class="mostBooked">
        <h1>The Most Rating Hotels</h1>
        <div class="mItems" id="most-rated-hotels">
        </div>
    </div>
    </section>
</div>

 <?php include "../section/footer.php" ?> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        navText: ["<i class='fa fa-chevron-left'>", "<i class='fa fa-chevron-right'>"],
        responsive: {
            0: { items: 1 },
            768: { items: 1 },
            1000: { items: 1 }
        }
    });
</script>
<script src="../Script.js"></script>
</body>
</html>