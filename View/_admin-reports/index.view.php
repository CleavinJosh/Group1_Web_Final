<?php require 'View/partials/header.php'; ?>
<link rel="stylesheet" href="../View/assets/css/report_style.css">

<header>

    <div class="img-container">
        <img src="../View/assets/img/citeboys.png" alt="cite logo">
    </div>
    <h1>CITE BOIS CANTEEN</h1>

</header>

<nav>

    <button id="reports" >REPORTS</button>
    <button id="suggestion" >SUGGESTIONS</button>
    <button id="add_to_menu" >ADD TO MENU</button>
    <button id="back_to_admin" >BACK TO ADMIN</button>

</nav>

<main>

    <table border="1">
        <thead>
            <tr>
                <th>DATE</th>
                <th>TYPE</th>
                <th>EMAIL</th>
                <th>MESSAGE</th>
            </tr>
        </thead>
        

        <!-- sample rowsss  -->
        <tbody>
        <?php foreach($results as $result) : ?>
            <tr>
                <td><?= $result['date_created'] ?></td>
                <td><?= $result['type_report'] ?></td>
                <td><?= $result['email'] ?></td>
                <td class="last-data">
                    <p><?= $result['suggestion'] ?></p>
                    <div class="eye-container">
                        <button id="view_report">
                            <img src="../View/assets/img/eye.jpg" alt="eye image">
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        

    </table>

</main>


<div id="modal_container">

    <div id="modal">
        <div id="moda_head">
                <H1>REPORT</H1>
        </div>
        <div id="moda_body">
                <div class="content"></div>
        </div>
        <div id="moda_footer">
                <button id="remove_modal">BACK</button>
        </div>
    </div>
   
</div>

<script src="../View/assets/js/admin_report.js"></script>
<?php require 'View/partials/footer.php'; ?>