//old chart
//window.onload = function () {
   // $.ajax({
     //   url: "a.txt", success: function (result) {
        //    var words = result;
         //   var array = words.split(",");
       //     $("#div1").html(array[0]);
       //     var ctx = document.getElementById("myChart").getContext('2d');
        //    var myChart = new Chart(ctx, {
          //      type: 'pie',
             //   data: {
               //     labels: ["South", "North", "East", "West"],
               //     datasets: [{
                //        backgroundColor: [
                 //         "	#DCDCDC",
                 //         "#DB7093",
                 //         "#778899",
				//		  "#9932CC",
                     //   ],
                     //   data: [array[0], array[1], array[2] ,array[3]]
                  //  }]
              //  },
              //  options: {
                    //  legend: {
                      //   labels: {
                        //    fontColor: 'white' //set your desired color
                        // }
                     // }
                   //}
            //});
       // }
    //});
//}
//new chart
$( document ).ready(function() {

var data = [{
    "name": "Tokyo",
    "data": 3.0
}, {
    "name": "NewYork",
    "data": 2.0
}, {
    "name": "Berlin",
    "data": 3.5
}, {
    "name": "London",
    "data": 1.5
}];
    
// Highcharts requires the y option to be set
$.each(data, function (i, point) {
    point.y = point.data;
    point.color = parseFloat(point.data) > 3 ? '#ff0000' : '#00ff00';
});


var chart = new Highcharts.Chart({

    chart: {
        renderTo: 'container',
        type: 'pie'
    },

    series: [{
        data: data
    }]

});
  
});
//new chart
//audio player
function timer() {
    var duration = document.getElementById('fullDuration');
    var currentTime = document.getElementById('currentTime');
    var audio = document.getElementById('audioPlayer');

    var minutes = parseInt(audio.duration / 60);
    var seconds = parseInt(audio.duration % 60);

    duration.innerHTML = minutes + ':' + seconds;
}
function update() {
    var bar = document.getElementById('defaultBar');
    var progressbar = document.getElementById('progressBar');
    var duration = document.getElementById('fullDuration');
    var currentTime = document.getElementById('currentTime');
    var audio = document.getElementById('audioPlayer');
    if (!audio.ended) {
        var minutes = parseInt(audio.currentTime / 60);
        var seconds = parseInt(audio.currentTime % 60);
        currentTime.innerHTML = minutes + ':' + seconds;

        var size = parsInt(audio.currentTime * barsize / audio.duration);
        progressbar.style.width = size + "px";
    }
    else {
        currentTime.innerHTML = 0.00;
    }
}
function play() {
    timer();
    var audio = document.getElementById('audioPlayer');
    var glyph = document.getElementById('playbutton');
    timer();
    if (!audio.paused) {
        audio.pause();
        $('span.glyphicon-pause').toggleClass('glyphicon-pause , glyphicon-play');
    }
    else {
        audio.play();
        $('span.glyphicon-play').toggleClass('glyphicon-play , glyphicon-pause');
        var updateTime = setInterval(update, 500);
    }
}
function volumeincrease() {
    audio = document.getElementById('audioPlayer');
    if (audio.volume == 0.2) {
        audio.volume = 0.4;
    }
    else if (audio.volume == 0.4) {
        audio.volume = 0.6;
    }
    else if (audio.volume == 0.6) {
        audio.volume = 0.8;
    }
    else if (audio.volume == 0.8) {
        audio.volume = 1;
    }
    else {

    }
}
function volumedecrease() {
    audio = document.getElementById('audioPlayer');
    if (audio.volume == 1) {
        audio.volume = 0.8;
    }
    else if (audio.volume == 0.8) {
        audio.volume = 0.6;
    }
    else if (audio.volume == 0.6) {
        audio.volume = 0.4;
    }
    else if (audio.volume == 0.4) {
        audio.volume = 0.2;
    }
    else {

    }
}
//audio player
function responsivenavbar() {
    var head = document.getElementById("navhead");
	var headelement = document.getElementById("navele");
	var cont = document.getElementById("con");
    if (head.className === "navbarheader") {
        head.className += " responsivenav";
		headelement.className+=" responsivenav";
		cont.className+=" responsivenav";
		
    } 
	else {
        head.className = "navbarheader";
		headelement.className = "navreactive";
		con.className = "content";
    }
}
$(document).ready(function smoothscroll(){
			$("#gallerya").click(function(){
				$('html,body').animate({
					scrollTop: $(".gallery").offset().top},
					'slow');
			});
			$("#homea").click(function(){
				$('html,body').animate({
					scrollTop: $(".home").offset().top},
					'slow');
			});
			$("#donatea").click(function(){
				$('html,body').animate({
					scrollTop: $(".donate").offset().top},
					'slow');
			});
			$("#grapha").click(function () {
			    $('html,body').animate({
			        scrollTop: $(".graph").offset().top
			    },
					'slow');
			});
});
$(document).ready(function selectdesc(){
			$("#thumb-1").click(function(){
				document.getElementById('desc-1').style.display = 'block';
				document.getElementById('desc-2').style.display = 'none';
				document.getElementById('desc-3').style.display = 'none';
				document.getElementById('desc-4').style.display = 'none';
			});
			$("#thumb-2").click(function(){
				document.getElementById('desc-2').style.display = 'block';
				document.getElementById('desc-1').style.display = 'none';
				document.getElementById('desc-3').style.display = 'none';
				document.getElementById('desc-4').style.display = 'none';
			});
			$("#thumb-3").click(function () {
			    document.getElementById('desc-3').style.display = 'block';
			    document.getElementById('desc-1').style.display = 'none';
			    document.getElementById('desc-2').style.display = 'none';
			    document.getElementById('desc-4').style.display = 'none';
			});
			$("#thumb-4").click(function () {
			    document.getElementById('desc-4').style.display = 'block';
			    document.getElementById('desc-1').style.display = 'none';
			    document.getElementById('desc-2').style.display = 'none';
			    document.getElementById('desc-3').style.display = 'none';
			});
});
$(document).ready(function () {
    var elems = document.getElementsByClassName('playercontainer');
    var counter = 0;
    $("#minimize").click(function () {
        if (counter == 0) {
            for (var i = 0; i < elems.length; i += 1) {
                elems[i].style.display = 'none';
            }
            $(".buttonm").addClass('buttonn').removeClass('buttonm');
            counter++;
        } else {
            for (var i = 0; i < elems.length; i += 1) {
                elems[i].style.display = 'block';
            }
            $(".buttonn").addClass('buttonm').removeClass('buttonn');
            counter=0;
        }
    });
});
$(document).ready(function gallerybg(){
	var ngnlaudio = document.getElementById("ngnl"); 
	var counter= 0;
			$("#ngnlimg").click(function(){
				if(counter === 0)
				{
				$('#bg').animate({opacity: 0}, 'slow', function() {
						$(this)
							.css({'background-image': 'url(images/ngnlfull.jpg)'})
							.animate({opacity: 1});
					});
					$(".bubblecolor").addClass('bubblecolorngnl').removeClass('bubblecolor');
					document.body.style.color = "#4169E1";
					ngnlimg.className = " spin";
					ngnlaudio.play();
					$("#thumb-1 *").attr("disabled", "disabled").off('click');
					$("#thumb-2 *").attr("disabled", "disabled").off('click');
					counter++;
				}
				else
				{
					$('#bg').animate({opacity: 0}, 'slow', function() {
						$(this)
							.css({'background-image': 'url(images/bg.jpg)'})
							.animate({opacity: 1});
					});
					$(".bubblecolorngnl").addClass('bubblecolor').removeClass('bubblecolorngnl');
					document.body.style.color = "pink";
					ngnlimg.className = "";
					ngnlaudio.pause();
					ngnlaudio.currentTime = 0;
					counter = 0;
				}
			});
			
});
$(document).ready(function(){
		var yliaaudio = document.getElementById("ylia"); 
		var counter= 0;
				$("#yliaimg").click(function(){
				if(counter === 0)
				{
				$('#bg').animate({opacity: 0}, 'slow', function() {
						$(this)
							.css({'background-image': 'url(images/yliafull.jpg)'})
							.animate({opacity: 1});
					});
					$(".bubblecolor").addClass('bubblecolorylia').removeClass('bubblecolor');
					document.body.style.color = "#FFFF66";
					yliaimg.className = " spin";
					yliaaudio.play();
					counter++;
				}
				else
				{
					$('#bg').animate({opacity: 0}, 'slow', function() {
						$(this)
							.css({'background-image': 'url(images/bg.jpg)'})
							.animate({opacity: 1});
					});
					$(".bubblecolorylia").addClass('bubblecolor').removeClass('bubblecolorylia');
					document.body.style.color = "pink";
					yliaimg.className = "";
					yliaaudio.pause();
					yliaaudio.currentTime = 0;
					counter = 0;
				}
			});
});
$(document).ready(function () {
    var yliaaudio = document.getElementById("ylia");
    var counter = 0;
    $("#fireimg").click(function () {
        if (counter === 0) {
            $('#bg').animate({ opacity: 0 }, 'slow', function () {
                $(this)
                    .css({ 'background-image': 'url(https://d38fgd7fmrcuct.cloudfront.net/bw_1920/bh_1080/pf_1/1_3mgfbh7iq6frfusbmb7u1.jpg)' })
                    .animate({ opacity: 1 });
            });
            $(".bubblecolor").addClass('bubblecolorfire').removeClass('bubblecolor');
            document.body.style.color = "#4169E1";
            fireimg.className = " spin";
            yliaaudio.play();
            counter++;
        }
        else {
            $('#bg').animate({ opacity: 0 }, 'slow', function () {
                $(this)
                    .css({ 'background-image': 'url(images/bg.jpg)' })
                    .animate({ opacity: 1 });
            });
            $(".bubblecolorfire").addClass('bubblecolor').removeClass('bubblecolorfire');
            document.body.style.color = "pink";
            fireimg.className = "";
            yliaaudio.pause();
            yliaaudio.currentTime = 0;
            counter = 0;
        }
    });
});
$(document).ready(function () {
    var yliaaudio = document.getElementById("ylia");
    var counter = 0;
    $("#kimiimg").click(function () {
        if (counter === 0) {
            $('#bg').animate({ opacity: 0 }, 'slow', function () {
                $(this)
                    .css({ 'background-image': 'url(https://static.zerochan.net/Kimi.No.Shiranai.Monogatari.full.394271.jpg)' })
                    .animate({ opacity: 1 });
            });
            $(".bubblecolor").addClass('bubblecolorkimi').removeClass('bubblecolor');
            document.body.style.color = "#d3d3d3";
            kimiimg.className = " spin";
            yliaaudio.play();
            counter++;
        }
        else {
            $('#bg').animate({ opacity: 0 }, 'slow', function () {
                $(this)
                    .css({ 'background-image': 'url(images/bg.jpg)' })
                    .animate({ opacity: 1 });
            });
            $(".bubblecolorkimi").addClass('bubblecolor').removeClass('bubblecolorkimi');
            document.body.style.color = "pink";
            kimiimg.className = "";
            yliaaudio.pause();
            yliaaudio.currentTime = 0;
            counter = 0;
        }
    });
});
//login
$(document).ready(function loginform () {
    var form = document.getElementById("loginbg");
    $("#loginformbutton").click(function () {
        if(form.className = "loginbgtrans")
        {
            form.className = "loginbg";
        }
    }
)});
$(document).ready(function loginformback() {
    var form = document.getElementById("loginbg");
    $("#loginback").click(function () {
        if (form.className = "loginbg") {
            form.className = "loginbgtrans";
        }
    }
)
});
$(document).ready(function loginformregister() {
    var loginform = document.getElementById("loginbg");
    var registerform = document.getElementById("registerbg");
    $("#registerform").click(function () {
        if (loginform.className = "loginbg") {
            loginform.className = "loginbgtrans";
            registerform.className = "registerbg";
        }
    }
)
});
$(document).ready(function loginformregister() {
    var loginform = document.getElementById("loginbg");
    var registerform = document.getElementById("registerbg");
    $("#loginform").click(function () {
        if (registerform.className = "registerbg") {
            registerform.className = "registerbgtrans";
            loginform.className = "loginbg";
        }
    }
)
});
$(document).ready(function registerformback() {
    var form = document.getElementById("registerbg");
    $("#registerback").click(function () {
        if (form.className = "registerbg") {
            form.className = "registerbgtrans";
        }
    }
)
});
$(document).ready(function editback() {
    var form = document.getElementById("editbg");
    $("#editback").click(function () {
        if (form.className = "registerbg") {
            form.className = "registerbgtrans";
        }
    }
)
});
//ass 2
function editrow(id,username,name,gender,age,contact,email,address){
	var uid = $('#editid');
	var uusername= $('#editusername');
	var uname= $('#editname');
	var ugender =$('#editgender');
	var uage = $('#editage');
	var ucontact = $('#editcontact');
	var uemail = $('#editemail');
	var uaddress = $('#editaddress');
	uid.val(id);
	uusername.val(username);
	uname.val(name);
	ugender.val(gender);
	uage.val(age);
	ucontact.val(contact);
	uemail.val(email);
	uaddress.val(address);
	
	var form = document.getElementById("editbg");
    form.className="registerbg";
}