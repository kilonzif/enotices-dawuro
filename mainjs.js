function preview(event){
	var reader = new FileReader();
	reader.onload = function () {
		var output = document.getElementById('view');
		output.style.display = 'block';
		document.getElementById('eventimage').style.padding = "10px 0px";
		output.src = reader.result;
	}
	reader.readAsDataURL(event.target.files[0]);
}

function validate(){
    //alert("Clicked");
	eventtitle = document.getElementById('eventtitle').value;
	eventcat = document.getElementById('eventcategories').value;
	description = document.getElementById('eventdescription').value;
	eventdate = document.getElementById('eventdate').value;
	eventtime = document.getElementById('eventtime').value;
    eventvenue = document.getElementById('eventvenue').value;
	image = document.getElementById('eventimage').value;

	if(eventtitle == '' || eventcat == '' || description == '' 
        || eventdate == '' || eventtime == '' || eventvenue == ''){
		alert('Please enter all the details');
		return false;
	}
	else
		return true;
}

$(document).ready(function(e){
    $(".form-group").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'uploadevent.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#submitbut').attr("disabled","disabled");
                $('.form-group').css("opacity",".5");
            },
            success: function(msg){
                $('#status').html('');
                if(msg == 'ok'){
                    $('.form-group')[0].reset();
                    $('#status').html('<span style="font-size:18px;color:#34A853">Event was successfully added.</span>');
                }else{
                    $('#status').html(msg);
                }
                $('.form-group').css("opacity","");
                $("#submitbut").removeAttr("disabled");
            }
        });
    });
    
    //file type validation
    $("#eventimage").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#eventimage").val('');
            return false;
        }
    });
});
