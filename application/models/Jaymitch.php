<?php
class Jaymitch extends CI_Model{

		public function insertlogtbl($logtbl){
		$this->db->insert("log_tbl", $logtbl);
		return;
		}

		public function insertInquiry($data){
			$this->db->insert("inquiry_tbl", $data);
			return;
		}

		public function getUsernames($username){
			 $this->db->where("username", $username);
			 $this->db->from("user_tbl");
			 $query = $this->db->get();
			 if($query->num_rows()>0){
			 	return $query->result();
			 }else{
			 	return $query->result();
			 }
		}
		public function getEmails($email){
			 $this->db->where("email", $email);
			 $this->db->from("user_tbl");
			 $query = $this->db->get();
			 if($query->num_rows()>0){
			 	return $query->result();
			 }else{
			 	return $query->result();
			 }
		}

		public function emailLogin($userid){
			return $this->db->query("select * from user_tbl a inner join usertype_tbl b on a.usertypeid=b.usertypeid where a.userid = '$userid'")->result();
		}

		public function getLastId(){
			return $this->db->query('SELECT max(userid)as maxid FROM user_tbl')->result();
		}

		public function verifyUser($data,$userid){
			$this->db->where("userid", $userid);
			$this->db->update("user_tbl", $data);
			return;
		}

		public function getContact(){
			return $this->db->query("select * from contact_tbl")->result();
		}

		public function getGallery(){
			return $this->db->query("select * from gallery_tbl")->result();
		}

		public function getDish(){
			return $this->db->query("select * from menu_tbl a left join category_tbl b on a.catid=b.catid")->result();
		}

		public function getPackage(){
			return $this->db->query("select * from packageinfo_tbl a left join package_tbl b on a.packageinfoid=b.packageinfoid group by packagename order by a.packageinfoid desc")->result();
		}

		public function getPackage1($packageinfoid){
			return $this->db->query("select * from packageinfo_tbl a left join package_tbl b on a.packageinfoid=b.packageinfoid where a.packageinfoid = '$packageinfoid' group by packagename order by a.packageinfoid desc ")->result();
		}

		public function getPackageMenus($packageinfoid){
			return $this->db->query("select * from package_tbl a inner join menu_tbl b on a.menuid=b.menuid inner join category_tbl c on b.catid=c.catid where a.packageinfoid ='$packageinfoid'")->result();
		}

		public function getSlider(){
			return $this->db->query("select * from slider_tbl")->result();
		}

		public function registration($data){
			$this->db->insert("user_tbl", $data);
			return;
		}

		public function customerlogin($username){
			return $this->db->query("select * from user_tbl a inner join usertype_tbl b on a.usertypeid=b.usertypeid where a.username = '$username'")->result();
		}

		public function getAbout(){
			return $this->db->query("select * from about_tbl")->result();	
		}
		
		public function getPackages(){
			return $this->db->query("select * from packageinfo_tbl")->result();
		}

		public function getMenu($packageinfoid){
			return $this->db->query("select * from package_tbl a left join menu_tbl b on a.menuid=b.menuid left join packageinfo_tbl c on a.packageinfoid=c.packageinfoid where a.packageinfoid= '$packageinfoid' ")->result();
		}

		public function getCat(){
			return $this->db->query("select * from category_tbl ")->result();
		}

		public function getMenus($catid){
			return $this->db->query("select * from menu_tbl a left join category_tbl b on a.catid=b.catid where a.catid in ($catid) ")->result();
		}

		public function getDates(){
			$q=$this->db->select('count(dateofevent) as today,dateofevent')->group_by(array("dateofevent"))->having("today = 1", null, false)->get("reserve_tbl"); 
        	return $q->result();
		}

		public function insertHold($data){
			$this->db->insert("hold_tbl", $data);
			return;
		}

		public function getHoldid(){
			return $this->db->query('SELECT max(holdid)as maxid FROM hold_tbl')->result();
		}

		public function getOrderid($menuid){
			$userid = $this->session->userdata("userid");
			return $this->db->query("select * from order_tbl where menuid='$menuid' and userid = '$userid' ")->result();
		}

		public function getHold($holdid){
			return $this->db->query("select * from hold_tbl where holdid= '$holdid' ")->result();
		}

		public function getPackagetype($packagetype){
			return $this->db->query("select * from packageinfo_tbl where packageinfoid= '$packagetype' ")->result();
		}

		public function insertReserve($data){
			$this->db->insert("reserve_tbl", $data);
			return;
		}

		public function deleteHold($holdid){
			$this->db->query("delete from hold_tbl where holdid= '$holdid' ");
			return;
		}

		public function getReserve($userid){
			return $this->db->query("select * from reserve_tbl where userid = '$userid' ")->result();
		}

		public function insertOrder($data){
			$this->db->insert("order_tbl", $data);
			return;
		}

		public function getOrder($userid){
			return $this->db->query("select * from order_tbl a left join menu_tbl b on a.menuid=b.menuid where userid = '$userid' ")->result();
		}

		public function removeOrder($orderid){
			$this->db->query("delete from order_tbl where orderid = '$orderid' ");
			return;
		}

		public function updateOrder($holdid, $userid){
			$this->db->where("userid", $userid);
			$this->db->update("order_tbl", $holdid);
			return;
		}

		public function getSummaryOrder($holdid, $userid){
			return $this->db->query("select * from order_tbl a left join menu_tbl b on a.menuid=b.menuid where userid = '$userid' and holdid='$holdid' ")->result();
		}

		public function insertCustomize($getOrders){
			$this->db->insert("customize_tbl", $getOrders);
			return;
		}

		public function deleteOrders($holdid, $userid){
			$this->db->query("delete from order_tbl where holdid = '$holdid' and userid='$userid' ");
			return;
		}

		public function getReserveDetails($reserveid){
			return $this->db->query("select * from reserve_tbl where reserveid = '$reserveid' ")->result();
		}

		public function getCustomize($userid, $transactioncode){
			return $this->db->query("select * from customize_tbl a left join menu_tbl b on a.menuid=b.menuid where userid = '$userid' and transactioncode='$transactioncode' ")->result();
		}

		public function getReservation($reserveid){
			return $this->db->query("select total from reserve_tbl where reserveid = '$reserveid' ")->result();
		}

		public function updatePayment($data, $reserveid){
			$this->db->where("reserveid", $reserveid);
			$this->db->update("reserve_tbl", $data);
			return;
		}

		public function cancelReservation($data, $reserveid){
			$this->db->where("reserveid", $reserveid);
			$this->db->update("reserve_tbl", $data);
			return;
		}

		public function updateResched($data, $reserveid){
			$this->db->where("reserveid", $reserveid);
			$this->db->update("reserve_tbl", $data);
			return;
		}

		public function getTime(){
			return $this->db->query("select * from time_tbl")->result();
		}

		public function getNewNotif(){
			$userid = $this->session->userdata('userid');
			return $this->db->query("select count(*) as newNotif from reserve_tbl where userid = '$userid' and notifstat = 1 and status in ('Confirmed','Cancelled') ")->result();
		}

		public function readNotif($data, $reserveid){
			$this->db->where("reserveid", $reserveid);
			$this->db->update("reserve_tbl", $data);
			return;
		}

		public function getPaxes(){
			return $this->db->query("select * from pax_tbl")->result();
		}

		public function getBanks(){
			return $this->db->query("select * from payment_tbl")->result();
		}
}
?>