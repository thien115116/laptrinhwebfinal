<?php
class Base_model extends CI_Model 
{
  public function  chuongTrinhKhoaTu()
      {

            $query = $this->db->get("v_chuong_trinh_khoa_tu");
            return $query->result();
      }
	public function  daoTrang()
      {

            $query = $this->db->get("v_dao_trang");
            return $query->result();
      }
 
  function thanhvien()
  {
  $a= ['thanhvien'=>$this->Thanhvien_model->Tongsothanhvien(),
       'thanhvienUpdateCMND'=>$this->Thanhvien_model->Tongsothanhvien('cmnd'),
       'thanhvienActive'=>$this->Thanhvien_model->Tongsothanhvien('active'),
  ];
 
  return $a;
}

function copyThanhVienTam2ThanhVien()
{
  $code=1003;
  $query = $this->db->get('thanhvientam');
  $data = $query->result();
  foreach ($data as $key => $v) {
    $sql="update thanhvien set hoten='{$v->hoten}', phapdanh='{$v->phapdanh}', nghenghiep='{$v->nghenghiep}', noidkhk='{$v->noidkhktt}', cmnd='{$v->CMND}', ngaysinh='{$v->Sinh}-1-1', sodtcanhan='{$v->sodtcanhan}'  where code='$code' ";
   // echo $sql;
    $this->db->query($sql);
    $code++;
  }

}

function thongke()
{
  $data=['chung'=> $this->thongKeThanhVien(), 
        'daotrang'=>$this->thongKeDaotrang(),
      ];
  return $data;

}

 function thongKeThanhVien($iddaotrang='')
{
  if ($iddaotrang=='')
  {
  $query=$this->db->query("select Count(*) as dem from thanhvien where hoten <>'' " );
  $r = $query->row();
  $data=[];
  $tam = ['name'=>'Tất cả', 'value'=>$r->dem];
  $data[]=$tam;

  $query=$this->db->query("select Count(*) as dem from thanhvien where hoten <>'' and gioitinh='NAM' " );
  $r = $query->row();
  $tam = ['name'=>'Nam', 'value'=>$r->dem];
  $data[]=$tam;

  $tam = ['name'=>'Nữ', 'value'=>$data[0]['value']- $r->dem];
  $data[]=$tam;

  $query=$this->db->query("select Count(*) as dem from thanhvien where hoten <>'' and dacohoso=1 " );
  $r = $query->row();
  $tam = ['name'=>'Có HS', 'value'=>$r->dem];
  $data[]=$tam;

  $query=$this->db->query("select Count(*) as dem from thanhvien where hoten <>'' and danhanthe=1 " );
  $r = $query->row();
  $tam = ['name'=>'Nhận Thẻ', 'value'=>$r->dem];
  $data[]=$tam;

 }
 else
 {

  $query=$this->db->query("select Count(*) as dem from thanhvien where iddaotrang='$iddaotrang' and hoten <>'' " );
  $r = $query->row();
  $data=[];
  $tam = ['name'=>'Tất cả', 'value'=>$r->dem];
  $data[]=$tam;

  $query=$this->db->query("select Count(*) as dem from thanhvien where iddaotrang='$iddaotrang' and  hoten <>'' and gioitinh='NAM' " );
  $r = $query->row();
  $tam = ['name'=>'Nam', 'value'=>$r->dem];
  $data[]=$tam;

  $tam = ['name'=>'Nữ', 'value'=>$data[0]['value']- $r->dem];
  $data[]=$tam;

  $query=$this->db->query("select Count(*) as dem from thanhvien where iddaotrang='$iddaotrang' and  hoten <>'' and dacohoso=1 " );
  $r = $query->row();
  $tam = ['name'=>'Có HS', 'value'=>$r->dem];
  $data[]=$tam;

  $query=$this->db->query("select Count(*) as dem from thanhvien where iddaotrang='$iddaotrang' and  hoten <>'' and danhanthe=1 " );
  $r = $query->row();
  $tam = ['name'=>'Nhận Thẻ', 'value'=>$r->dem];
  $data[]=$tam;
 }

return $data;

  //print_r($data);

}

 function thongKeDaotrang()
{
  $query = $this->db->query('select * from daotrang');
  $data = $query->result();
  $tam=[];
  $r=['tendaotrang'=>'Toàn bộ', 'data'=>$this->thongKeThanhVien()];
  $tam[] = $r;
  foreach ($data as $key => $value) {
    $r=['tendaotrang'=>$value->tendaotrang, 'data'=>$this->thongKeThanhVien($value->iddaotrang)];
    $tam[]=$r;
  }
  return $tam;
}


}