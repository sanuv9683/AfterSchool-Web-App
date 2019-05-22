<?php
/**
 * Created by IntelliJ IDEA.
 * User: Sanu AK
 * Date: 7/6/2018
 * Time: 11:09 PM
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:GET,POST');
header('Access-Control-Allow-Headers, Content-Type');

class SubjectC  extends CI_Controller
{
	public function index(){
		$this->load->view("about-us");
	}

	public function year()
	{
		$d = $this->Years->get_all();
		echo json_encode($d->result());
//		foreach ($d->result() as $row) {
//			echo $row->yearID;
//		}
	}


	public function getSy(){
		$strm = $this->input->get(trim(strip_tags('id')));
		$res=$this->Subject->getYrsOfSubs($strm);
		echo json_encode($res->result());
	}

}
