<h3 style="margin-top: 1rem;">Tambah Data</h3>
<form method="POST">
	<label for="username">Username</label>
	<input type="text" id="username" required>
	<br>
	<label for="password">Password</label>
	<input type="text" id="password" required>
	<br><br>
    <button type="button" style="margin-right: 2rem;" onclick="document.getElementById('page').innerHTML = ''">Cancel Tambah Data</button>
	<button type="button" onclick="ajaxData('insert', 'post', 'component/insert.php', 'page', 'message', 'username=' + document.getElementById('username').value + '&password=' + document.getElementById('password').value + '&submit=')">Submit</button>
</form>
