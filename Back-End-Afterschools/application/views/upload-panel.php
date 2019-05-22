<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, scale=1.0">
    <title>Afterschools.lk - Contact Us</title>
	<link rel="stylesheet" href="<?php echo  base_url()?>assests/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo  base_url()?>assests/css/main.css">
    <link rel="stylesheet" href="<?php echo  base_url()?>assests/css/dropzone.css">
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
            <div id="content" class="col col-12 col-lg-12">
                <!-- Content change with the page here-->
                <h1 id="sanu">Video & Paper Manage</h1>
				<form  class="dropzone"  method="post"
					   enctype="multipart/form-data" id="img-uploader">
                <div class="row">
                    <div class="col col-6 col-lg-6">
                        <div class="form-group ">
                            <label>Select Strem</label>
                            <select class="form-control" name="strem">
                                <option>Advance Level</option>
                                <option>Odinary LEvel</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label>Select Subject</label>
                            <select class="form-control" id="allSubs" name="subject">

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Years</label>
                            <select class="form-control" id="yer" name="year">
                            </select> <span style="float: right"> *Add New</span>
                        </div>
                        <div class="form-group">
                            <label>Select Years</label>
                            <select class="form-control" name="paperType">
                                <option>PassPaper</option>
                                <option>Marking Schema</option>
                            </select>
                        </div>
                    </div>
                </div>

              </form>
                <!-- # No more changes -->
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
<script src="<?php echo  base_url()?>assests/js/dropzone.js"></script>
<script src="<?php echo  base_url()?>assests/js/main.js"></script>
<script src="<?php echo  base_url()?>assests/js/mainPage.js"></script>
<script>
	$('#sanu').click(function () {
		// $("div#myId").dropzone({ url: "/file/post" });
	});

	loadSubjects();
	loadSubjects2();


	function loadSubjects(){
		$.ajax({
			method: "GET",
			url: "<?php echo  base_url()?>assests/js/al-subject-db.json",
			async: true,
			dataType: "json"
		}).done((response) => {
			let subjects = (response);
			for (let index in subjects) {
				let subject = subjects[index];
				$("#allSubs").append("<option>" + subject.subject + "</option>");
			}

		});
	}

	function loadSubjects2(){
		$.ajax({
			method: "GET",
			url: "<?php echo  base_url()?>assests/js/ol-subject-db.json",
			async: true,
			dataType: "json"
		}).done((response) => {
			let subjects = (response);

			for (let index in subjects) {
				let subject = subjects[index];
				$("#allSubs").append("<option>" + subject.subject + "</option>");
			}
		});
	}
	getYearsForSubject();
	function getYearsForSubject() {
		$.ajax({
			method: "GET",
			url: "SubjectC/year",
			async: true,
			dataType: "json"
		}).done((response) => {
			var subjects = (response);

			for (var index in subjects) {
				var subject = subjects[index];
				$("#yer").append("<option>" + subject.yearID + "</option>");
			}
		});
	}
</script>
</body>
</html>
