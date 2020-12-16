<?php
class Thanhvien_model extends CI_Model 
{
public function tongsoThanhVien($option='')
{
    if ($option=='cmnd')
    {
        $this->db->where('cmnd', NULL, false); // OTHER CONDITIONS IF ANY
        $this->db->from('thanhvien'); //TABLE NAME
        return $this->db->count_all_results();
    }
    if ($option=='')
    {
      
        $this->db->select('code');
        $this->db->from('thanhvien');
        $this->db->where("hoten <> '' ");
      //  $num_results = $this->db->count_all_results();
        return $this->db->count_all_results();
    }
     if ($option=='active')
    {
        $this->db->where('active', '1');
        $this->db->from('thanhvien');
        return $this->db->count_all_results();
    }
    return 0;
}
       
public function  danhsach($iddaotrang='')
        {
           if ($iddaotrang=='')
            $query = $this->db->get_where('thanhvien');
            else 
                 $query = $this->db->get_where('thanhvien', array('iddaotrang'=> $iddaotrang));
          //   echo $this->db->last_query();
            return $query->result();
        }

public function  danhsach2($iddaotrang='')
        {
           if ($iddaotrang=='')
            $query = $this->db->get_where('v_thanhvien_captoc');
            else 
                 $query = $this->db->get_where('v_thanhvien_captoc', array('iddaotrang'=> $iddaotrang));
          //   echo $this->db->last_query();
            return $query->result();
        }

public function  danhsach3($iddaotrang='')
        {
           if ($iddaotrang=='')
            $query = $this->db->get_where('v_thanh_vien_da_nhap_lieu');
            else 
                 $query = $this->db->get_where('v_thanh_vien_da_nhap_lieu', array('iddaotrang'=> $iddaotrang));
          //   echo $this->db->last_query();
            return $query->result();
        }
public function  danhsach4($idctkhoatu, $iddaotrang='')
        {
           if ($iddaotrang=='')
           {
         
            $query= $this->db->query("select * from v_thanhvien_dangky where idctkhoatu is null or idctkhoatu='$idctkhoatu' ");
            }
            else 
                $query= $this->db->query("select * from v_thanhvien_dangky where iddaotrang='$iddaotrang' and ( idctkhoatu is null or idctkhoatu='$idctkhoatu' )");
          //   echo $this->db->last_query();
            return $query->result();
        }
public function  daotrang()
        {
          
            $query = $this->db->get_where('daotrang');
          
            return $query->result();
        }
public function getTenDaoTrang($iddaotrang='')
{
    if ($iddaotrang=='') return "Tất cả các đạo tràng";
    $query = $this->db->get_where('daotrang', array('iddaotrang'=>$iddaotrang));
    if ( $query->num_rows()==0) return '';
    $row=$query->row();
    return $row->tendaotrang ;
}
public function chitiet($id)
        {
        	$query= $this->db->get_where('v-thong-tin-thanh-vien', array('id' =>$id));
        	if ($query->num_rows()>0)
        		{
        			$row= $query->row();
        			return $row;
        		}
        	else return array();
        }

        function chitietthanhvien()
        {
            $login = $this->session->userdata('login');
            return $this->chitiet($login->id);
        }

        function them()
        {
         /*for($i=1000; $i<2000; $i++)
         {
            $data = array('iddaotrang'=>'1',
                    'code'=>$i,
                    'hoten'=>"Thanh vien $i",
                   
                );
            $this->db->insert('thanhvien', $data);
        }*/
           // echo $this->db->affected_rows();
           // echo $this->db->last_query();

        }
        
        public function sua()
        {
         $data = array(
                   
                  //  'code'=>'9939',//$this->input->post('code'),
                    'hoten'=>$this->input->post('hoten'),
                    'phapdanh'=>$this->input->post('phapdanh'),
                    'ngaysinh'=>$this->input->post('ngaysinh'),
                    'gioitinh'=>$this->input->post('gioitinh'),
                    'noidkhk'=>$this->input->post('noidkhk'),
                    'cmnd'=>$this->input->post('cmnd'),
                    'ngaycap'=>$this->input->post('ngaycap'),
                    'noicap'=>$this->input->post('noicap'),
                    'nghenghiep'=>$this->input->post('nghenghiep'),

                     'tinhtrangthannhan'=>$this->input->post('tinhtrangthannhan'),
                     'sodtcanhan'=>$this->input->post('sodtcanhan'),
                     'sodtnguoithan'=>$this->input->post('sodtnguoithan'),
                    'ghichu'=>$this->input->post('ghichu'),
                    'tinhtrangbenhly'=>$this->input->post('tinhtrangbenhly'),
        
                );


            $this->db->set('hoten', $data['hoten']); 
            $this->db->set('phapdanh', $data['phapdanh']);
           $this->db->set('ngaysinh', $data['ngaysinh']); 
            $this->db->set('gioitinh', $data['gioitinh']);

            $this->db->set('noidkhk', $data['noidkhk']); 
            $this->db->set('cmnd', $data['cmnd']);
            $this->db->set('ngaycap', $data['ngaycap']); 
            $this->db->set('noicap', $data['noicap']);

            $this->db->set('nghenghiep', $data['nghenghiep']); 
            $this->db->set('tinhtrangthannhan', $data['tinhtrangthannhan']);
            $this->db->set('sodtcanhan', $data['sodtcanhan']); 
            $this->db->set('sodtnguoithan', $data['sodtnguoithan']);

             $this->db->set('ghichu', $data['ghichu']); 
            $this->db->set('tinhtrangbenhly', $data['tinhtrangbenhly']);
            $h1 = $this->saveHinh('hinhcmnd1', $this->input->post('id'));
                        if ($h1 != false)  {  
                             $this->db->set('hinhcmnd1', $h1);
                           }

            $h2 = $this->saveHinh('hinhcmnd2', $this->input->post('id'));
                        if ($h2 != false) 
                         {  $this->db->set('hinhcmnd2', $h2);}

            $h3 = $this->saveHinh('hinh46', $this->input->post('id'));
                        if ($h3 != false)           
                        {  $this->db->set('hinh46', $h3);}
       
            $data['id']= $this->input->post('id');
            $this->db->where('id', $data['id']);
            $this->db->update('thanhvien'); 

      //      echo $sql;
            print_r($data);
           // echo $this->db->affected_rows();
     
       //  $this->db->where('id', $this->input->post('id'));
         //   $this->db->update('thanhvien', $data);

        }

        public function saveHinh($hinh, $id='')
        {
            if (!isset($_FILES[$hinh])) return false;
            if ($_FILES[$hinh]['error'])
                return false;
            $arr = array('image/png', 'image/jpg', 'image/jpeg', 'image/bpm');
            $ext = $_FILES[$hinh]['type'];
            if (!in_array($ext, $arr)) return false;
            $ten = $id.'-' .time().'-'.$_FILES[$hinh]['name'];
            $des = "assets/image/cmnd/". $ten;
            if (move_uploaded_file($_FILES[$hinh]['tmp_name'], $des))
                return $ten;
            return false;
        }
        public function xoanhanvien($id)
        {
        	$this->db->delete('nhansu', array('id'=>$id));
        }


 public function sua2()
        {
            $login = $this->session->userdata('login');
          //  print_r($login);
         $data = array(
                    'id'=>$login->id,
                  //  'code'=>'9939',//$this->input->post('code'),
                    'hoten'=>$this->input->post('hoten'),
                    'phapdanh'=>$this->input->post('phapdanh'),
                    'ngaysinh'=>$this->input->post('ngaysinh'),
                    'gioitinh'=>$this->input->post('gioitinh'),
                    'noidkhk'=>$this->input->post('noidkhk'),
                    'cmnd'=>$this->input->post('cmnd'),
                    'ngaycap'=>$this->input->post('ngaycap'),
                    'nghenghiep'=>$this->input->post('nghenghiep'),
                    'noicap'=>$this->input->post('noicap'),
                    'mota'=>$this->input->post('mota'),
                    'cmnd'=>$this->input->post('cmnd'),
                   
                    'tinhtrangthannhan'=>$this->input->post('tinhtrangthannhan'),
                    'sodtcanhan'=>$this->input->post('sodtcanhan'),
                     'sodtnguoithan'=>$this->input->post('sodtnguoithan'),
                    
                    'ghichu'=>$this->input->post('ghichu'), 
                    'tinhtrangbenhly'=>$this->input->post('tinhtrangbenhly')

                );


            $sql="UPDATE `thanhvien` SET `hoten` = '{$data['hoten']}', `phapdanh` = '{$data['phapdanh']}', `ngaysinh` = '{$data['ngaysinh']}', `gioitinh` = '{$data['gioitinh']}', `noidkhk` = '{$data['noidkhk']}', `cmnd` = '{$data['cmnd']}', `ngaycap` = '{$data['ngaycap']}', `noicap` = '{$data['noicap']}', `nghenghiep` = '{$data['nghenghiep']}', `tinhtrangthannhan` = '{$data['tinhtrangthannhan']}', `sodtcanhan` = '{$data['sodtcanhan']}', `sodtnguoithan` = '{$data['sodtnguoithan']}', `ghichu` = '{$data['ghichu']} ',  `tinhtrangbenhly` = '{$data['tinhtrangbenhly']}' ";

            $h1 = $this->saveHinh('hinhcmnd1', $login->id);
                        if ($h1 != false)   $sql.=" , hinhcmnd1='$h1' ";

            $h2 = $this->saveHinh('hinhcmnd2', $login->id);
                        if ($h2 != false)               $sql.=" , hinhcmnd2='$h2' ";
             $h3 = $this->saveHinh('hinh46', $login->id);
                        if ($h3 != false)               $sql.=" , hinh46='$h3' ";
            $sql.=" WHERE `thanhvien`.`id` = '". $login->id."'";
          //  echo $sql;
            $this->db->query($sql);
            echo $this->db->affected_rows();
     
       //  $this->db->where('id', $this->input->post('id'));
         //   $this->db->update('thanhvien', $data);

        }

       
		public function insertNhanvien()
		{
			$data = array('hoten'=>$this->input->post('hoten'),
					'namsinh'=>$this->input->post('namsinh'),
					'chucvu'=>$this->input->post('chucvu'),
                    'namvaolam'=>$this->input->post('namvaolam'),
                    'mota'=>$this->input->post('mota')
				);
			$this->db->insert('nhansu', $data);
		}

		
public function login($code, $phone)
{
  // return 1;
    $arr= array('code'=>$code, 'sodtcanhan'=>$phone);
   $query= $this->db->get_where('thanhvien', $arr);
  // echo $this->db->last_query();return;
   
 if ($query->num_rows()>0)
        {
            $row= $query->row();
            $a= array('login'=>$row);
            $this->session->set_userdata($a);
            return 1;
        }
    else return 0;
}


function taoDSThanhVienTheoDaoTrang($iddaotrang, $code1, $code2)
    {
       // echo "$iddaotrang, $code1, $code2 ==";
        //$this->db->delete('thanhvien_tam');
        for($i=$code1; $i<=$code2; $i++)
         {
            $code = substr('000'. $i,  -5);
            $n = rand(1000, 9999);
            $sql="insert into thanhvien_tamcapcode(iddaotrang, code, sodtcanhan ) ";
            $sql.=" values('$iddaotrang' ,'$code'  , '$n' )";
       //     echo "$i - $sql <br>";
        $this->db->query($sql);
        }
        
    }

    function moveFromTam2ThanhVien()
    {
        $this->db->query("insert into thanhvien(iddaotrang, code, sodtcanhan) select iddaotrang, code, sodtcanhan from thanhvien_tamcapcode");
        $this->db->empty_table('thanhvien_tamcapcode'); 
      //  $this->db->delete('thanhvien_tam');
    }

/**
 * [moveFromTam2ThanhVien2 xu ly file data duoc do vao tu excel]
 * @return [type] [description]
 */

//function moveFromTam2ThanhVien2()
function moveFromTamFromExcel2ThanhVien2()
    {
    

        $query= $this->db->query("select code, hoten, phapdanh, ngaysinh, gioitinh, noidkhk, cmnd, ngaycap,noicap, nghenghiep, tinhtrangthannhan,  sodtcanhan   from thanhvien_tam_fromexcel ");
        $data = $query->result_array();

    foreach ($data as $key => $value) 
        {
            $this->db->where('code', $value['code']);
            $this->db->update('thanhvien', $value);
           // $this->db->update($sql, $value);   
         //  echo "<br>". $this->db->last_query();   
         } ;
       
  //      $this->db->empty_table('thanhvien_tam_fromexcel'); 
   
    }

/**
 * [filter thanh vien theo code:]
 * @param  [type] $tu  [Từ code số]
 * @param  [type] $den [Đến code số]
 * @return [type]      [description]
 */
function filter($tu, $den)
{
  $this->db->where('code>=', $tu);
  $this->db->where('code <=', $den); 
  $this->db->where('hoten <>', '');
  $query =$this->db->get('thanhvien');
  return $query->result();
}

function updatedangKyTuHCM($code, $n)
{
  $this->db->update('thanhvien', array('dangkytu'=>$n), array('code'=>$code));
  return $this->db->affected_rows();
}

/**
 * [dangkycongtuHCM Danh sachs dang ky cong tu HCM or not]
 * @param  [type] $n [0: chua dk, 1: da dang ky]
 * @return [type]    [list]
 */
function dangkycongtuHCM($n)
{
  $query = $this->db->get_where('v_thanh_vien_da_nhap_lieu',array('dangkytu'=>$n));
  return $query->result();
}

function capnhatcongTuHCM($code, $dangkytu)
{
  $this->db->set('dangkytu', $dangkytu);
$this->db->where('code', $code);
$this->db->update('thanhvien'); 
//echo $this->db->last_query();
return $this->db->affected_rows();
}
}

