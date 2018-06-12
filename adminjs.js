var isOpen = "home";
function allEvents(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("right").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET", "loadall.php", true);
        xmlhttp.send();
}

function approvedEvents(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("right").innerHTML = this.responseText;
                isOpen = 'approved';
            }
        };
        xmlhttp.open("GET", "loadapproved.php", true);
        xmlhttp.send();
}

function unapprovedEvents(){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("right").innerHTML = this.responseText;
                isOpen = "unapproved"
            }
        };
        xmlhttp.open("GET", "loadunapproved.php", true);
        xmlhttp.send();
}

function approve(num){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if(isOpen == 'approved')
            		approvedEvents();
            	else
            		unapprovedEvents();

            }
        };
        xmlhttp.open("GET", "approve.php?q=" + num.toString(), true);
        xmlhttp.send();
}

function unapprove(num){
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if(isOpen == 'approved')
            		approvedEvents();
            	else
            		unapprovedEvents();
            }
        };
        xmlhttp.open("GET", "unapprove.php?q=" + num.toString(), true);
        xmlhttp.send();
}

function deleteit(num){
	var xmlhttp = new XMLHttpRequest();
	yes = confirm("Are you sure you want to delete this event?");
	if (yes) {
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	if(isOpen == 'approved')
            		approvedEvents();
            	else
            		unapprovedEvents();
            }
        };
        xmlhttp.open("GET", "delete.php?q=" + num.toString(), true);
        xmlhttp.send();
    }
}

function loadcategories(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	document.getElementById("right").innerHTML = this.responseText;
        	isOpen = 'home';
        }
    };
    xmlhttp.open("GET", "categories.php", true);
    xmlhttp.send();
}