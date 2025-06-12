<div class="flex w-full overflow-hidden">
    <div class="fromz min-w-full h-screen flex justify-center items-center" id="login">
        <div id="" class="w-1/3 h-[65%] bg-white rounded-3xl shadow-lg border-9 border-gray-100 px-3.5">
            <div class="font-semibold text-center text-2xl pt-10">Welcome Back!</div>
            <div class="w-full flex justify-center">
                <div class="w-3/4 text-center font-medium text-lg">Keep conected with login your account. Let us
                    know you.</div>
            </div>
            <form action="login.php" method="POST">
                <label id="txtUser" class="absolute hidden ml-3 px-0.5 pt-2 text-xs bg-white">Username</label>
                <input type="text" name="userLogin" id="userInput" required placeholder="<?= $msgusername ?>"
                    class="w-full border border-gray-400 rounded-md py-1 mt-4 px-3 focus:outline-none focus:border-green-500">
                <div id="txtPass" class="absolute ml-3 px-0.5 pt-1.5 hidden text-xs bg-white">Password</div>
                <input type="password" name="passwordLogin" id="passInput" required placeholder="<?= $msgpw ?>"
                    class="w-full border border-gray-400 rounded-md py-1 mt-3 px-3 focus:outline-none focus:border-green-500">
                <button type="submit"
                    class="mt-3 py-1 w-full bg-green-400 rounded-md text-lg font-bold text-white">Login</button>
            </form>
            <div class="text-center font-medium py-1">or</div>
            <div class="flex w-full gap-x-2 justify-center">
                <a href="" class="flex gap-x-2 border border-gray-500 rounded-lg px-3.5 py-1.5">
                    <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy"
                        alt="google logo">
                    <span class="text-[17px] font-medium">Login with Google</span>
                </a>
            </div>
            <div class="flex justify-center pt-2 gap-x-1">
                <div class="pt-7 font-medium">Don't have a account?</div>
                <div id="btn" class="cursor-pointer text-blue-500 font-medium pt-7">Register</div>
            </div>
        </div>
    </div>

    <div class="from absolute min-w-full h-screen flex justify-center items-center" id="register">
        <div id="" class="w-1/3 h-[65%] bg-white rounded-3xl shadow-lg border-9 border-gray-200 px-3.5">
            <div class="font-semibold text-center text-2xl pt-10">Welcome Bro!</div>
            <div class="w-full flex justify-center">
                <div class="w-3/4 text-center font-medium text-lg">Let's make new account for you dawg.</div>
            </div>
            <form action="login.php" method="POST">
                <label id="txtName1" class="absolute hidden ml-3 px-0.5 pt-2 text-xs bg-white">Nama</label>
                <input type="text" name="name" id="nameInput1" required placeholder="<?= $msgname ?>"
                    class="w-full border border-gray-400 rounded-md py-1 mt-4 px-3 focus:outline-none focus:border-green-500">
                <div>
                    <label id="txtUser1" class="absolute hidden ml-3 px-0.5 pt-2 text-xs bg-white">Username</label>
                    <input type="text" name="user" id="userInput1" required placeholder="<?= $msgusername ?>"
                        class="w-full border border-gray-400 rounded-md py-1 mt-4 px-3 focus:outline-none focus:border-green-500">
                </div>
                <div id="txtPass1" class="absolute ml-3 px-0.5 pt-1.5 hidden text-xs bg-white">Password</div>
                <input type="password" name="password" id="passInput1" required placeholder="<?= $msgpw ?>"
                    class="w-full border border-gray-400 rounded-md py-1 mt-3 px-3 focus:outline-none focus:border-green-500">
                <button name="create" type="submit"
                    class="mt-3 py-1 w-full bg-green-400 rounded-md text-lg font-bold text-white">Sign
                    up</button>
            </form>
            <div class="flex justify-center pt-9 gap-x-1">
                <div class="pt-6 font-medium">Have an account?</div>
                <div id="btn2" class="cursor-pointer text-blue-500 font-medium pt-6">Login</div>
            </div>
        </div>
    </div>
</div>