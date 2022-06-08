<?php 
	print '
	<h1>Obrazac za kontakt</h1>
	<div id="contact">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.6377551108703!2d16.047203115775602!3d45.818512717751844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476678715a5b6369%3A0x3d6fbf00ba235321!2sTrnava!5e0!3m2!1sen!2shr!4v1649955747230!5m2!1sen!2shr" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
		<form action="send-contact1.html" id="contact_form" name="contact_form" method="POST">
			<label for="fname">Ime *</label>
			<input type="text" id="fname" name="firstname" placeholder="Unesite Vaše ime.." required >
			
			<label for="lname">Prezime *</label>
			<input type="text" id="lname" name="lastname" placeholder="Unesite Vaše prezime.." required>
				
			<label for="email"> E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Unesite Vašu e-mail adresu.." required>

			<label for="country">Zemlja</label>
			<select id="country" name="country">
				<option value="">Odaberite</option>
				<option value="BE">Belgija</option>
				<option value="HR" selected>Hrvatska</option>
				<option value="LU">Luksemburg</option>
				<option value="HU">Madarska</option>
			</select>

			<label for="subject">Upit</label>
			<textarea id="subject" name="subject" placeholder="Unesite Vaš upit.." style="height:200px"></textarea>

			<input type="submit" value="Pošalji upit">
		</form>
	</div>';
?>