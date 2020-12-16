
$('#myModal3_user').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');

  // alert(id);
  loadChitietThanhVienUser(id);

}) 

function fLuuSua2()
{    
$('#myModal3_user').modal({'backdrop': 'static'});
  var form = $("#myModal3_user form");
    var formData = new FormData(form[0]);
  url = base_url+'home/suathanhvien2/';
 // url = base_url+'admin/suathanhvien/',
  $.ajax({
    url:url,
    data:formData,
    type:"POST",
    //datatype:'json',
    success: function (data2) {
         //   alert(data2);
         if (data2=='1')
         {
          alert("Đã sửa!");
           location.reload();
          }
           console.log(data2);
        },
        cache: false,
        contentType: false,
        processData: false
  });
}
function loadChitietThanhVienUser()
{
//alert('Home cttv');
  url = base_url +'home/chitietthanhvien/';
 // alert(url); return;
  $.ajax({
    url:url,
    //data:{id:id},
    type:"GET",
    datatype:'json',
    success:function(data2)
    {
      data2= JSON.parse(data2);
    
      console.log(data2);
      
      $("#myModal3_user #code").html(data2.code);
      $("#myModal3_user input[name=hoten]").val(data2.hoten);
      $("#myModal3_user input[name=phapdanh]").val(data2.phapdanh);
      $("#myModal3_user input[name=ngaysinh]").val(data2.ngaysinh);
      $("#myModal3_user input[name=gioitinh]").val(data2.gioitinh);
      $("#myModal3_user input[name=noidkhk]").val(data2.noidkhk);

      $("#myModal3_user input[name=cmnd]").val(data2.cmnd);
      $("#myModal3_user input[name=noicap]").val(data2.noicap);
      $("#myModal3_user input[name=nghenghiep]").val(data2.nghenghiep);
      $("#myModal3_user input[name=tinhtrangthannhan]").val(data2.tinhtrangthannhan);
      $("#myModal3_user input[name=sodtcanhan]").val(data2.sodtcanhan);
      $("#myModal3_user input[name=sodtnguoithan]").val(data2.sodtnguoithan);
      $("#myModal3_user #tinhtrangbenhly").val(data2.tinhtrangbenhly);
      
      if (data2.hinhcmnd1 !='' && data2.hinhcmnd1 !='null')
      {
        h1 = base_url+'assets/image/cmnd/'+data2.hinhcmnd1;
      }
      else h1 = base_url+'assets/image/cmnd/0image.png';
    
      $("#myModal3_user img#h1").prop('src',h1);
      if (data2.hinhcmnd2 !='' && data2.hinhcmnd2 !='null')
      {
        h2 = base_url+'assets/image/cmnd/'+data2.hinhcmnd2;
      }
      else h2 = base_url+'assets/image/cmnd/0image.png';
      $("#myModal3_user img#h2").prop('src',h2);
      
      if (data2.hinh46 !='' && data2.hinh46 !='null')
      {
        h3 = base_url+'assets/image/cmnd/'+data2.hinh46;
      }
      else h3 = base_url+'assets/image/cmnd/0image.png';
      $("#myModal3_user img#h3").prop('src',h3);

      $("#myModal3_user img#h3").prop('src',h3);
    }
  });

}
