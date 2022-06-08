<?php 
	print '
	<h1>Registracija korisnika</h1>
	<div id="register">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">Ime *</label>
			<input type="text" id="fname" name="firstname" placeholder="Unesi ime.." required>

			<label for="lname">Prezime *</label>
			<input type="text" id="lname" name="lastname" placeholder="Unesi prezime.." required>
				
			<label for="email">Your E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Unesi e-mail.." required>
			
			<label for="username">Korisnicko ime * <small>(Korisnicko ime mora sadržavati min 5 i max 10 znakova)</small></label>
			<input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Korisnicko ime.." required><br>
			
									
			<label for="password">Lozinka * <small>(Lozinka mora sadržavati min 4 znaka)</small></label>
			<input type="password" id="password" name="password" placeholder="Lozinka.." pattern=".{4,}" required>

			<label for="country">Zemlja </label>
			<select name="country" id="country">
				<option value="">molimo odaberite</option>';
				#Select all countries from database webprog, table countries
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
			print '
			</select>

			<input type="submit" value="Potvrdi">
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT count(*) as count FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$query .= " OR username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ((int)$row['count'] == 0) {
			# password_hash https://secure.php.net/manual/en/function.password-hash.php
			# password_hash() creates a new password hash using a strong one-way hashing algorithm
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
			
			$query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
			$query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "')";
			$result = @mysqli_query($MySQL, $query);
			
			# ucfirst() — Make a string's first character uppercase
			# strtolower() - Make a string lowercase
			echo '<p>' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', hvala na registraciji! </p>
			<hr>';
		}
		else {
			echo '<p>Korisnik s ovim korisičkim imenom već postoji!</p>';
		}
	}
	print '
	</div>';
?>