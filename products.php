<?php

$kaos = "Kaos";
$kemeja = "Kemeja";
$celana = "Celana";
$crewneck = "Crewneck";
$sepatu = "Sepatu";

?>

<section class="w-[90%] m-auto">
    <div class="text-4xl text-[#222] font-semibold text-center mt-[4rem]">Products</div>
    <div class="flex justify-center mt-10">
        <form action="" method="POST" class="flex items-center gap-2">
            <input type="text" name="i" placeholder="Cari product..."
                class="bg-white border p-3 w-96 rounded-2xl text-sm">
            <button type="submit" name="ok" class="text-3xl"><i class='bx bx-search'></i></button>
        </form>
    </div>
    <div class="wrapp-tabs">
        <div class="flex justify-center mt-[3rem]">
            <ul class="buttonTabs flex gap-10 text-[#444]">
                <button>Semua</button>
                <button>Kemeja</button>
                <button>Celana</button>
                <button>Sweater</button>
                <button>Sepatu</button>
            </ul>
        </div>

        <?php
        if (isset($_POST["ok"])) {
            $get_product = $_POST['i'];
            $q = $conn->query("SELECT products.*, categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.category_id WHERE product_name LIKE '%$get_product%'"); ?>
            <div class="flex justify-center gap-5 flex-wrap">
                <?php while ($row = $q->fetch_assoc()) {
                    ?>
                    <div class="card bg-white rounded-lg shadow overflow-hidden w-fit mt-[4rem]">
                        <form action="" method="post">
                            <figure><img src="./public/uploads/products/<?= $row['image'] ?>" alt="" class="w-full h-60" />
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title">
                                    <?= $row['product_name'] ?>
                                    <div class="badge badge-secondary">NEW</div>
                                </h2>
                                <p>
                                    <?= $row['description'] ?>
                                </p>
                                <div class="card-actions flex-col">
                                    <div class="badge badge-outline">
                                        <?= $row['category_name'] ?>
                                    </div>
                                    <div class="flex gap-5 mt-3 justify-end w-full">
                                        <button type="submit" name="add_to_cart"><i class='bx bx-cart'></i></button>
                                        <a href="" class="btn"><i class='bx bx-shopping-bag'></i></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="tabContent mt-[4rem]">
                <div class="flex flex-wrap justify-center gap-5">
                    <?php
                    $data = selectData(
                        'products',
                        '*',
                    );
                    foreach ($data as $row) { ?>
                        <div class="card bg-white rounded-lg shadow overflow-hidden">
                            <form action="" method="POST">
                                <input type="hidden" name="product_id" id="product_id" value="<?= $row['product_id'] ?>"
                                    class="item-field" readonly>
                                <figure><img src="./public/uploads/products/<?= $row['image'] ?>" alt="" class="w-full h-60" />
                                </figure>
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <?= $row['product_name'] ?>
                                        <div class="badge badge-secondary">NEW</div>
                                    </h2>
                                    <p>
                                        <?= $row['description'] ?>
                                    </p>
                                    <div class="card-actions flex-col">
                                        <div class="badge badge-outline">
                                            <?= $row['category_id'] ?>
                                        </div>
                                        <div class="flex gap-5 mt-3 justify-end w-full">
                                            <a href="" class="btn"><i class='bx bx-shopping-bag'></i></a>
                                            <button type="submit" name="add_to_cart" class="btn"><i
                                                    class='bx bx-cart'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>

                </div>
            </div>
            
        <?php } ?>
    </div>

</section>