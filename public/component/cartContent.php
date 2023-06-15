<?php
loadCartFromDatabase();
$totalItems = count($_SESSION['cart']);
$cartItems = getCartItems();

?>

<div class="cart__content relative z-50" id="cart">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping
                                        cart
                                    </h2>
                                    <p>Your items :
                                        <?= $totalItems ?>
                                    </p>
                                </div>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                        id="btn-close-cart">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        <?php foreach ($cartItems as $index => $item) {
                                            $quantity = $item['quantity'];
                                            ?>
                                            <li class="">
                                                <form action="" method="POST" class="flex py-6">
                                                    <div
                                                        class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <input type="text" name="item_index"
                                                            value="<?php echo $index; ?>">
                                                        <img src="../uploads/products/<?= $item['image'] ?>"
                                                            class="h-full w-full object-cover object-center">
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div
                                                                class="flex justify-between text-base font-medium text-gray-900">
                                                                <h3>
                                                                    <a href="#">
                                                                        <?= $item['product_name'] ?>
                                                                    </a>
                                                                </h3>
                                                                <div>
                                                                    <p class="ml-4">
                                                                        <?= f_idr($item['price']) ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                            <p class="mt-1 text-sm text-gray-500">
                                                                <?= $item['category_id'] ?>
                                                            </p>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm">
                                                            <div class="flex gap-2 items-center">
                                                                <span>Qty :</span>
                                                                <button type="submit" name="update_quantity"
                                                                    value="decrease" <?php echo ($quantity <= 1) ? 'disabled' : ''; ?>
                                                                    class="border px-2 py-1 cursor-pointer rounded-sm"><i
                                                                        class='bx bx-minus'></i></button>
                                                                <span class="text-gray-500">
                                                                    <?= $quantity ?>
                                                                </span>
                                                                <button type="submit" name="update_quantity"
                                                                    value="increase"
                                                                    class="border px-2 py-1 cursor-pointer rounded-sm"><i
                                                                        class='bx bx-plus'></i></button>
                                                            </div>
                                                            <div class="flex">
                                                                <button type="submit" name="remove_from_cart"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p>$262.00</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="mt-6">
                                <a href="#"
                                    class="flex items-center justify-center rounded-md border border-transparent bg-[#222] px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-[#444]">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>