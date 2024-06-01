<?php require 'View/partials/header.php'; ?>
<link rel="stylesheet" href="../View/assets/css/login.css">
<link rel="stylesheet" href="../View/assets/css/login_media.css">

<section class="welcome-message-container">
    <!-- <h1 class="welcome-message">Welcome to <span class="white-greeting">CITE's Canteen</span></h1> -->
    <img class="cite-boys-logo" src="../View/assets/img/citeboys.png" alt="cite boys logo">
</section>

<div class="login-form-container-container">
    <section class="login-form-container">   
        <form class="login-form" action="/index.php/login" method="POST">
        <?php if( !empty($_SESSION['login'])) :?>
            <h4 style="color: red; font-size: 1rem;"><?= $_SESSION['login']['error'] ?></h4>
        <?php endif;?>    
            <label class="form-label">
                Username
                <div>
                    <input name="username" class="form-input-box" type="text" required value="<?= $_SESSION['login']['oldUsername'] ?? ''?>">
                </div>
            </label>
            <label class="form-label">
                Password
                <div>
                    <input name="password" class="form-input-box" type="password" required>
                </div>
            </label>
            
            <div class="forgot-password-link-and-login-button-container">
                <a href="/index.php/suggestion" class="forgot-password-link">Suggestion?</a>
                <button class="login-button" type="submit">Login</button>
            </div>
            
            <div>
                <a class="create-an-account-link" href="/index.php/registration">Don't have an account? Create one</a>
            </div>
        </form>
    </section>
</div>

<?php require 'View/partials/footer.php'; ?>