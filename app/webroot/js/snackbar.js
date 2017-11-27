
// <!-- The actual snackbar -->

function showSnackbar() {
	var msg = document.getElementById('snackbar');

	msg.className = "show"; 

	setTimeout(function() {
		msg.className.replace("show", "")
	}, 3000);
}

