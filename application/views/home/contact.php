<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">Contact</h2>
    </div>
</div>
<!--//end-banner-->
<!--/contact-->
<div class="section-contact">
    <div class="container">
        <div class="contact-main">
            <div class="col-md-6 contact-in">
                <h5>Lorem ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolor.</h5>
                <p class="para1">Lorem ipsum dolor sit amet. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident,
                    sunt in culpa qui officia deserunt mollit anim id est laborum.Contrary to popular belief, Lorem
                    Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,
                    making it over 2000 years old. </p>
                <div class="more-address">
                    <address>
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P :</abbr> (123) 456-7890
                    </address>
                    <address>
                        <strong>Full Name</strong><br>
                        <a href="mailto:info@example.com">mail@example.com</a>
                    </address>
                </div>
            </div>
            <div class="col-md-6 contact-grid">
                <form method="post">
                    <p class="your-para">Your Name :</p>
                    <input type="text" name="senderName" value="" onfocus="this.value='';"
                           onblur="if (this.value == '') {this.value ='';}">
                    <p class="your-para">Your Mail :</p>
                    <input type="text" name="senderEmail" value="" onfocus="this.value='';"
                           onblur="if (this.value == '') {this.value ='';}">
                    <p class="your-para">Your Message :</p>
                    <textarea name="message" cols="77" rows="6" onfocus="this.value='';"
                              onblur="if (this.value == '') {this.value = '';}"></textarea>
                    <div class="send">
                        <input type="submit" value="Send">
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--map-->
        <h3 class="h-tittle">Find Us</h3>
        <div class="map">
            <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ7VLy65NkLEcRVTvjVCTnAMQ&key=AIzaSyD33cbxo_fXU5gnzc6FwnjeWZyo9ySvkWQ" allowfullscreen></iframe>
        </div>
        <div class="map-bottom">
            <div class="col-md-12 adrs-left">
                <p>Zhytomyr, Ukraine</p>
            </div>
            <div class="clearfix"></div>
        </div>

        <!--//map-->
    </div>
</div>

<script>
    window.onload = loadMap();
</script>