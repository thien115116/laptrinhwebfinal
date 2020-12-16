<?php
class Tintuc_model extends CI_Model {
    

    public function gioithieu()
        {
             $query= $this->db->get_where('tintuc', array('loaitin' =>'gioithieu'));
            if ($query->num_rows()>0)
                {
                    $row= $query->row();
                    return $row;
                }
            else return array();
        }
public function GioiThieuLuu()
    {
      $this->saveTin();
    }
//------------ Dao Trang
public function  daotrang()
        {
            $query = $this->db->get_where('daotrang');
            return $query->result();
        }

public function  DaoTrangChiTiet($iddaotrang)
        {
            $query = $this->db->get_where('daotrang', ['iddaotrang'=>$iddaotrang]);
            if ($query->num_rows()>0)
                {
                    $row= $query->row();
                    return $row;
                }
            else return array();
        }

function DaoTrangLuu()
{
    $data = array();
    $data['iddaotrang'] =  $this->input->post('iddaotrang');
    $data['tendaotrang'] =  $this->input->post('tendaotrang');
    $data['diachi'] =  $this->input->post('diachi');
    $data['thongtin'] =  $this->input->post('thongtin');
    $query= $this->db->where(['iddaotrang'=>$this->input->post('iddaotrang')]);
  
    $this->db->update('daotrang', $data);
    return $this->db->affected_rows();
    //echo $this->db->last_query();
    
}

function DaoTrangXoa($id)
{
    $this->db->where(['iddaotrang'=>$id]);
    $this->db->delete('daotrang');
    return $this->db->affected_rows();
} 


function DaoTrangLuuMoi()
{
     $data = array();
   
    $data['tendaotrang'] =  $this->input->post('tendaotrang');
    $data['diachi'] =  $this->input->post('diachi');
    $data['thongtin'] =  $this->input->post('thongtin');
   
    $this->db->insert('daotrang', $data);
  
  
}

public function KhoaTuLuuMoi()
{
    return $this->tinTucLuuMoi('khoatu');
}
public function HoiDapLuuMoi()
{
    return $this->tinTucLuuMoi('hoidap');
}
//
public function tinTucLuuMoi($loaitin='khoatu')

        {
            $query=$this->db->get_where('tintuc');
            $id=$query->num_rows();
         $data = array(
                    'idtintuc'=>$id+1,
                    'tieude'=>$this->input->post('tieude'),
                    'tomtat'=>$this->input->post('tomtat'),
                    'noidung'=>$this->input->post('noidung'),
                    'loaitin'=>$loaitin,

                    );
         $hinh = $this->saveHinhTinTuc('hinhdaidien');
         if ($hinh)
            $data['hinhdaidien'] = $hinh;
       // print_r($_POST);
          $this->db->insert('tintuc', $data);
          return $this->db->affected_rows();

           
        }

public function saveHinhTinTuc($hinh, $id='')
        {
            if (!isset($_FILES[$hinh])) return false;
            if ($_FILES[$hinh]['error'])
                return false;
            $arr = array('image/png', 'image/jpg', 'image/jpeg', 'image/bpm');
            $ext = $_FILES[$hinh]['type'];
            if (!in_array($ext, $arr)) return false;
            $ten = $id.'-' .time().'-'.$_FILES[$hinh]['name'];
            $des = "assets/image/tintuc/". $ten;
            if (move_uploaded_file($_FILES[$hinh]['tmp_name'], $des))
                return $ten;
            return false;
        }

public function saveHinhSlider($hinh)
        {
            if (!isset($_FILES[$hinh])) return false;
            if ($_FILES[$hinh]['error'])
                return false;
            $arr = array('image/png', 'image/jpg', 'image/jpeg', 'image/bpm');
            $ext = $_FILES[$hinh]['type'];
            if (!in_array($ext, $arr)) return false;
            $ten = time().'-'.$_FILES[$hinh]['name'];
            $des = "assets/image/slider/". $ten;
            if (move_uploaded_file($_FILES[$hinh]['tmp_name'], $des))
                return $ten;
            return false;
        }



//---------- Gallery ---------------

public function  gallery($n=0)
        {
            $sql ="select * from gallery order by idgallery desc ";
            if ($n!=0) $sql .=" limit 0, $n";
            $query = $this->db->query($sql);
          //  $query = $this->db->get_where('gallery', );
            return $query->result();
        }

public function  galleryChiTiet($id)
        {
            $query = $this->db->get_where('gallerychitiet', ['idgallery'=>$id]);
           // echo $this->db->last_query();
            return $query->result();
           
        }

function GalleryLuu()
{
    $data = array();
    $data['iddaotrang'] =  $this->input->post('iddaotrang');
    $data['tendaotrang'] =  $this->input->post('tendaotrang');
    $data['diachi'] =  $this->input->post('diachi');
    $data['thongtin'] =  $this->input->post('thongtin');
    $query= $this->db->where(['iddaotrang'=>$this->input->post('iddaotrang')]);
  
    $this->db->update('daotrang', $data);
    return $this->db->affected_rows();
    //echo $this->db->last_query();
    
}

function GalleryXoa($id)
{
    $this->db->where(['iddaotrang'=>$id]);
    $this->db->delete('daotrang');
    return $this->db->affected_rows();
} 


function GalleryLuuMoi()
{
     $data = array();
   
    $data['tendaotrang'] =  $this->input->post('tendaotrang');
    $data['diachi'] =  $this->input->post('diachi');
    $data['thongtin'] =  $this->input->post('thongtin');
   
    $this->db->insert('daotrang', $data);
  
  
}

//---------- End Gallery-------------
//======================================================
//===== Khoa Tu Khoa tu (Khoa Tu-table tintuc)  =======

function KhoaTu()
{
   $query= $this->db->get_where('tintuc', ['loaitin'=>'khoatu']);
   return $query->result();
   
}

function KhoaTuChiTiet($id)
{
    return $this->TinChiTiet($id);
}

function KhoaTuLuu($id)
{
    return $this->TinTucLuu();//Luu tin cap nhat
}
function KhoaTuXoa($id)
{
   return $this->TinTucXoa($id);
} 

function KhoaTuLuuThem($id)
{
    return $this->TinTucLuuThem();
  
}


function Noiqui()
{
   $query= $this->db->get_where('tintuc', ['loaitin'=>'noiqui']);
   return $query->result();
   
}

function NoiquiChiTiet($id)
{
    return $this->TinChiTiet($id);
}

function NoiquiLuu($id)
{
    return $this->TinTucLuu();//Luu tin cap nhat
}
function NoiquiXoa($id)
{
   return $this->TinTucXoa($id);
} 

function NoiquiLuuThem($id)
{
    return $this->TinTucLuuThem();
  
}

private function  TinTucXoa($id)
{
    //Xoa hinh dai dien...
    $this->db->delete('tintuc', array('idtintuc'=>$id));
    return $this->db->affected_rows();
}

//============ Hoi dap ==============//

function Hoidap()
{
   $query= $this->db->get_where('tintuc', ['loaitin'=>'hoidap']);
   return $query->result();
   
}

function HoidapChiTiet($id)
{
    return $this->TinChiTiet($id);
}

function HoidapLuu($id)
{
    return $this->TinTucLuu();//Luu tin cap nhat
}
function HoidapXoa($id)
{
   return $this->TinTucXoa($id);
} 

function HoidapLuuThem($id)
{
    return $this->TinTucLuuThem();
  
}

//============ end Hoi dap ===========//

//======= Slider (cho trang chu ==========)
function Slider()
{
   $query= $this->db->get('slider');
   return $query->result();
   
}
//edit
function SliderLuu()
{

}
public function SliderLuuMoi()
        {
         $data = array(
                    'id'=>null,
                    'noidung'=>$this->input->post('noidung'),
                    'tacgia'=>$this->input->post('tacgia'),
                    'link'=>$this->input->post('link'),
                    );
         $hinh = $this->saveHinhSlider('hinh');
         if ($hinh)
            $data['hinh'] = $hinh;
      
          $this->db->insert('slider', $data);
          return $this->db->affected_rows();

           
        }

function sliderXoa($id)
{
    //xoa hinh truoc
    //lay hinh -> xoa hinh
    return $this->db->delete('slider', array('id'=>$id));
}


//======= Chuong trinh Khoa Tu =============
/**
 * Lấy n chương trình khóa tu mới nhất. (theo ngày bắt đầu và active=1)
 * @param [type] $n [description]
 */
function ChuongTrinhKhoaTu($n=0)
{
    $sql="SELECT * FROM
    chuongtrinhkhoatu WHERE anhien='1' order by ngaybatdautu asc ";

    if ($n>0)
        $sql .=" limit 0,$n"; 
    $query =   $this->db->query($sql);
    return $query->result();
   
}

function ChuongTrinhKhoaTuDangDangKy()
{
    
    $query =   $this->db->get('v_chuongtrinhkhoatu_dangdangky');
    return $query->result();
   
}
/**
 * [ChuongTrinhKhoaTuSapToi cac khoa tu chua toi dot tu nhung het hay chua toi han dang ky]
 */
function ChuongTrinhKhoaTuSapToi()
{
    
    $query =   $this->db->get('v_chuongtrinhkhoatu_sap_toi');
    return $query->result();
   
}

function ChuongTrinhKhoaTuChiTiet($id)
{
   $query = $this->db->get_where('chuongtrinhkhoatu', ['idctkhoatu'=>$id]);
   return $query->result();
}

function ChuongTrinhKhoaTuLuu($id)
{
    $data = $this->input->post;
   $this->db->where(['idctkhoatu'=>$id]);
   $this->db->update('chuongtrinhkhoatu', $data);
}
function ChuongTrinhKhoaTuXoa()
{
    $id = $this->uri->segment(3);
    $n = $this->Tintuc_model->ChuongTrinhKhoaTuXoa($id);
    redirect('admin/khoatu');
} 
function ChuongTrinhKhoaTuThem()
{
    
    $this->load->view("admin_index", array("subview"=>"about", 'data'=>$data));

}
function ChuongTrinhKhoaTuLuuThem()
{
    $n = $this->Tintuc_model->ChuongTrinhKhoaTuLuuThem();
    redirect('admin/chuongtrinhkhoatu');
}





//chua..
        public function  danhsach($iddaotrang='')
        {
               
             
         
           if ($iddaotrang=='')
            $query = $this->db->get_where('thanhvien');
            else 
                 $query = $this->db->get_where('thanhvien', array('iddaotrang'=> $iddaotrang));
          //   echo $this->db->last_query();
            return $query->result();
        }
    

        public function chitiet($id)
        {
        	$query= $this->db->get_where('thanhvien', array('id' =>$id));
        	if ($query->num_rows()>0)
        		{
        			$row= $query->row();
        			return $row;
        		}
        	else return array();
        }

        public function TinChiTiet($id)
        {
            $query= $this->db->get_where('tintuc', array('idtintuc' =>$id));
            if ($query->num_rows()>0)
                {
                    $row= $query->row();
                    return $row;
                }
            else return array();
        }
        public function searchtintuc($key)
        {
            
            $this->db->select('*');
            $this->db->from('tintuc');
            $this->db->like('tieude',$key);
            $query= $this->db->get();
            return $query->result();
        }
        
        public function kyKhoaTu()
        {
            $query= $this->db->query("select * from tintuc where loaitin like 'khoatu%' ");
            return $query->result();
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
                    'id'=>$this->input->post('id'),
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
                    
                    'ghichu'=>$this->input->post('ghichu')

                );


            $sql="UPDATE `thanhvien` SET `hoten` = '{$data['hoten']}', `phapdanh` = '{$data['phapdanh']}', `ngaysinh` = '{$data['ngaysinh']}', `gioitinh` = '{$data['gioitinh']}', `noidkhk` = '{$data['noidkhk']}', `cmnd` = '{$data['cmnd']}', `ngaycap` = '{$data['ngaycap']}', `noicap` = '{$data['noicap']}', `nghenghiep` = '{$data['nghenghiep']}', `tinhtrangthannhan` = '{$data['tinhtrangthannhan']}', `sodtcanhan` = '{$data['sodtcanhan']}', `sodtnguoithan` = '{$data['sodtnguoithan']}', `ghichu` = '{$data['ghichu']} ' ";

            $h1 = $this->saveHinh('hinhcmnd1', $this->input->post('id'));
                        if ($h1 != false)   $sql.=" , hinhcmnd1='$h1' ";

            $h2 = $this->saveHinh('hinhcmnd2', $this->input->post('id'));
                        if ($h2 != false)               $sql.=" , hinhcmnd2='$h2' ";

            $sql.=" WHERE `thanhvien`.`id` = '". $this->input->post('id')."'";
            $this->db->query($sql);
            echo $this->db->affected_rows();
     
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

public function saveTin()
        {
            $thutu = $this->input->post('thutuhienthi')?$this->input->post('thutuhienthi'):0;
         $data = array(
                    'idtintuc'=>$this->input->post('idtintuc'),
                    'tieude'=>$this->input->post('tieude'),
                    'tomtat'=>$this->input->post('tomtat'),
                    'noidung'=>$this->input->post('noidung'),
                    'thutuhienthi'=>$thutu,
                    );
       //  print_r($data);
            $this->db->where('idtintuc', $this->input->post('idtintuc'));
            $this->db->update('tintuc', $data);

           
        }


        public function xoanhanvien($id)
        {
        	$this->db->delete('nhansu', array('id'=>$id));
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


		
      }
