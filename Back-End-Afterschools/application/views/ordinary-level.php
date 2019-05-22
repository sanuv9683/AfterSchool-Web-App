<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, scale=1.0">
    <title>Afterschools.lk - Home Page</title>
	<link rel="stylesheet" href="<?php echo  base_url()?>assests/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo  base_url()?>assests/css/main.css">
	<link rel="stylesheet" href="<?php echo  base_url()?>assests/css/ol.css">
	<link rel="stylesheet" href="<?php echo  base_url()?>assests/css/loader.css">
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col col-12 col-md-3">
                <h1 id="title"><a href="index.html">Afterschools.lk</a></h1>
            </div>
            <div class="col col-12 col-md-9">
                <div id="hdr-social-media-container" class="social-media-container">
                    <a href="http://facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="http://google.com"><i class="fa fa-google-plus"></i></a>
                    <a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">

        <div class="row">
            <div class="col col-12 col-lg-2">
                <div class="main-nav-box">
                    <h2>O/L</h2>
                    <span>Ordinary Level</span>
                </div>
                <div class="main-nav-box">
                    <h2>A/L</h2>
                    <span>Advanced Level</span>
                </div>
            </div>

            <div id="content" class="col col-12 col-lg-8">
                <!-- Content change with the page here-->
                <h1>Cambridge International - Ordinary Level</h1>
                <p>Please select a subject from the list below:</p>
                <p class="form-group">
                    <label>
                        Show me qualifications in:
                    </label>
                    <select id="cmbQualification" class="form-control">
                        <option value="all">All subject areas</option>
                        <option value="english">English</option>
                        <option value="humanities">Humanities</option>
                        <option value="languages">Languages</option>
                        <option value="mathematics">Mathematics</option>
                        <option value="science">Science</option>
                        <option value="social sciences">Social Sciences</option>
                        <option value="technology">Technology</option>
                        <option value="arts">The Arts</option>
                    </select>
                </p>
                <hr>
                <div id="loader-container">
                    <div class="lds-ripple">
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <ul id="ulQualifications">

                </ul>
                <!-- # No more changes -->
            </div>

            <div id="advertisement" class="col col-12 col-lg-2">
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque cupiditate doloremque enim est
                    exercitationem fuga laboriosam maiores minima nisi nostrum quos saepe sed similique, vero
                    voluptatem! Aliquid, distinctio nesciunt! Labore!
                </div>
                <div>Accusantium ad consequuntur cumque cupiditate, facere illum in natus perferendis veritatis! Animi
                    corporis iusto nobis quam reiciendis sunt. Beatae culpa dolore eos excepturi iure maxime, quis vero?
                    Assumenda commodi, eligendi.
                </div>
                <div>Accusantium ad consequuntur cumque cupiditate, facere illum in natus perferendis veritatis! Animi
                    corporis iusto nobis quam reiciendis sunt. Beatae culpa dolore eos excepturi iure maxime, quis vero?
                    Assumenda commodi, eligendi.
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col col-12 col-lg-4">
                <span>
                    Copyright &copy; 2018 - Afterschools.lk
                </span>
                <br>
                <a href="about-us.html">About Us</a><br>
                <a href="contact-us.html">Contact Us</a><br>
                <a href="terms-and-condition.html">Terms and Conditions</a><br>
                <br>
                <span>Back to Top ^</span>
            </div>
            <div class="col col-12 col-lg-4">
                <div id="ft-social-media-container" class="social-media-container">
                    <a href="http://facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="http://google.com"><i class="fa fa-google-plus"></i></a>
                    <a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
            <div id="ft-logo-container" class="col col-12 col-lg-4">
                <h1><a href="index.html">AfterSchools.lk</a></h1>
                <span>"Lorem ipsum dolor sit amet"</span>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo  base_url()?>assests/js/jquery.js"></script>
<script src="<?php echo  base_url()?>assests/js/mainPage.js"></script>
<script >
	$("#cmbQualification").change(()=>{
		loadSubjects();
	});

	$(document).ready(()=>{
		loadSubjects();
	})

	function loadSubjects(){
		$("#loader-container").removeClass("hide");
		$("#ulQualifications").addClass("hide");

		$.ajax({
			method:"GET",
			url:"OL/getOLSubs",
			async:true,
			dataType: "json"
		}).done((response)=>{

			$("#loader-container").addClass("hide");
			$("#ulQualifications").removeClass("hide");
			let subjects = (response);

			$("#ulQualifications li").remove();

			for(let index in subjects){
				let subject = subjects[index];

				if ($("#cmbQualification").val() == "all"){
					$("#ulQualifications").append("<li><a href='OL/olsubs?id=" + subject.subID + "'>" +  subject.subName + "</a></li>");
				}else{
					if (subject.tag === $("#cmbQualification").val()){
						$("#ulQualifications").append("<li><a href='OL/olsubs?id=" + subject.subID + "'>" +  subject.subName + "</a></li>");
					}
				}
			}

		});
	}

</script>
<script>
	$(".main-nav-box").click(function () {
		switch ($(this).find("h2").text()) {
			case "O/L":
				window.location.replace("<?php echo base_url()?>OL");
				break;
			case "A/L":
				window.location.replace("<?php echo base_url()?>AL");
				break;
		}
	});

	$("footer>div>div>div>span:last-child").click(function () {
		$("html,body").animate({
			scrollTop: "0px"
		}, 300);
	});

</script>
</body>
</html>
