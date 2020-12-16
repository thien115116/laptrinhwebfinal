<?php
class CtKhoaTu_model extends CI_Model 
{

      public function  chuongTrinhKhoaTuDangDangKy()
      {
          $admin_login = $this->session->userdata('admin_login');
         // if ($admin_login->su==1)
            $query = $this->db->get("v_chuongtrinhkhoatu_dangdangky");
          //  $query = $this->db->get("v_chuongtrinhkhoatu_dangdangky");

            return $query->result();
      }
       
      public function chuongTrinhKhoaTuAll()
      {
        $query = $this->db->get('v_chuong_trinh_khoa_tu_all');
        return $query->result();
      }
      public function  chuongTrinhKhoaTuCu()
      {

            $query = $this->db->get("v_chuongtrinhkhoatu_cu");
            return $query->result();
        
      }
		
     public function  chuongTrinhKhoaTu()
      {
        $query = $this->db->get("v_ket_qua_dang_ky");
            return $query->result();
      }

      
    public function  chuongTrinhKhoaTuChiTiet($id)
      {
        $query = $this->db->get_where("v_chuong_trinh_khoa_tu_all", ['idctkhoatu'=>$id]);
       
            return $query->row();
      }

   public function CtKhoaTuLuu()
    {
      $data = array(
                  //  'idctkhoatu'=>$this->input->post('idctkhoatu'),
                    'tieude'=>$this->input->post('tieude'),
                    'tomtat'=>$this->input->post('tomtat'),
                    'noidung'=>$this->input->post('noidung'),
                    'ngaybatdautu'=>$this->input->post('ngaybatdautu'),
                    'ngayketthuctu'=>$this->input->post('ngayketthuctu'),
                    'ngaybatdaudk'=>$this->input->post('ngaybatdaudk'),
                    'ngayketthucdk'=>$this->input->post('ngayketthucdk'),

                    );
       
            $this->db->where('idctkhoatu', $this->input->post('idctkhoatu'));
            $this->db->update('chuongtrinhkhoatu', $data);

    }

public function CtKhoaTuLuuMoi()
    {
      $data = array(
                    'tieude'=>$this->input->post('tieude'),
                    'tomtat'=>$this->input->post('tomtat'),
                    'noidung'=>$this->input->post('noidung'),
                    'ngaybatdautu'=>$this->input->post('ngaybatdautu'),
                    'ngayketthuctu'=>$this->input->post('ngayketthuctu'),
                    'ngaybatdaudk'=>$this->input->post('ngaybatdaudk'),
                    'ngayketthucdk'=>$this->input->post('ngayketthucdk'),

                    );
       
           
            $this->db->insert('chuongtrinhkhoatu', $data);
           /* echo $this->db->last_query();
            echo $this->db->affected_rows();*/

    }

function CtKhoaTuXoa($idctkhoatu)
{
    $this->db->delete('chuongtrinhkhoatu', array('idctkhoatu'=>$idctkhoatu));
    echo $this->db->affected_rows();
}

function timDangKy($idctkhoatu, $id)
      {
        $query = $this->db->get_where('dangky', ['idctkhoatu'=>$idctkhoatu, 'idthanhvien'=>$id] );
       // echo $this->db->last_query();
        $rowcount = $query->num_rows();
        return $rowcount;
      }
      
      /**
       * [thongtindangkyThanhvien: su dung cho user dang ky. Lay thong tin cac thanh vien]
       * @return [type] [Thong tin user ve ket qua dang ky cac lan truoc]
       */
  function thongtindangkyThanhvien()
      {
        $idctkhoatu = $this->input->post('idctkhoatu');

        $login = $this->session->userdata('login');
        $n =$this->timDangKy($idctkhoatu, $login->id);
        if ($n)  //chinh sua
          $query = $this->db->get_where('v_thong-tin-dang-ky-thanh-vien', ['idctkhoatu'=>$idctkhoatu, 'id'=>$login->id]);
        else 
          $query = $this->db->get_where('v_thong-tin-dang-ky-thanh-vien-0', ['idctkhoatu'=>$idctkhoatu, 'id'=>$login->id]);

       // echo $this->db->last_query();exit;
        return $query->row();

      }
      function getlast($idctkhoatu, $idthanhvien)
      {
       $query=$this->db->get_where(array('idthanhvien'=>$idthanhvien, 'idctkhoatu'=>$idctkhoatu));
        if ($query->num_rows()>0)
          return $query->row()->iddangky;
        else return false;
      }
      
      function dangkySua()
      {
        
        $data = array();
        $login = $this->session->userdata('login');
        $idctkhoatu = $this->input->post('idctkhoatu');
        $idthanhvien  = $login->id;
        $iddangky = $this->input->post('iddangky');
        $data['ngaythaotac'] = Date("Y-m-d H:i:s");
        $data['trangthai']  = $this->input->post('trangthai');
        $data['solanchinhsua']  = $this->input->post('solanchinhsua');

        $this->db->update('dangky', $data, array('iddangky' => $iddangky,'idthanhvien'=>$idthanhvien, 'idctkhoatu'=>$idctkhoatu ));
      
        echo  $this->db->affected_rows();
      
      }
/**
 * [dangkyMoi Su dung cho user dang nhap vao he thong va tu dang ky]
 * @return [int] [1: Thanh cong, 0: khong thanh cong]
 */

function dangkyMoi()
      {
       
        $login = $this->session->userdata('login');
        $data['idthanhvien'] = $login->id;
        $data['code'] = $login->code;
        $data['hoten'] = $login->hoten;
       // $data['ghichu'] = $this->input->post('ghichu');
        $data['idctkhoatu'] = $this->input->post('idctkhoatu');
        $data['trangthai']=$this->input->post('trangthai');
        $data['solanchinhsua'] = 1;
     //   print_r($data);exit;
        $this->db->insert('dangky', $data);
     //   echo $this->db->last_query();   return;
        echo  $this->db->affected_rows();
      
      }

/**
 * [dangkyMoi2 description]
 * @return [type] [description]
 */
function dangkyMoi2()
      {
        $data['idthanhvien'] = $this->input->post('id');
        $data['code'] = $this->input->post('code');
        $data['hoten'] = '';
       // $data['ghichu'] = $this->input->post('ghichu');
        $data['idctkhoatu'] = $this->input->post('idctkhoatu');
        $data['trangthai']=$this->input->post('trangthai');
        $data['solanchinhsua'] = 1;
   // print_r($data);return;
   if ($data['trangthai']=="HUY")
      $this->db->delete('dangky', array('idthanhvien'=>$data['idthanhvien']));
   else
        $this->db->insert('dangky', $data);
        echo $this->db->last_query();   return;
        echo  $this->db->affected_rows();

      
      }


/**
 * [DanhsachDangKy description: danh sach dang ky cac chuong trinh khoa tu.
 * Neu: su=0: (admin): lay tat ca, su=1: Lay danh sach dao trang cua quan ly nay]
 * @param [type] $idctkhoatu [description]
 */
      function DanhsachDangKy($idctkhoatu, $iddaotrang='')
      {
        $admin_login = $this->session->userdata('admin_login');
        if (!$admin_login) exit;
        if ($admin_login->su=='0')
        {
          if ($iddaotrang=='')
            $query= $this->db->get('v_danh_sach_dang_ky_ctkhoatu');
          else $query= $this->db->get_where('v_danh_sach_dang_ky_ctkhoatu', ['iddaotrang'=>$iddaotrang]);
         return $query->result();
        }
        if ($admin_login->su=='1')
        {
          $query=  $this->db->get_where('v_danh_sach_dang_ky_ctkhoatu', array('uid'=>$admin_login->uid));

          return $query->result();
        }
        return array();
      }

function ketquadangkytongquat($idctkhoatu)
{

}

function xulybangThanhVienDangKy($idctkhoatu=4)
{
/*
1. doc table thanhviendangky 
2. Lay hoten-phapdanh
3. Tim hoten-phapdanh trong thanhvien
  neu co: //thanh vien dang ky da co trong thanh vien
    {
      //capnhat code tu thanhvien sang thanhviendangky
      dangkykhoatu cho thanh vien nay
      xoa thanhviendangky
    }
  neu chua:
  {
    move thanh vien toi table thanhvien
    (code=CHUACAP)
    dangkykhoatu cho thanhvien nay 
    {
    lay id, code (CHUACAP), daotrang
    }

  }
*/
 $query = $this->db->get('thanhviendangky');
$n=0;
foreach ($query->result() as $row)
{
        $hoten= $row->hoten;
        $phapdanh = $row->phapdanh;
        $arr = $this->timDangKy2($hoten, $phapdanh);
      //  print_r($arr);
      if ($arr)
        {$n++;
        echo "<br>$n:". $arr->id ."-".$arr->code ."-".$arr->hoten;
      }
}
  
}

/**
 * [timDangKy description]
 * @param  [type] $hotenphapdanh [description]
 * @return [type]                [tra ve dong dau tien (hy vong duy nhat) tim duoc
 * (: id, code, soluong: 0: khong tim thay, 1: tim thay 1 ket qua, 2: Tim thay >1)]
 */
public function timDangKy2($hoten, $phapdanh)
{

 // $query=$this->db->get_where('thanhvien', array('hoten'=>$hoten, 'phapdanh'=>$phapdanh));
//  $query=$this->db->get_where('thanhvien', array('hoten'=>$hoten));

$query = $this->db->query("select * from thanhvien where hoten='$hoten' ");
  echo "<hr>". $this->db->last_query();
 // $n= $query->num_rows(); 
 $n=$this->db->affected_rows();
  echo " n= (($n))  ";
  print_r($query->row());
  if ($n>0)
  {
     echo "<br>OK: $hoten - $phapdanh ";
    return $query->row();
  }
   echo "<br> =========KG thay: $hoten - $phapdanh ";
  return false;


}
public function chitietThanhVien($id)
        {
          $query= $this->db->get_where('v-thong-tin-thanh-vien', array('id' =>$id));
          if ($query->num_rows()>0)
            {
              $row= $query->row();
              return $row;
            }
          else return array();
        }

/**
 * [getHoTenPhapDanh description]
 * @param  [type] $id [description]
 * @return [type]     [tra ve Hoten-Phapdanh]. 
 */
public function getHoTenPhapDanh($id)
        {
          $query= $this->db->get_where('thanhviendangky', array('idthanhvientam' =>$id));
          if ($query->num_rows()>0)
            {
              $row= $query->row();
              return $row->hoten ."-". $row->phapdanh;
            }
          else return '-';
        }
public function kiemtraNgayTu($idctkhoatu)
{
    $query = $this->db->get_where('v_ctkhoatu_chuatu', array('idctkhoatu'=>$idctkhoatu));
    if ( $query->num_rows()==0) return 0;
    $row=$query->row();
    return $row->tieude ." (" . $row->ngaybatdautu ." tới " . $row->ngayketthuctu .")";
}

}
