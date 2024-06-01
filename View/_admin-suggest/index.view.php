<?php require 'View/partials/header.php'; ?>
<link rel="stylesheet" href="../View/assets/css/create_report.css">

<section id="contact">
  
    <h1 class="section-header">SUGGESTION</h1>

    <div class="contact-wrapper">

    <!-- Left contact page --> 

        <form id="contact-form" class="form-horizontal" role="form" method="POST" action="/index.php/suggestion">
            
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" placeholder="NAME" name="name" value="" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <input type="email" class="form-control" id="email" placeholder="EMAIL" name="email" value="" required>
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 10px;">
                <div class="col-sm-12">
                    <label style="color: white;">
                        TYPE : 
                        <select name="type_suggestion" id="email" required>
                            <option name="type_suggestion" value="SUGGESTION">SUGGESTION</option>
                            <option name="type_suggestion" value="REPORT">REPORT</option>
                            <option name="type_suggestion" value="MENU">ADD TO MENU</option>
                        </select>
                    </label>
                    
                </div>
            </div>

            <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" required minlength="3" maxlength="255" required></textarea>
            
            <button class="btn btn-primary send-button" id="submit" type="submit" value="SEND">
                <div class="alt-send-button">
                    <i class="fa fa-paper-plane"></i><span class="send-text">SEND</span>
                </div>
            </button>

            <button id="back_to_login" class="btn btn-primary send-button" type="button">
                <div class="alt-send-button">
                    <i class="fa fa-paper-plane"></i><span class="send-text">BACK TO LOGIN</span>
                </div>
            </button>
            
        </form>

    <!-- Left contact page --> 

        <div class="direct-contact-container">

            <ul class="contact-list">
                <li class="list-item"><i class="fa fa-map-marker fa-2x"><span class="contact-text">Talamban Rd, Cebu City 6000 Cebu</span></i></li>
                
                <li class="list-item"><i class="fa fa-phone fa-2x"><span class="contact-text"><a href="tel:1-212-555-5555" title="Give me a call">0912348952</a></span></i></li>
                
                <li class="list-item"><i class="fa fa-envelope fa-2x"><span class="contact-text"><a href="mailto:#" title="Send me an email">citeBoys@gmail.com</a></span></i></li>
                
            </ul>

            <hr>
            <ul class="social-media-list">
            </ul>
            <hr>

            <div class="copyright">&copy; ALL OF THE RIGHTS RESERVED</div>

        </div>

    </div>

</section>

<script src="../View/assets/js/admin_suggest.js"></script>
<?php require 'View/partials/footer.php'; ?>