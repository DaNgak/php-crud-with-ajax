<?php 
    require_once "../config/core.php";

    if ( isset($_GET["id"]) ){
        $id = $_GET["id"];
        $query = "SELECT * FROM user WHERE id = $id";
        $result = mysqli_query($connect, $query);
        $data = mysqli_fetch_assoc($result);
    }

?>
<h3 style="margin-top: 1rem;">Edit Data <?= $data["username"] ?></h3>
<form method="POST">
    <input type="hidden" id="id" name="id" value="<?= $data["id"] ?>">
	<label for="username">Username</label>
	<input type="text" id="username" value="<?= $data["username"] ?>" required>
	<br>
	<label for="password">Password</label>
	<input type="text" id="password" value="<?= $data["password"] ?>" required>
	<br><br>
    <button type="button" style="margin-right: 2rem;" onclick="cancelEdit('page')">Cancel Edit</button>
	<button type="button" onclick="ajaxData('update', 'post', 'component/update.php', 'page', 'message', 'id=' + document.getElementById('id').value +'&username=' + document.getElementById('username').value + '&password=' + document.getElementById('password').value + '&submit=')">Submit</button>
</form>