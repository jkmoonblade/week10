function buttonAlert() {
	alert("Clicked!");
}

function changeColor() {
	var form_id = "thecolor";
	var form = document.getElementById(form_id);

	var div_id = "div01";
	var div = document.getElementById(div_id);

	var color = form.value;
	div.style.backgroundColor = color;
}