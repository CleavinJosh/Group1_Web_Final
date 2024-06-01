<?php require 'View/partials/header.php'; ?>
<link rel="stylesheet" href="../View/assets/css/register.css">
<link rel="stylesheet" href="../View/assets/css/register_media.css">

<header class="header">
    <h1 class="page-title">Register to CITE's Canteen</h1>
</header>
<main>
    <form class="register-form-container" action="/index.php/registration" method="POST">
        <div class="top-form">
            <section>
                <h2 class="form-title">Personal Information</h2>
                <fieldset class="personal-information-form-container general-container">
                    <label class="form-label top-in-the-list">
                        First name
                        <div>
                            <input name="firstname" class="form-box" type="text" required value="<?= $_SESSION['registration']['regfirstname'] ?? ''?>">
                        </div>
                    </label>
                    <label class="form-label">
                        Middle name
                        <div>
                            <input name="middle_name" class="form-box" type="text" required value="<?= $_SESSION['registration']['regMiddlename'] ?? ''?>">
                        </div>
                    </label>
                    <label class="form-label">
                        Last name
                        <div>
                            <input name="lastname" class="form-box" type="text" required value="<?= $_SESSION['registration']['regLastname'] ?? ''?>">
                        </div>
                    </label>
                    <label class="form-label">
                        Birthdate
                        <div>
                            <input name="birthdate" class="form-box" type="date" required value="<?= $_SESSION['registration']['regBirthdate'] ?? ''?>">
                        </div>
                    </label>
                    <label class="form-label">
                        Email
                        <div>
                            <input name="email" class="form-box last-form-box" type="email" required value="<?= $_SESSION['registration']['regEmail'] ?? ''?>">
                        </div>
                    </label>
                </fieldset>
            </section>

            <section>
                <h2 class="form-title">Account Details</h2>
                <?php if(!empty($_SESSION['registration'])) : ?>
                    <h2 style="color: red;">username is already exist</h2>
                <?php endif; ?>
                <fieldset class="account-details-form-container general-container">
                    <label class="form-label">
                        Username
                        <div>
                            <input name="username" class="form-box username-form-box" type="text" required>
                        </div>
                    </label>
                    <label class="form-label">
                        Password
                        <div>
                            <input name="password" class="form-box password-form-box last-form-box" type="password" required value="<?= $_SESSION['registration']['regPassword'] ?? ''?>">
                        </div>
                    </label>
                </fieldset>
            </section>
        </div>

        <div class="bottom-form">
            <section class="cancel-and-create-buttons-container">
                <button id="cancel_button" type="button" class="form-button cancel-button">Cancel</button>
                <button type="submit" class="form-button create-button">Create account</button>
                <a class="login-link" href="/index.php/login">Already have an account? Login now</a>
            </section>    
        </div>
    </form>
</main>

<script src="../View/assets/js/registration.js"></script>
<?php require 'View/partials/footer.php'; ?>