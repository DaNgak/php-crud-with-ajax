fetchData("component/table.php", "table");

document.getElementById("tambahdata").onclick = function () {
	fetchData("component/forminsert.php", "page");
};

function editClick(id, page) {
	fetchData("component/formupdate.php?id=" + id, page);
	document.getElementById("tambahdata").style.display = "none";
}

function cancelEdit(page) {
	document.getElementById(page).innerHTML = "";
	document.getElementById("tambahdata").style.display = "block";
}

function fetchData(file = null, id = null) {
	if (file != null && id != null) {
		let page = document.getElementById(id);
		fetch(file)
			.then((response) => response.text())
			.then((data) => (page.innerHTML = data));
	}
}

function ajaxData(type = null, method = null, url_or_file = null, page = null, message = null, data = null) {
	if (type != null && method != null && url_or_file != null) {
		let ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function () {
			if (ajax.status == 200 && ajax.readyState == 4) {
				switch (type) {
					case "insert":
						if (ajax.responseText == 1 && ajax.responseText != "") {
							document.getElementById(message).innerHTML = "Data berhasil ditambahkan";
							document.getElementById("tambahdata").style.display = "block";
							document.getElementById(page).innerHTML = "";
							fetchData("component/table.php", "table");
						} else {
							document.getElementById(message).innerHTML = "Data gagal ditambahkan";
						}

						break;
					case "update":
						if ((ajax.responseText == 1 || ajax.responseText == 0) && ajax.responseText != "") {
							if (ajax.responseText == 1) {
								document.getElementById(message).innerHTML = "Data berhasil diupdate";
							} else {
								document.getElementById(message).innerHTML = "Tidak ada data yang diupdate";
							}
							document.getElementById("tambahdata").style.display = "block";
							document.getElementById(page).innerHTML = "";
							fetchData("component/table.php", "table");
						} else {
							document.getElementById(message).innerHTML = "Data gagal diupdate";
						}
						break;
					case "delete":
						if (ajax.responseText == 1 && ajax.responseText != "") {
							document.getElementById(message).innerHTML = "Data berhasil dihapus";
							fetchData("component/table.php", "table");
						} else {
							document.getElementById(message).innerHTML = "Data gagal dihapus";
						}
						break;
					default:
						break;
				}
			}
		};
		ajax.open(method, url_or_file, true);
		if (method == "post" || method == "POST") {
			ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			ajax.send(data);
		} else {
			ajax.send();
		}
	}
}
