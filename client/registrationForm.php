<form method="post" action="">
    <div class="form-row justify-content-around">
        <div class="col-md-6 mb-5 ">

	<label for="nm">Name</label><br>
	<input type="text" name="name" class="form-control" id="nm" value="<?php print $name; ?>"/><?php print $ename; ?><br><br>

	<label for="pn">Contact</label><br><br>
	<input type="text" name="contact" class="form-control" id="pn" value="<?php print $contact; ?>"/><?php print $econtact; ?><br><br>

	<label for="ml">Email</label><br>
	<input type="text" name="email" class="form-control" id="ml" value="<?php print $email; ?>"/><?php print $eemail; ?><br><br>

	<label for="ps">Password</label><br>
	<input type="password" name="password" class="form-control" id="ps" value=""/><?php print $epassword; ?><br><br>
	
	<label for="rps">Retype Password</label><br>
	<input type="password" name="passwordReType" class="form-control" id="rps" value=""/><?php print $epasswordReType; ?><br><br>


	<input type="submit" class="btn btn-success form-control" name="submit" value="Submit"/>

        </div>
    </div>
</form>