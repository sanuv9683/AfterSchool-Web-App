<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sanu AK
 * Date: 7/1/2018
 * Time: 3:27 PM
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:GET,POST');
header('Access-Control-Allow-Headers, Content-Type');

class Uploader extends CI_Controller{

	public function index(){
		$this->load->view("upload-panel");
	}
	public function fileUploader(){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["uploadedImg"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["uploadedImg"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 1;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
//		// Check file size
//		if ($_FILES["uploadedImg"]["size"] > 5000000) {
//			echo "Sorry, your file is too large.";
//			$uploadOk = 1;
//		}
//		// Allow certain file formats
//		if ($imageFileType != "mp4" && $imageFileType != "avg" && $imageFileType != "pdf"
//			&& $imageFileType != "pptx") {
//			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//			$uploadOk = 0;
//		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["uploadedImg"]["tmp_name"], $target_file)) {
				$strm = $this->input->post(trim(strip_tags('strem')));
				$subject = $this->input->post(trim(strip_tags('subject')));
				$year = $this->input->post(trim(strip_tags("year")));
				$papertype = $this->input->post(trim(strip_tags("paperType")));
				$filename= basename($_FILES["uploadedImg"]["name"]);
				$alld=array(
					"papaerID"=>"Paper-".$filename,
					"type"=>$papertype,
					"pdfUrl"=>basename($_FILES["uploadedImg"]["name"]),
					"yearID"=>$year
				);

				$alld2=array(
					"subID"=>'SB001',
					"yearID"=>$year,
					"ymonth"=>$year,
					"date"=>"2018-07-07"
				);
				$this->Papers->insert_Papaers($alld);
				$this->SubYears->insert_SubYears($alld2);
				echo "The file " . basename($_FILES["uploadedImg"]["name"]) . " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}


	public function getAllFiless($para){
		$this->Subject->query('select * from ');
	}

	public function getPFY(){
		$strm = $this->input->get(trim(strip_tags('id')));
		$aa=$this->Years->getAllYearsSub($strm);
		echo json_encode($aa);
	}
}
