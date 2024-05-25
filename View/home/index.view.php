<?php require 'View/partials/header.php'; ?>
<link rel="stylesheet" href="../View/assets/css/general.css">
<link rel="stylesheet" href="../View/assets/css/media_query_600.css">
<link rel="stylesheet" href="../View/assets/css/media_query_900.css">
<link rel="stylesheet" href="../View/assets/css/mobile.css">

<div class="container">
    <!-- kani nga panel kay naa diri ang button para navigate to food, drinks, ect..  -->
    <nav>
      <button id="btn-food">FOOD</button>
      <button id="btn-drink">DRINKS</button>
      <button id="btn-dessert">DESSERT</button>
      <button id="btn-snack">SNACKS</button>
      <button id="btn-logout">LOG OUT</button>
    </nav>
    <!-- mao ni ang panel nga naay menu items -->
    <main>
        <?php foreach($properties as $property) : ?>
            <div class="itemMenu">
                <div class="imgContainer">
                <img src="<?= $property['product_image'] ?>" alt="<?= $property['product_name'] ?>" class="fitCover">
                <div class="item-name">
                    <h1 id="product_name"><?= $property['product_name'] ?></h1>
                    <span id="product_price"><?= $property['product_price'] ?></span>
                </div>
            </div>
            <div class="orderContainer">
            <div id="action" class="quantityPanel">
                <button id="decrement_button">-</button>
                <div id="product_quantity" class="amount">0</div>
                <button id="increment_button">+</button>
                </div>
                    <button id="add_product_orderpanel" class="placeOrder">Add</button>
                </div>
            </div>
        <?php endforeach; ?>
      <!-- if mag add og lain nga item sa menu, copy lang ang div nga naay class 
      nga itemMenu
      pwede ra gamitan og JavaScript sa pag add.
      apila nalang sad ang mga class para naa na design daan-->
    </main>
    <!-- ari nga panel makita ang gi order nimo og ang total -->
    <aside>
        <!-- pwede diri ma cancel ang order  -->
        <div id="orderPanel" class="orderPanel">
        
        </div>

        <div class="totalPanel">
            <div id="display_total_amount" class="total" value="0">
                <h4 id="Total_amount">0</h4>
                <button id="check_out_button">Check out</button>
                
            </div>
        </div>
    </aside>

</div>

<div id="modal">
    <form id="form_container" action="/index.php/" method="POST">
        <div>
            <h1>PAYMENT</h1>
        </div>
        <input type="hidden" name="casher" value="">
        <input id="modal_receipt" type="hidden" name="receipt" value="">
        <label>
            Total : 
            <input id="modal_display_total" type="number" name="total" value="" readonly>
        </label>
        <label>
            Cash :
            <input id="modal_customer_pay" type="number" name="customer_pay" value="" required>
        </label>
        <input type="submit">
        <button type="button" id="modal_cancel">Cancel</button>
    </form>
</div>

<script src="../View/assets/js/index.js"></script>
<?php require 'View/partials/footer.php'; ?>

