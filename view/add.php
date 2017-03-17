

<div class="row">
	<div class="col-sm-6">
		<form action="" method="post" enctype="multipart/form-data">
			<?= $warningLastname ?>
			<input  class="form-control" type="text" name="lastname" placeholder="Lastame"><br>
			<?= $warningFirstname ?>
			<input  class="form-control" type="text" name="firstname" placeholder="Firstname"><br>
			<?= $warningDob ?>
			<div class="form-inline">	
				<input  class="form-control" type="number" name="bDay" min="1" max="31" placeholder="dd">&nbsp;
				<input  class="form-control" type="number" name="bMonth" min="1" max="12" placeholder="mm">&nbsp;
				<input  class="form-control" type="number" name="bYear" placeholder="yyyy"><br>
			</div><br>
			<?= $warningEmail ?>
			<input  class="form-control" type="email" name="email" placeholder="email"><br>
			<?= $warningFriendliness ?>
			<select class="form-control" name="friendliness">
					<option value="">-Select Friendliness Level--</option>	
					<option value="1">Avoid at all costs!</option>	
					<option value="2">Minor pain in then butt at times...</option>	
					<option value="3">Okidoki</option>	
					<option value="4">Nice!</option>	
					<option value="5">Well butter my bum and call me a corncob is that ain't the nicest person I've ever met!</option>	
			</select><br>
			<?= $warningSessions ?>
			<!-- Get session number and name to create dropdown -->
			<select class="form-control" name="session" >
				<option value="">--Select a Session--</option>
				<?php foreach ($locationsList as $key => $locInfo) : ?>
		        <option value="<?=  $locInfo['ses_id']  ?>"><?= 'Session '.$locInfo['ses_number'].' : '.$locInfo['tra_name']  ?></option>
		       <?php endforeach ;?>
		    </select><br>
		    <fieldset>
					<input type="hidden" name="submitFile" value="1" />
					<label for="fileForm">Upload image</label>
					<input type="file" name="fileForm" id="fileForm" />
					<p class="help-block">Only jpg, jpeg, gif, svg and png allowed.</p>
					<br />
					
			</fieldset>
		    <!-- SUBMIT -->
		    <input type="submit" class="btn btn-success btn-block"  value="Submit">

			

		

		</form>
	</div>
</div>