
<div>
<?php if ($pageNo > 1):?>
		<div class="btn btn-success btn-xs" ><a href="list.php?page=<?= $pageNo - 1 ?>">Back</a></div>
<?php else :?>
		<div class="btn btn-success btn-xs" disabled="disabled"><a href="list.php?page=1>">Back</a></div>	
<?php endif ; ?>

<?php if ($studentCount >=  ($pageOffset + 5)) : ?>
		<div class="btn btn-success btn-xs" ><a href="list.php?page=<?= $pageNo +1 ?>">Next</a></div>
<?php endif ; ?>
</div>	
<table class="table table-striped">

  <tr>
    <th>ID</th>
    <th>Lastname</th>
    <th>Firstname</th>
    <th>email</th>
    <th>D.O.B</th>
    <th></th>
  </tr>
	<?php foreach($resultsList as $key => $student) : ?>
	<tr>
		<td><?= $student['stu_id'] ?></td>	
		<td><?= $student['stu_lastname'] ?></td>	
		<td><?= $student['stu_firstname'] ?></td>	
		<td><?= $student['stu_email'] ?></td>	
		<td><?= $student['stu_birthdate'] ?></td>
		<td><div class="btn btn-success btn-xs"><a href="student.php?stu_id=<?=$student['stu_id']?>">View</a></div></td>			
	</tr>
	
<?php endforeach ;?>
</table>

