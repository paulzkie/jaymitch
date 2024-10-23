<?php
class Jaymitch extends CI_Model{

	public function adminlogin($username){
		return $this->db->query("select * from user_tbl a inner join usertype_tbl b on a.usertypeid=b.usertypeid where a.username = '$username'")->result();
	}

	public function getInquiry(){
		return $this->db->query("select * from inquiry_tbl order by inquiryid desc")->result();
	}

	public function insertlogtbl($logtbl){
	$this->db->insert("log_tbl", $logtbl);
	return;
	}

	public function insertUser($data){
		$this->db->insert("user_tbl", $data);
		return;
	}

	public function getUser(){
		return $this->db->query("select * from user_tbl a left join usertype_tbl b on a.usertypeid=b.usertypeid")->result();
	}

	public function deleteUser($data){
		$this->db->query("delete from user_tbl where userid= '$data'");
		return;
	}

	public function updateUser($data, $userid){
		$this->db->where("userid", $userid);
		$this->db->update("user_tbl", $data);
		return;
	}

	public function getPosition(){
		return $this->db->query("select * from usertype_tbl where usertypeid != 3")->result();
	}

	public function insertPosition($data){
		$this->db->insert("usertype_tbl", $data);
		return;
	}

	public function deletePosition($data){
		$this->db->query("delete from usertype_tbl where usertypeid = '$data'");
		return;
	}

	public function updatePosition($data, $id){
		$this->db->where("usertypeid", $id);
		$this->db->update("usertype_tbl", $data);
		return;
	}

	public function getAbout(){
		return $this->db->query("select * from about_tbl")->result();
	}

	public function updateAbout($data, $aboutid){
		$this->db->where("aboutid", $aboutid);
		$this->db->update("about_tbl", $data);
		return;
	}

	public function getContact(){
		return $this->db->query("select * from contact_tbl")->result();
	}

	public function updateContact($data, $contactid){
		$this->db->where("contactid", $contactid);
		$this->db->update("contact_tbl", $data);
		return;
	}

	public function getSlider(){
		return $this->db->query("select * from slider_tbl order by sliderid limit 3")->result();
	}

	public function countSlider(){
		return $this->db->query("select count(*) as countSlider from slider_tbl order by sliderid limit 3")->result();
	}

	public function insertSlider($data){
		$this->db->insert("slider_tbl", $data);
		return;
	}

	public function updateSlider($data, $sliderid){
		$this->db->where("sliderid", $sliderid);
		$this->db->update("slider_tbl", $data);
		return;
	}

	public function removeSlider($sliderid){
		$this->db->query("delete from slider_tbl where sliderid = '$sliderid'");
		return;
	}

	public function getGallery(){
		return $this->db->query("select * from gallery_tbl")->result();
	}

	public function insertGallery($data){
		$this->db->insert("gallery_tbl", $data);
		return;
	}

	public function updateGallery($data, $galleryid){
		$this->db->where("galleryid", $galleryid);
		$this->db->update("gallery_tbl", $data);
		return;
	}

	public function removeGallery($galleryid){
		$this->db->query("delete from gallery_tbl where galleryid = '$galleryid'");
		return;
	}

	public function getNews(){
		return $this->db->query("select * from news_tbl")->result();
	}

	public function insertNews($data){
		$this->db->insert("news_tbl", $data);
		return;
	}

	public function updateNews($data, $newsid){
		$this->db->where("newsid", $newsid);
		$this->db->update("news_tbl", $data);
		return;
	}

	public function removeNews($newsid){
		$this->db->query("delete from news_tbl where newsid = '$newsid'");
		return;
	}

	public function getTime(){
		return $this->db->query("select * from time_tbl")->result();
	}

	public function insertTime($data){
		$this->db->insert("time_tbl", $data);
		return;
	}

	public function updateTime($data, $timeid){
		$this->db->where("timeid", $timeid);
		$this->db->update("time_tbl", $data);
		return;
	}

	public function deleteTime($timeid){
		$this->db->query("delete from time_tbl where timeid = '$timeid'");
		return;
	}

	public function getCategory(){
		return $this->db->query("select * from category_tbl")->result();
	}

	public function getCat($catid){
		return $this->db->query("select * from category_tbl a left join menu_tbl b on a.catid=b.catid where a.catid='$catid'")->result();
	}

	public function deleteTempMenu($tempid){
		$this->db->query("delete from temp_tbl where tempid='$tempid'");
		return;
	}

	public function insertCategory($data){
		$this->db->insert("category_tbl", $data);
		return;
	}

	public function deleteCategory($catid){
		$this->db->query("delete from category_tbl where catid = '$catid'");
		return;
	}

	public function updateCategory($data, $catid){
		$this->db->where("catid", $catid);
		$this->db->update("category_tbl", $data);
		return;
	}

	public function getMenu(){
		return $this->db->query("select * from menu_tbl a left join category_tbl b on a.catid=b.catid")->result();
	}

	public function insertMenu($data){
		$this->db->insert("menu_tbl", $data);
		return;
	}

	public function updateMenu($data, $menuid){
		$this->db->where("menuid", $menuid);
		$this->db->update("menu_tbl", $data);
		return;
	}
	
	public function deleteMenu($menuid){
		$this->db->query("delete from menu_tbl where menuid = '$menuid'");
		return;
	}

	public function getPackages(){
		return $this->db->query("select * from packageinfo_tbl")->result();
	}

	public function getTemp(){
		return $this->db->query("select * from temp_tbl a left join menu_tbl b on a.menuid=b.menuid")->result();
	}

	public function insertTemp($menuid){
		$this->db->insert("temp_tbl", $menuid);
		return;
	}

	public function getTempMenuid($menuid){
		return $this->db->query("select * from temp_tbl where menuid = '$menuid' ")->result();
	}

	public function insertPackageInfo($data){
		$this->db->insert("packageinfo_tbl", $data);
		return;
	}

	public function getPackageInfoID(){
			return $this->db->query('SELECT max(packageinfoid)as maxid FROM packageinfo_tbl')->result();
	}

	public function getTempMenu(){
		return $this->db->query("select menuid from temp_tbl")->result();
	}

	public function insertPackage($datapackage){
		$this->db->insert("package_tbl", $datapackage);
		$this->db->query("truncate temp_tbl");
		return;
	}

	public function getPending(){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where status = 'Pending' order by reserveid desc")->result();
	}

	public function getResched(){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where status = 'Rescheduled' order by reserveid desc ")->result();
	}

	public function getCancelled(){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where status = 'Cancelled' order by reserveid desc ")->result();
	}

	public function getEmail($email){
		return $this->db->query("select * from user_tbl where email= '$email' ")->result();
	}

	public function insertConfirm($data, $reserveid){
		$this->db->where("reserveid", $reserveid);
		$this->db->update("reserve_tbl", $data);
		return;
	}

	public function getConfirmed(){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where status = 'Confirmed' ")->result();
	}
	
	public function getReservationDetails($reserveid){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where reserveid = '$reserveid' ")->result();
	}

	public function getEvent(){
		date_default_timezone_set("Asia/Manila");
		$date = date("F d, Y");
		return $this->db->query("select * from reserve_tbl where reserveid!=1 and dateofevent > '$date' and status in('Pending','Confirmed') order by dateofevent desc limit 0,7")->result();
	}

	public function getPackagetype($packagetype){
			return $this->db->query("select * from packageinfo_tbl where packageinfoid= '$packagetype' ")->result();
	}

	public function getMenus($packageinfoid){
			return $this->db->query("select * from package_tbl a left join menu_tbl b on a.menuid=b.menuid left join packageinfo_tbl c on a.packageinfoid=c.packageinfoid where a.packageinfoid= '$packageinfoid' ")->result();
	}

	public function getCustomize($transactioncode){
			return $this->db->query("select * from customize_tbl a left join menu_tbl b on a.menuid=b.menuid where transactioncode='$transactioncode' ")->result();
	}

	public function updatePackageinfo($data, $packageinfoid){
		$this->db->where("packageinfoid", $packageinfoid);
		$this->db->update("packageinfo_tbl", $data);
		return;
	}

	public function deletePackage($packageinfoid){
		$this->db->query("delete from packageinfo_tbl where packageinfoid = '$packageinfoid'");
		$this->db->query("delete from package_tbl where packageinfoid = '$packageinfoid'");
		return;
	}

	public function getPendingNotif(){
		return $this->db->query("select count(*)as countPending from reserve_tbl where status = 'Pending' ")->result();
	}

	public function getCancelledNotif(){
		return $this->db->query("select count(*)as countCancel from reserve_tbl where status = 'Cancelled' ")->result();
	}

	public function getReschedNotif(){
		return $this->db->query("select count(*)as countResched from reserve_tbl where status = 'Rescheduled' ")->result();
	}

	public function insertCancel($data, $reserveid){
		$this->db->where("reserveid", $reserveid);
		$this->db->update("reserve_tbl", $data);
		return;
	}

	public function getDates(){
			$q=$this->db->select('count(dateofevent) as today,dateofevent')->group_by(array("dateofevent"))->having("today = 1", null, false)->get("reserve_tbl"); 
        	return $q->result();
		}

	public function searchPending($from, $to){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where dateofevent between '$from' and '$to' and reserveid!=1 and status='Pending' or status='Rescheduled' ")->result();
	}

	public function searchConfirmed($from, $to){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where dateofevent between '$from' and '$to' and reserveid!=1 and status='Confirmed'")->result();
	}

	public function searchCancelled($from, $to){
		return $this->db->query("select * from reserve_tbl a left join user_tbl b on a.userid=b.userid where dateofevent between '$from' and '$to' and reserveid!=1 and status='Cancelled'")->result();
	}

	public function insertDate($data){
		$this->db->insert("reserve_tbl", $data);
		return;
	}

	public function getPax(){
		return $this->db->query("select * from pax_tbl")->result();
	}

	public function insertPax($data){
		$this->db->insert("pax_tbl", $data);
		return;
	}

	public function updatePax($data, $paxid){
		$this->db->where("paxid", $paxid);
		$this->db->update("pax_tbl", $data);
		return;
	}

	public function delPax($paxid){
		$this->db->query("delete from pax_tbl where paxid = '$paxid'");
		return;
	}

	public function getBank(){
		return $this->db->query("select * from payment_tbl")->result();
	}

	public function insertBank($data){
		$this->db->insert("payment_tbl", $data);
		return;
	}

	public function updateBank($data, $paymentid){
		$this->db->where("paymentid", $paymentid);
		$this->db->update("payment_tbl", $data);
		return;
	}

	public function delBank($paymentid){
		$this->db->query("delete from payment_tbl where paymentid = '$paymentid'");
		return;
	}

}
?>