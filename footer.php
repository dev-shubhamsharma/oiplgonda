
    <!-- footer section -->

    <footer>
        <section class="left">
            <h2><span class="fa fa-map-marker map-point"></span>Institute address</h2>
            <address>
                <h3>Okeanos Infotech Pvt. Ltd.</h3>
                97, Samarpana, Near ICICI Bank,<br>
                Civil lines, Gonda<br>
                Uttar Pradesh<br>
                India - 271003
            </address>

            <div class="social">
                <span class="fa fa-facebook social-icon"></span>
                <span class="fa fa-instagram social-icon"></span>
                <span class="fa fa-youtube social-icon"></span>
                <span class="fa fa-linkedin social-icon"></span>
                <span class="fa fa-google-plus social-icon"></span>
            </div>

            <p>All rights reserved.<br>Copyright &copy; oipl- <?php  echo $current_year ?> </p>
            <p>Designed & developed by Shubham&nbsp;Sharma</p>
           
        </section>
        
        
        
        <section class="right">
            <h2>Enquiry form</h2>
            

            <form action="process_enquiry.php" autocomplete="off" id="enquiry-form" method="POST">
                <div class="input-container">
                    <label for="name"><span class="required">*</span> Name</label>
                    <input type="text" id="name" name="user_name" placeholder="John Doe" required>
                </div>
                
                <div class="input-container">
                    <label for="email"><span class="required">*</span> Email</label>
                    <input type="email" id="email" name="email_id" placeholder="johndoe@example.com" required>
                </div>
                
                <div class="input-container">
                    <label for="mobile_number"><span class="required">*</span> Mobile Number</label>
                    <input type="number" id="mobile_number" name="mobile_number" placeholder="1122334455" maxlength="10" required>
                </div>

                <div class="input-container">
                    <label for="message"><span class="required">*</span> Message</label>
                    <textarea id="message" name="message" placeholder="Write your message here" rows="5" required></textarea>
                </div>
                
                <div class="input-container">
                    <input type="submit" name="submit_enquiry" id="send-btn" value="Send">
                </div>

                <div id="message-box-overlay" style="display: none;" >
                    <button id="close-btn">&times;</button>
                    <ol id="message-box">
                        
                    </ol>
                </div>

            </form>
        </section>


    </footer>