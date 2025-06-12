const txtname1 = document.getElementById("txtName1");
const nameInput1 = document.getElementById("nameInput1");
const txtuser1 = document.getElementById("txtUser1");
const userInput1 = document.getElementById("userInput1");
const txtpass1 = document.getElementById("txtPass1");
const passInput1 = document.getElementById("passInput1");
const txtuser = document.getElementById("txtUser");
const userInput = document.getElementById("userInput");
const txtpass = document.getElementById("txtPass");
const passInput = document.getElementById("passInput");
const create = document.getElementById("create");

userInput.addEventListener("input", () => {
    txtuser.classList.toggle("hidden", userInput.value === "");
});

passInput.addEventListener("input", () => {
    txtpass.classList.toggle("hidden", passInput.value === "");
})

nameInput1.addEventListener("input", () => {
    txtname1.classList.toggle("hidden", nameInput1.value === "");
})

userInput1.addEventListener("input", () => {
    txtuser1.classList.toggle("hidden", userInput1.value === "");
});

passInput1.addEventListener("input", () => {
    txtpass1.classList.toggle("hidden", passInput1.value === "");
})

const btn = document.getElementById("btn");
const btn2 = document.getElementById("btn2");
const login = document.getElementById("login");
const register = document.getElementById("register");

btn.addEventListener("click", () => {
    register.classList.remove("from");
    register.classList.add("to");
    login.classList.remove("fromz");
    login.classList.add("toz");
})

btn2.addEventListener("click", () => {
    register.classList.remove("to");
    register.classList.add("from");
    login.classList.remove("toz");
    login.classList.add("fromz");
})

const txtname1Mob = document.getElementById("txtName1Mob");
const nameInput1Mob = document.getElementById("nameInput1Mob");
const txtuser1Mob = document.getElementById("txtUser1Mob");
const userInput1Mob = document.getElementById("userInput1Mob");
const txtpass1Mob = document.getElementById("txtPass1Mob");
const passInput1Mob = document.getElementById("passInput1Mob");
const txtuserMob = document.getElementById("txtUserMob");
const userInputMob = document.getElementById("userInputMob");
const txtpassMob = document.getElementById("txtPassMob");
const passInputMob = document.getElementById("passInputMob");

userInputMob.addEventListener("input", () => {
    txtuserMob.classList.toggle("hidden", userInputMob.value === "");
});

passInputMob.addEventListener("input", () => {
    txtpassMob.classList.toggle("hidden", passInputMob.value === "");
});

nameInput1Mob.addEventListener("input", () => {
    txtname1Mob.classList.toggle("hidden", nameInput1Mob.value === "");
});

userInput1Mob.addEventListener("input", () => {
    txtuser1Mob.classList.toggle("hidden", userInput1Mob.value === "");
});

passInput1Mob.addEventListener("input", () => {
    txtpass1Mob.classList.toggle("hidden", passInput1Mob.value === "");
})

const btnMob = document.getElementById("btnMob");
const btn2Mob = document.getElementById("btn2Mob");
const createMobile = document.getElementById("createMobile");
const loginMob = document.getElementById("loginMob");
const registerMob = document.getElementById("registerMob");

btnMob.addEventListener("click", () => {
    registerMob.classList.remove("from");
    registerMob.classList.add("to");
    loginMob.classList.remove("fromz");
    loginMob.classList.add("toz");
})

btn2Mob.addEventListener("click", () => {
    registerMob.classList.remove("to");
    registerMob.classList.add("from");
    loginMob.classList.remove("toz");
    loginMob.classList.add("fromz");
})

createMobile.addEventListener("click", () => {
    registerMob.classList.remove("to");
    registerMob.classList.add("from");
    loginMob.classList.remove("toz");
    loginMob.classList.add("fromz");
})