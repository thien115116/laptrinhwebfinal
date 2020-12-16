<?php
class Gallery_model extends CI_Model {
    


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


		
      }
