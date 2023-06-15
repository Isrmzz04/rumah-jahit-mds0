<?php
require './koneksi/inc_koneksi.php';

?>

<section class="relative z-[100]">
    <div class="fixed inset-0 bg-[#222] bg-opacity-50 transition-opacity"></div>
    <div class="fixed inset-0 overflow-hidden grid place-items-center">
        <div class="relative flex bg-white rounded-lg flex-col justify-center px-6 py-12 lg:px-[4rem]">
            <a href="./" class="absolute right-[20px] top-[10px] text-2xl"><i class='bx bx-x'></i></a>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" method="POST">
                    <div>
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                        <div class="mt-2">
                            <input id="username" name="username" type="text" autocomplete="username" required
                                class="bg-[#f6f6f6] block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="bg-[#f6f6f6] block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit" name="login"
                            class="flex w-full justify-center rounded-md bg-[#222] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    Do you not have an account?
                    <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign up</a>
                </p>
            </div>
        </div>

    </div>
</section>
<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = $conn->query("SELECT * FROM customers WHERE username = '$username' AND password = '$password'");
    $row = $sql->fetch_assoc();
    if ($sql->num_rows) {
        session_start();
        $_SESSION['customer_id'] = $row['customer_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        header('location:./');
    } else {
        header('location:?error_login');
    }
}

?>