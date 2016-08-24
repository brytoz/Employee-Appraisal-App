function myfunction() {
	this1 = document.getElementById('name-validate');
	if (this1.value != null) {
		if (
				!(
						( this1.value.charCodeAt(this1.value.length - 1) >= 65 && this1.value.charCodeAt(this1.value.length - 1) <= 90 ) ||
						( this1.value.charCodeAt(this1.value.length - 1) >= 97 && this1.value.charCodeAt(this1.value.length - 1) <= 122 ) || 
						( this1.value.charCodeAt(this1.value.length - 1) == 32 )
				 )
			){
			this1.value = this1.value.substring(0, this1.value.length - 1);
		}
	}
}

function setDate(){
	var date = new Date();
	var day = date.getDate();
	var month = date.getMonth() + 1;
	var year = date.getFullYear();
	
	if(month < 10) {
		month = "0" + month;
	}
	
	if(day < 10) {
		day = "0" + day;
	}
	
	var today = year + "-" + month + "-" + day;
	
	var x = document.getElementsByClassName("today-date");
	var i;
	for (i = 0; i < x.length; i++) {
	    x[i].value = today;
	}
	//document.getElementById('today-date').value = today;
}
