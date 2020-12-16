<?php
class Thanhvien2_model extends CI_Model 
{

public function chinhsuaChuaHoSo()
{
    $query =$this->db->query("select id, hoten, phapdanh, ngaysinh, gioitinh, sodtcanhan, sodtnguoithan from thanhvien where dacohoso=0 and hoten<>'' and iddaotrang <>10 ");
    $data = $query->result_array();

    $query2 =$this->db->query("select id from thanhvien where iddaotrang=10 and (hoten='' or hoten is null ) " );
    $data2 = $query2->result_array();

    $r0 =['hoten'=>'', 'phapdanh'=>'','sodtcanhan'=>'','sodtnguoithan'=>''];
    foreach ($data as $key => $value) {
      $r= $value;
      unset($r['id']); 

      $id2= $data2[$key]['id'];

      $this->db->where('id', $id2);
      $this->db->update('thanhvien', $r);


      $this->db->where('id', $value['id']);
      $this->db->update('thanhvien', $r0);

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


}

