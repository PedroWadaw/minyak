if (location.hash === "#beauty") {
    const beauty = document.getElementById("beauty-side");
    const all = document.getElementById("all-side");
    const beautyPage = document.getElementById("beautyProduct");
    const allPage = document.getElementById("allProduct");
    if (beauty) {
        beauty.classList.add("underline");
        all.classList.remove("underline");
        beautyPage.classList.remove("hidden");
        allPage.classList.add("hidden");
    }
}

if (location.hash === "#food") {
    const food = document.getElementById("food-side");
    const all = document.getElementById("all-side");
    const foodPage = document.getElementById("foodProduct");
    const allPage = document.getElementById("allProduct");
    if (food) {
        food.classList.add("underline");
        all.classList.remove("underline");
        foodPage.classList.remove("hidden");
        allPage.classList.add("hidden");
    }
}

if (location.hash === "#cake") {
    const cake = document.getElementById("cake-side");
    const all = document.getElementById("all-side");
    const cakePage = document.getElementById("cakeProduct");
    const allPage = document.getElementById("allProduct");
    if (cake) {
        cake.classList.add("underline");
        all.classList.remove("underline");
        cakePage.classList.remove("hidden");
        allPage.classList.add("hidden");
    }
}

const all = document.getElementById("all-side");
const allPage = document.getElementById("allProduct");
const beauty = document.getElementById("beauty-side");
const beautyPage = document.getElementById("beautyProduct");
const food = document.getElementById("food-side");
const foodPage = document.getElementById("foodProduct");
const cake = document.getElementById("cake-side");
const cakePage = document.getElementById("cakeProduct");
const drink = document.getElementById("drink-side");
const drinkPage = document.getElementById("drinkProduct");
const tshirt = document.getElementById("tshirt-side");
const tshirtPage = document.getElementById("tshirtProduct");

all.addEventListener("click", () => {
    all.classList.add("underline");
    [beauty, food, tshirt, cake, drink].forEach(btn => btn.classList.remove("underline"));
    allPage.classList.remove("hidden");
    [beautyPage, foodPage, tshirtPage, cakePage, drinkPage].forEach(page => page.classList.add("hidden"));
})
beauty.addEventListener("click", () => {
    beauty.classList.add("underline");
    [food, all, tshirt, cake, drink].forEach(btn => btn.classList.remove("underline"));
    beautyPage.classList.remove("hidden");
    [allPage, foodPage, tshirtPage, cakePage, drinkPage].forEach(page => page.classList.add("hidden"));
})
food.addEventListener("click", () => {
    food.classList.add("underline");
    [tshirt, all, beauty, cake, drink].forEach(btn => btn.classList.remove("underline"));
    foodPage.classList.remove("hidden");
    [beautyPage, allPage, tshirtPage, cakePage, drinkPage].forEach(page => page.classList.add("hidden"));
})
cake.addEventListener("click", () => {
    cake.classList.add("underline");
    [food, all, beauty, tshirt, drink].forEach(btn => btn.classList.remove("underline"));
    cakePage.classList.remove("hidden");
    [beautyPage, foodPage, tshirtPage, allPage, drinkPage].forEach(page => page.classList.add("hidden"));
})
drink.addEventListener("click", () => {
    drink.classList.add("underline");
    [food, all, beauty, cake, tshirt].forEach(btn => btn.classList.remove("underline"));
    drinkPage.classList.remove("hidden");
    [beautyPage, foodPage, tshirtPage, cakePage, allPage].forEach(page => page.classList.add("hidden"));
})
tshirt.addEventListener("click", () => {
    tshirt.classList.add("underline");
    [food, beauty, cake, drink, all].forEach(btn => btn.classList.remove("underline"));
    tshirtPage.classList.remove("hidden");
    [beautyPage, foodPage, allPage, cakePage, drinkPage].forEach(page => page.classList.add("hidden"));
})

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
