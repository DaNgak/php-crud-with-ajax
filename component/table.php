<?php 
	require_once "../config/core.php";

	$query = "SELECT * FROM user";
	$result = mysqli_query($connect, $query);
	$data = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
?>


<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <th>Nomer</th>
        <th>Username</th>
        <th>Password</th>
        <th colspan="2">Action</th>
    </thead>
    <tbody>
        <?php foreach($data as $index => $datasatuan) : ?>
            <tr>
                <td><?= $index+=1 ?></td>
                <td><?= $datasatuan["username"] ?></td>
                <td><?= $datasatuan["password"] ?></td>
                <td><a style="cursor: pointer; color: blue;" onclick="editClick(<?= $datasatuan['id'] ?>, 'page')">edit</a></td>
                <td><a style="cursor: pointer; color: blue;" onclick="confirm('Apakah yakin ?') ? ajaxData('delete', 'post', 'component/delete.php', '', 'message', 'id=' + <?= $datasatuan['id'] ?>) : ''">delete</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
