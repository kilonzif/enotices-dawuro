var slideIndex = 0;
showSlides();
wasReloaded = false;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("myslides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
    	slideIndex = 1;
        wasReloaded = true;
        //showSlides();
    }
    else{
        wasReloaded = false;
    }
    slides[slideIndex-1].style.display = "block";
    //slideIndex = 1;
    if(wasReloaded){
        slideIndex = 2;
        loadAgain();
    }
    setTimeout(showSlides, 2000);

} 

function loadAgain(){
	$.ajax({ 
	  type: 'POST', 
	  url: "realtime.php", 
	       // call php function , phpFunction=function Name , x= parameter  
	  data: {}, 
	  success: function(data1){ 
	  	document.getElementById('content').innerHTML = data1;
	  } 
	}); 
}
