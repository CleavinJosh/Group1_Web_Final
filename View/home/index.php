<?php require 'modal.php'?>

<?php require 'View/partials/header.php'; ?>

<div class="container">
    <!-- kani nga panel kay naa diri ang button para navigate to food, drinks, ect..  -->
    <nav>
      <button id="btn-food">FOOD</button>
      <button id="btn-drink">DRINKS</button>
      <button id="btn-dessert">DESSERT</button>
      <button id="btn-snack">SNACKS</button>
    </nav>
    <!-- mao ni ang panel nga naay menu items -->
    <main>
        <?php for($let = 0; $let < 4; $let++) : ?>
        <div class="itemMenu">
            <div class="imgContainer">
            <img src="../View/assets/img/spag.jpg" alt="MYSELF" class="fitCover">
            <div class="item-name">
                <h1 id="product_name">spaghetti</h1>
                <span id="product_price">50.00</span>
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
        <?php endfor; ?>
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

<script src="../View/assets/js/index.js"></script>
<?php require 'View/partials/footer.php'; ?>

