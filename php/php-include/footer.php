<?php 
function output_footer() {
    $current_year = date("Y"); 
    echo <<<FOOTER
    <div class="container">
            <div class="footer-info">
                <h2 class="footer-heading">Get in Touch</h2>
                <address>
                    <p><i class="fas fa-envelope"></i> Email: <a href="mailto:bb537@live.mdx.ac.uk">bb537@live.mdx.ac.uk</a></p>
                    <p><i class="fas fa-phone-square"></i> Phone: 0201 234 5678</p>
                </address>
            </div>
            <div class="copyright"><small>&copy; Copyright $current_year - All rights reserved</small></div>
        </div>
FOOTER;
} // end function 
?>