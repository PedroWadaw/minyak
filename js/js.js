// slide 
(function () {
    const slidesWrapper = document.querySelector('.slides-wrapper');
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let currentIndex = 0;
    let slideInterval = null;
    const intervalTime = 2500;

    function showSlide(index) {
        if (index < 0) index = slides.length - 1; if (index >= slides.length) index = 0;
        const offset = -index * 100;
        slidesWrapper.style.transform = `translateX(${offset}%)`;
        dots.forEach((dot, i) => {
            const isActive = i === index;
            dot.classList.toggle('active', isActive);
            dot.setAttribute('aria-selected', isActive ? 'true' : 'false');
            dot.tabIndex = isActive ? 0 : -1;
        });
        currentIndex = index;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    prevBtn.addEventListener('click', () => {
        prevSlide();
        resetInterval();
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
        resetInterval();
    });

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            resetInterval();
        });
        dot.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                showSlide(index);
                resetInterval();
            }
        });
    });

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, intervalTime);
    }

    showSlide(currentIndex);
    slideInterval = setInterval(nextSlide, intervalTime);

})();
// slide end

const beautybtn = document.getElementById("beautybtn");
const foodbtn = document.getElementById("foodbtn");
const cakebtn = document.getElementById("cakebtn");
const drinkbtn = document.getElementById("drinkbtn");
const tshirtbtn = document.getElementById("tshirtbtn");
const beautyPage = document.getElementById("beautyProduct");
const drinkPage = document.getElementById("drinkProduct");
const foodPage = document.getElementById("foodProduct");
// const cakePage = 0;
// const tshirtPage = 0;

beautybtn.addEventListener("click", () => {
    beautyPage.classList.remove("hidden");
    beautybtn.classList.add("underline");
    [foodPage, drinkPage].forEach(Page => Page.classList.add("hidden"));
    [foodbtn, drinkbtn, cakebtn, tshirtbtn].forEach(btn => btn.classList.remove("underline"));
})
foodbtn.addEventListener("click", () => {
    foodPage.classList.remove("hidden");
    [beautyPage, drinkPage].forEach(Page => Page.classList.add("hidden"));
    [beautybtn, drinkbtn, cakebtn, tshirtbtn].forEach(btn => btn.classList.remove("underline"));
    foodbtn.classList.add("underline");
})
drinkbtn.addEventListener("click", () => {
    drinkPage.classList.remove("hidden");
    [beautyPage, foodPage].forEach(Page => Page.classList.add("hidden"));
    drinkbtn.classList.add("underline");
    [foodbtn, beautybtn, cakebtn, tshirtbtn].forEach(btn => btn.classList.remove("underline"));
})
cakebtn.addEventListener("click", () => {
    cakebtn.classList.add("underline");
    [foodbtn, beautybtn, drinkbtn, tshirtbtn].forEach(btn => btn.classList.remove("underline"));
})
tshirtbtn.addEventListener("click", () => {
    tshirtbtn.classList.add("underline");
    [foodbtn, beautybtn, cakebtn, drinkbtn].forEach(btn => btn.classList.remove("underline"));
})

window.addEventListener('scroll', function () {
    const under = document.getElementById('under');
    const underPosition = under.getBoundingClientRect().top;
    const screenPosition = window.innerHeight;
    if (underPosition < screenPosition) { under.classList.add('animate__animated', 'animate__fadeInUp'); }
}); 

window.onscroll = function () {
    var nav = document.querySelector('nav');
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        nav.classList.add('scrolled','border-b','border-gray-300','shadow-md');
    } else {
        nav.classList.remove('scrolled','border-b','border-gray-300','shadow-md');
    }
};

document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function () {

        document.body.classList.add("overflow-hidden");

        function updateTotalPrice() {
            const productPrice = document.getElementById('popupProductPrice').innerText;
            const price = parseFloat(productPrice.replace('Rp ', '').replace('.', '').replace(',', '.'));
            const quantity = parseInt(document.getElementById('productQuantity').value);
            const totalPrice = price * quantity;
            document.getElementById('popupTotalPrice').innerText = 'Rp ' + totalPrice.toLocaleString();
        }

        const productName = this.querySelector('.font-medium').innerText;
        const productPrice = this.querySelector('.text-lg').innerText;
        const productCat = document.querySelector('.underline').innerText;
        const productImage = this.querySelector('.product-img').src;
        const quantityInput = document.getElementById('productQuantity');

        document.getElementById('popupProductName').innerText = productName;
        document.getElementById('nameProduct').innerText = productName;
        document.getElementById('popupProductCat').innerText = "Produk " + productCat;
        document.getElementById('popupProductPrice').innerText = productPrice;
        document.getElementById('popupProductImage').src = productImage;

        document.getElementById('plus').addEventListener('click', function () {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1; 
        updateTotalPrice();
        });

        document.getElementById('minus').addEventListener('click', function () {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1; 
                updateTotalPrice(); 
            }
        });

        document.getElementById('buyNowButton').addEventListener('click', function () {
        let currentValue = parseInt(quantityInput.value);
        const message = currentValue > 1 ? 
            `saya%20beli%20${productName}%20${currentValue}` : 
            `saya%20beli%20${productName}`;
        
        window.location.href = `https://wa.me/+6282147427605?text=${message}`;
        });


        quantityInput.addEventListener('input', function () {
            updateTotalPrice();
        });

        // Tampilkan popup
        document.getElementById('orderPopup').classList.add('active');
        updateTotalPrice();

        document.getElementById('closePopup').addEventListener('click', function () {
            document.getElementById('orderPopup').classList.remove('active');
            quantityInput.value = 1;
            document.body.classList.remove("overflow-hidden");
        });
    });
});



