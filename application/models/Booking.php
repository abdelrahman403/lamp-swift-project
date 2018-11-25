<?php 
class Booking extends CI_Model {
	function save($data){
		$this->db->insert('bookings',$data);
	}
}