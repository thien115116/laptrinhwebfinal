<?php
Class User_model extends CI_Model
{
 function login($username, $password)
 {
   // return 1;
   $arr= array('email'=>$username, 'password'=>md5($password)) ;
   $query= $this->db->get_where('users', $arr);
   //echo $this->db->last_query();exit;return;
   
 if ($query->num_rows()>0)
        {
            $row= $query->row();
            $a= array('admin_login'=>$row);
            $this->session->set_userdata($a);
            return 1;
        }
    else return 0;

 }
 
 function resend($email){
  $this -> db -> where('users.email', $email);
   // $this -> db -> where('users.verify_code', '0');
    $this -> db -> join('savsoft_group', 'users.gid=savsoft_group.gid');
  $this->db->limit(1);
    $query = $this -> db -> get('users');
    if($query->num_rows()==0){
    return $this->lang->line('invalid_email');
    
    }
    $user=$query->row_array();
	$veri_code=$user['verify_code'];
					 
$verilink=site_url('login/verify/'.$veri_code);
 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('activation_subject');
			$message=$this->config->item('activation_message');;
			
			$message=str_replace('[verilink]',$verilink,$message);
		
			$toemail=$email;
			 
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 print_r($this->email->print_debugger());
			exit;
			}
			return $this->lang->line('link_sent');
 
 }
 
 
 
 function recent_payments($limit){
 
   $this -> db -> join('savsoft_group', 'savsoft_payment.gid=savsoft_group.gid');
   $this -> db -> join('users', 'savsoft_payment.uid=users.uid');
  $this->db->limit($limit);
  $this->db->order_by('savsoft_payment.pid','desc');
    $query = $this -> db -> get('savsoft_payment');

			 
   
     return $query->result_array();
    
 }
 
 
 function revenue_months(){

 $revenue=array();
 $months=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
foreach($months as $k => $val){
$p1=strtotime(date('Y',time()).'-'.$val.'-01');
$p2=strtotime(date('Y',time()).'-'.$val.'-'.date('t',$p1));
 
 
 $query = $this->db->query("select * from savsoft_payment where paid_date >='$p1' and paid_date <='$p2'   ");
 
 $rev=$query->result_array();
 if($query->num_rows()==0){
  $revenue[$val]=0;
  }else{
  
 foreach($rev as $rg => $rv){
 if(strtolower($rv['payment_gateway']) != $this->config->item('default_gateway')){
        if(isset($revenue[$val])){
         $revenue[$val]+=$rv['amount']/$this->config->item(strtolower($rv['payment_gateway']).'_conversion');
         }else{
         
         $revenue[$val]=$rv['amount']/$this->config->item(strtolower($rv['payment_gateway']).'_conversion');
         }
   
  }else{
 
        if(isset($revenue[$val])){
        $revenue[$val]+=$rv['amount'];
        
        }else{
        $revenue[$val]=$rv['amount'];
         
        }
        
 }
 }
 
 }
  }
 
return $revenue;
 }
 
 
 
 
 
 function login_wp($user)
 {
   
  
    $this -> db -> where('users.wp_user', $user);
    $this -> db -> where('users.verify_code', '0');
    $this -> db -> join('savsoft_group', 'users.gid=savsoft_group.gid');
  $this->db->limit(1);
    $query = $this -> db -> get('users');

			 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();
   }
   else
   {
     return false;
   }
 }
 
 
 function insert_group(){
 
 		$userdata=array(
		'group_name'=>$this->input->post('group_name'),
		'price'=>$this->input->post('price'),
		'valid_for_days'=>$this->input->post('valid_for_days'),
		'description'=>$this->input->post('description')
		);
		
		if($this->db->insert('savsoft_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
 }
 
  function update_group($gid){
 
 		$userdata=array(
		'group_name'=>$this->input->post('group_name'),
		'price'=>$this->input->post('price'),
		'valid_for_days'=>$this->input->post('valid_for_days'),
		'description'=>$this->input->post('description')
		);
		$this->db->where('gid',$gid);
		if($this->db->update('savsoft_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
 }
 
 
 function get_group($gid){
 $this->db->where('gid',$gid);
 $query=$this->db->get('savsoft_group');
 return $query->row_array();
 }
 
 
  function admin_login()
 {
   
    $this -> db -> where('uid', '1');
    $query = $this -> db -> get('users');

			 
   if($query -> num_rows() == 1)
   {
     return $query->row_array();
   }
   else
   {
     return false;
   }
 }

 function num_users(){
	 
	 $query=$this->db->get('users');
		return $query->num_rows();
 }
 
 function status_users($status){
	 $this->db->where('user_status',$status);
	 $query=$this->db->get('users');
		return $query->num_rows();
 }
 
  
 
 
 
 function user_list($limit='0'){
	 if($this->input->post('search')){
		 $search=$this->input->post('search');
		 $this->db->or_where('users.studentid',$search);
		 $this->db->or_where('users.email',$search);
		 $this->db->or_where('users.first_name',$search);
		 $this->db->or_where('users.last_name',$search);
		 $this->db->or_where('users.contact_no',$search);

	 }
		$this->db->limit($this->config->item('number_of_rows'),$limit);
		$this->db->order_by('users.uid','desc');
		$this->db->join('savsoft_group', 'users.gid=savsoft_group.gid');
	 	$this->db->join('savsoft_faculty','savsoft_faculty.facultyid=users.facultyid','left');
		 $query=$this->db->get('users');
		//echo $this->db->last_query();exit;
		return $query->result_array();
 }
/*function user_class($limit='0',$classid=""){
	if($this->input->post('search')){
		$search=$this->input->post('search');
		$this->db->or_where('users.studentid',$search);
		$this->db->or_where('users.email',$search);
		$this->db->or_where('users.first_name',$search);
		$this->db->or_where('users.last_name',$search);
		$this->db->or_where('users.contact_no',$search);
		}
		if($classid!="")
			$this->db->where('classid',$classid);
	 
	 	$this->db->order_by('users.uid','desc');
	 	$this->db->join('savsoft_group', 'users.gid=savsoft_group.gid');
		$this->db->join('savsoft_faculty','savsoft_faculty.facultyid=users.facultyid','left');
		$query=$this->db->get('users');
	 //echo $this->db->last_query();exit;
	 return $query->result_array();	
}*/

function user_class($classid=""){
	if($classid!="")
		$this->db->where('classid',$classid);
 
	$this->db->order_by('users.uid','desc');
	$this->db->join('savsoft_group', 'users.gid=savsoft_group.gid');
	$this->db->join('savsoft_faculty','savsoft_faculty.facultyid=users.facultyid','left');
	$query=$this->db->get('users');
	 //echo $this->db->last_query();exit;
	 return $query->result_array();	
}

function user_group($groupid=""){
	
		if($groupid!="-" && $groupid!="")
			$this->db->where('su',$groupid);
	 	
	 	$this->db->join('savsoft_group', 'users.gid=savsoft_group.gid');
		$this->db->join('savsoft_faculty','savsoft_faculty.facultyid=users.facultyid','left');
		$query=$this->db->get('users');
	 //echo $this->db->last_query();exit;
	 return $query->result_array();	
}
 
 function group_list(){
	 $this->db->order_by('gid','asc');
	$query=$this->db->get('savsoft_group');
		return $query->result_array();
		 
	 
 }
 
 function verify_code($vcode){
	 $this->db->where('verify_code',$vcode);
	$query=$this->db->get('users');
		if($query->num_rows()=='1'){
			$user=$query->row_array();
			$uid=$user['uid'];
			$userdata=array(
			'verify_code'=>'0'
			);
			$this->db->where('uid',$uid);
			$this->db->update('users',$userdata);
			return true;
		}else{
			
			return false;
		}
		 
	 
 }
 
 
 function insert_user(){
	 	$userdata=array(
		
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		
		
		'password'=>md5($this->input->post('password')),
		
		
		
		'gid'=>$this->input->post('gid'),
		'subscription_expired'=>strtotime($this->input->post('subscription_expired')),
		'su'=>$this->input->post('su')		
		);
		if($this->input->post('studentid')=="")
			$userdata['studentid']=NULL;
		else
			$userdata['studentid']=$this->input->post('studentid');
		
		if($this->input->post('birthdate')=="")
			$userdata['birthdate']=NULL;
		else
			$userdata['birthdate']=$this->input->post('birthdate');
		
		if($this->input->post('email')=="")
			$userdata['email']=NULL;
		else
			$userdata['email']=$this->input->post('email');

		if($this->input->post('type')=="-")
			$userdata['type']=NULL;
		else
			$userdata['type']=$this->input->post('type');
			
		if($this->input->post('faculty')=="-")
			$userdata['facultyid']=NULL;
		else
			$userdata['facultyid']=$this->input->post('faculty');
		
		if($this->input->post('class_lst')=="-")
			$userdata['classid']=NULL;
		else
			$userdata['classid']=$this->input->post('class_lst');
		
		if($this->input->post('academic_year')=="")
			$userdata['academic_year']=NULL;
		else
			$userdata['academic_year']=$this->input->post('academic_year');
		
		if($this->input->post('contact_no')=="")
			$userdata['contact_no']=NULL;
		else
			$userdata['contact_no']=$this->input->post('contact_no');
		if($this->db->insert('users',$userdata)){
			return true;
		}else{
			return false;
		}
	 
 }
 
  function insert_user_2(){
	 
		$userdata=array(
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password')),
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'contact_no'=>$this->input->post('contact_no'),
		'gid'=>$this->input->post('gid'),
		'su'=>'0'		
		);
		$veri_code=rand('1111','9999');
		 if($this->config->item('verify_email')){
			$userdata['verify_code']=$veri_code;
		 }
		 		if($this->session->userdata('logged_in_raw')){
					$userraw=$this->session->userdata('logged_in_raw');
					$userraw_uid=$userraw['uid'];
					$this->db->where('uid',$userraw_uid);
				$rresult=$this->db->update('users',$userdata);
				if($this->session->userdata('logged_in_raw')){
				$this->session->unset_userdata('logged_in_raw');	
				}		
				}else{
				$rresult=$this->db->insert('users',$userdata);
				}
		if($rresult){
			 if($this->config->item('verify_email')){
				 // send verification link in email
				 
$verilink=site_url('login/verify/'.$veri_code);
 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('activation_subject');
			$message=$this->config->item('activation_message');;
			
			$message=str_replace('[verilink]',$verilink,$message);
		
			$toemail=$this->input->post('email');
			 
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 print_r($this->email->print_debugger());
			exit;
			}
			 
				 
			 }
			 
			return true;
		}else{
			
			return false;
		}
	 
 }
 

 
 
 
 
 
 function reset_password($toemail){
$this->db->where("email",$toemail);
$queryr=$this->db->get('users');
if($queryr->num_rows() != "1"){
return false;
}
$new_password=rand('1111','9999');

 $this->load->library('email');

 if($this->config->item('protocol')=="smtp"){
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = $this->config->item('smtp_hostname');
			$config['smtp_user'] = $this->config->item('smtp_username');
			$config['smtp_pass'] = $this->config->item('smtp_password');
			$config['smtp_port'] = $this->config->item('smtp_port');
			$config['smtp_timeout'] = $this->config->item('smtp_timeout');
			$config['mailtype'] = $this->config->item('smtp_mailtype');
			$config['starttls']  = $this->config->item('starttls');
			 $config['newline']  = $this->config->item('newline');
			
			$this->email->initialize($config);
		}
			$fromemail=$this->config->item('fromemail');
			$fromname=$this->config->item('fromname');
			$subject=$this->config->item('password_subject');
			$message=$this->config->item('password_message');;
			
			$message=str_replace('[new_password]',$new_password,$message);
		
		
			
			$this->email->to($toemail);
			$this->email->from($fromemail, $fromname);
			$this->email->subject($subject);
			$this->email->message($message);
			if(!$this->email->send()){
			 //print_r($this->email->print_debugger());
			
			}else{
			$user_detail=array(
			'password'=>md5($new_password)
			);
			$this->db->where('email', $toemail);
 			$this->db->update('users',$user_detail);
			return true;
			}

}



 /*function update_user($uid){
	 $logged_in=$this->session->userdata('logged_in');
						 
			
		$userdata=array(
		'first_name'=>$this->input->post('first_name'),
		'last_name'=>$this->input->post('last_name'),
		'contact_no'=>$this->input->post('contact_no'),	
			'email'=>$this->input->post('email'),
		);
		if($this->input->post('password')!='')
			$userdata['password']=md5($this->input->post('password'));
		if($logged_in['su']=='1'){
			$userdata['email']=$this->input->post('email');
			$userdata['gid']=$this->input->post('gid');
			// if($this->input->post('subscription_expired') !='0'){
			// $userdata['subscription_expired']=strtotime($this->input->post('subscription_expired'));
			// }else{
			// $userdata['subscription_expired']='0';	
			//}
			$userdata['su']=$this->input->post('su');
			}
			
		if($this->input->post('password')!=""){
			$userdata['password']=md5($this->input->post('password'));
		}
		if($this->input->post('user_status')){
			$userdata['user_status']=$this->input->post('user_status');
		}
		if($this->input->post('facultyid')!=""){
			$userdata['facultyid']=$this->input->post('facultyid');
		}
		if($this->input->post('classid')!=""){
			$userdata['classid']=$this->input->post('classid');
		}
		
		 $this->db->where('uid',$uid);
		if($this->db->update('users',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }*/
 
 function update_user($uid){
	$logged_in=$this->session->userdata('logged_in');
	$userdata=array(
	'first_name'=>$this->input->post('first_name'),
	'last_name'=>$this->input->post('last_name'),
	'contact_no'=>$this->input->post('contact_no'),	
		'email'=>$this->input->post('email'),
	);
	if($this->input->post('password')!='')
		$userdata['password']=md5($this->input->post('password'));
	if($logged_in['su']=='1'){
		$userdata['email']=$this->input->post('email');
		$userdata['gid']=$this->input->post('gid');
	
		$userdata['su']=$this->input->post('su');
		}
	if($this->input->post('studentid')!=""){
			$userdata['studentid']=$this->input->post('studentid');
	}
	if($this->input->post('password')!=""){
		$userdata['password']=md5($this->input->post('password'));
	}
	if($this->input->post('user_status')){
		$userdata['user_status']=$this->input->post('user_status');
	}
	if($this->input->post('facultyid')!=""){
		$userdata['facultyid']=$this->input->post('facultyid');
	}
	if($this->input->post('classid')!=""){
		$userdata['classid']=$this->input->post('classid');
	}
	
	 $this->db->where('uid',$uid);
	if($this->db->update('users',$userdata)){
		
		return true;
	}else{
		
		return false;
	}
	 
 }
 
 
 function lock_user($uid){
		$logged_in=$this->session->userdata('logged_in');	 
	 $userdata=array(
		 'user_status'=>'Inactive'
	 );
	 		$this->db->where('uid',$uid);
	 if($this->db->update('users',$userdata)){
		 return true;
	 }else{
		 return false;
	 }
}

function unlock_user($uid){
	$logged_in=$this->session->userdata('logged_in');	 
 $userdata=array(
	 'user_status'=>'Active'
 );
		 $this->db->where('uid',$uid);
 if($this->db->update('users',$userdata)){
	 return true;
 }else{
	 return false;
 }
}


 function update_groups($gid){
	 
		$userdata=array();
		if($this->input->post('group_name')){
		$userdata['group_name']=$this->input->post('group_name');
		}
		if($this->input->post('price')){
		$userdata['price']=$this->input->post('price');
		}
		if($this->input->post('valid_day')){
		$userdata['valid_for_days']=$this->input->post('valid_day');
		}
		if($this->input->post('valid_day')){
		$userdata['description']=$this->input->post('description');
		}
		 $this->db->where('gid',$gid);
		if($this->db->update('savsoft_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
 
 function remove_user($uid){
	 
	 $this->db->where('uid',$uid);
	 if($this->db->delete('users')){
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
 
 function remove_group($gid){
	 
	 $this->db->where('gid',$gid);
	 if($this->db->delete('savsoft_group')){
		 return true;
	 }else{
		 
		 return false;
	 }
	 
	 
 }
 
 
 
 function get_user($uid){
	 
	$this->db->where('users.uid',$uid);
	   $this -> db -> join('savsoft_group', 'users.gid=savsoft_group.gid');
$query=$this->db->get('users');
	 return $query->row_array();
	 
 }
 
 
 
 function insert_groups(){
	 
	 	$userdata=array(
		'group_name'=>$this->input->post('group_name'),
		'price'=>$this->input->post('price'),
		'valid_for_days'=>$this->input->post('valid_for_days'),
		'description'=>$this->input->post('description'),
			);
		
		if($this->db->insert('savsoft_group',$userdata)){
			
			return true;
		}else{
			
			return false;
		}
	 
 }
 
 
 function get_expiry($gid){
	 
	$this->db->where('gid',$gid);
	$query=$this->db->get('savsoft_group');
	 $gr=$query->row_array();
	 if($gr['valid_for_days']!='0'){
	$nod=$gr['valid_for_days'];
	 return date('Y-m-d',(time()+($nod*24*60*60)));
	 }else{
		 return date('Y-m-d',(time()+(10*365*24*60*60))); 
	 }
 }
 function get_a_student($id)
 {
	 $this->db->where('studentid',$id);
	 $query=$this->db->get('users');
	 return $query->result_array();
 }
 function import_user($user)
 {
		while(!is_numeric($user[0][0]))
	 	array_shift($user);
		foreach($user as $key => $singleuser){
			if(is_numeric($singleuser[0]))
			{
				$insert_data = array(
				'studentid' => $singleuser[1],
				'password'=>md5($singleuser[1]),
				'last_name' => $singleuser[2],
				'first_name' =>$singleuser[3],
				'birthdate' => substr($singleuser[4],6,4).'-'.substr($singleuser[4],3,2).'-'.substr($singleuser[4],0,2),
				'classid'=>$singleuser[5],
				'facultyid'=>$singleuser[6],
				'type'=>$singleuser[7],
				'academic_year'=>$singleuser[8],
				'note'=>$singleuser[9],
				'gid'=>$singleuser[10]
				);
				//print_r($insert_data);exit;
				$student=$this->get_a_student($insert_data['studentid']);
				
				if(count($student)>0)
				{
					//Update
						$student_info=array(
						//'gid'=>$insert_data['gid']
						'classid'=>$insert_data['gid'],
						'birthdate'=>$insert_data['birthdate']
					);
					$this->db->where('studentid',$insert_data['studentid']);
					$this->db->update('users',$student_info);	
				}else
					$this->db->insert('users',$insert_data);
				
			}
		}
		
	}
 

}












?>
