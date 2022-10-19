<?php include "header.php"; ?>
<section class="page-title" style="background-image:url(images/use.jpg)">
		 <div class="auto-container">
		 <div class="clearfix">
			 <div class="pull-left">
				 <div class="title">Welcome to Avon Investment Services LTD</div>
				 <h2>Contact Us</h2>
			 </div>
			 <div class="pull-right">
				 <ul class="page-breadcrumb">
					 <li><a href="index-2.php">home</a></li>
					 <li>Contact Us</li>
				 </ul>
			 </div>
		 </div>
			 </div>
	 </section>
	 <!--End Page Title-->

<script language=javascript>

function checkform() {
if (document.mainform.name.value == '') {
alert("Please type your full name!");
document.mainform.name.focus();
return false;
}
if (document.mainform.email.value == '') {
alert("Please enter your e-mail address!");
document.mainform.email.focus();
return false;
}
if (document.mainform.message.value == '') {
alert("Please type your message!");
document.mainform.message.focus();
return false;
}
return true;
}

</script>
 <!-- Contact Page Section -->
 <section class="contact-page-section">
	 <div class="auto-container">
		 <div class="row clearfix">

			 <!-- Info Column -->
			 <div class="info-column col-lg-5 col-md-12 col-sm-12">
				 <div class="inner-column">
					 <div class="sec-title">
						 <div class="title">Get in Touch</div>
						 <h2>For Any Kind of Help <br> And Informations</h2>
						 <div class="text">We’ll be glad to discuss your situation. <br> So please contact us via the details below, or enter your request.</div>
					 </div>
					 <ul class="list-style-two style-two">
						 <li>
							 <span class="icon flaticon-maps-and-flags"></span>
							 <strong>Head Office Address:</strong>
							 1 Beauchamp Court, 10 Victors Way, Barnet, Hertfordshire, EN5 5TZ
						 </li>

						 <li>
							 <span class="icon flaticon-email-4"></span>
							 <strong>Mail us</strong>
							 support@avonservicesltd.com <br>
							 loan@avonservicesltd.com<br>
							 realestate@avonservicesltd.com
						 </li>
					 </ul>
				 </div>
			 </div>

			 <!-- Form Column -->
			 <div class="form-column col-lg-7 col-md-12 col-sm-12">
				 <div class="inner-column">

					 <!-- Default Form -->

<p></p>
<p></p>
<p></p>
<p></p>
<p></p>

<form method="POST" action="#">
<div class="default-form style-two contact-form">
<div class="row clearfix">

<tr>

<div class="form-group col-md-6 col-sm-6 col-xs-12">

<td><input type="text" name="name" value="" size=30 class=inpts placeholder="Name *" required></td>

</div>

<div class="form-group col-md-6 col-sm-6 col-xs-12">
<td><input type="text" name="email" value="" size=30 class=inpts placeholder="Email *" required></td>

</div>
	<div class="form-group col-md-12 col-sm-12 col-xs-12">
<td colspan=2<br><br><textarea name="message" class=inpts cols=45 rows=4 placeholder="Message"></textarea>
</div>
</tr>
	<div class="form-group col-md-6 col-sm-6 col-xs-12">

</div>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="send_btn" value="Send" class="theme-btn btn-style-one"></td>
</tr>
</div>
</form>

</div>
</div>
</div>

 </section>
<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d58059375.20639987!2d-29.90921640658434!3d27.355001210628778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d6.5765376!2d3.3521663999999998!4m5!1s0x465f9d60acda9975%3A0xebf4db823eeb07bb!2sBryggargatan%204%2C%20111%2021%20Stockholm%2C%20USA!3m2!1d59.333427!2d18.0608059!5e0!3m2!1sen!2sng!4v1603789685444!5m2!1sen!2sng" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<?php include "footer.php" ?>
