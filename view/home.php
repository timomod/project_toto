<table class="table table-striped">
<tr>
	<caption>Testing the HEADER-CAPTION</caption>
	<th>Session Name</th>
	<th>Session Number</th>
	<th>Start Date</th>
	<th>End Date</th>
	<th>Location</th>
</tr>

<?php foreach ($sessionsInfo as $key => $session) : ?>
	<tr>
		<td><?= $session['tra_name'] ?></td>
		<td><?= $session['ses_number'] ?></td>
		<td><?= $session['ses_start_date'] ?></td>
		<td><?= $session['ses_end_date'] ?></td>
		<td><?= $session['loc_name'] ?></td>

	</tr>



<?php endforeach ;?>
</table>


