<!DOCTYPE html>
<html lang="vi">

<?php

$this->load->view("subpage/head.php");
?>
<body>
	<style type="text/css">
		ul li{list-style-type: none}
		div>a {margin-top: 5px}
	</style>
	<div class="container">
		<h1>HƯỚNG DẪN SỬ DỤNG CHO THÀNH VIÊN</h1>	
		<div>
		<a href="#buoc0" class="btn btn-info btn-block" data-toggle="collapse"><div> Hướng dẫn sử dụng </div></a>
		</div>
		<div id="buoc0" class="collapse">
		  	<ul>
		  		<li>
        		Mỗi thành viên sẽ thuộc một đạo tràng cụ thể. Trưởng đạo tràng sẽ cung cấp cho các thành viên trong đạo tràng của mình phụ trách các thông tin: Mã Code (5 số, các thành viên có mã khác nhau), mật khẩu (4-5 số). Sau khi đăng nhập, thành viên có thể thay đổi mật khẩu của mình.
        		</li>
				<li>
					Lưu ý: Không chia sẻ mật khẩu này với người khác. <br>
					Khi có các thông tin này, các thành viên có thể:
					<div>
					-	Đăng nhập. <br>
					-	Chỉnh sửa các thông tin cá nhân. <br>
					-	Đăng ký các kỳ khóa tu (trong thời gian đăng ký).
				</li>	
		    </ul>
		</div>
		<div>
		<a href="#buoc1" class="btn btn-info btn-block" data-toggle="collapse"><div> Bước 1.  Đăng nhập </div></a>
		</div>
		<div id="buoc1" class="collapse">
		  	<ul>
        		<li>Vào trang web: <?php echo base_url();?>, Bấm đăng nhập</li>
        		<li>
				<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/1.png">
        		</li>
        		<li>
        			Nhập vào code (ô code) và mật khẩu (vào ô số điện thoại cá nhân) vào hộp thoại và bấm đăng nhập.
        		</li>
        		<li>
        		<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/2.png">
        	</li>
        	<li>
        		Nếu đăng nhập thành công, màn hình chuyển sang trang đăng ký <br>
        		<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/3.png" width=100%>
        	</li>
        </ul>
		</div>

		<div>
		<a href="#buoc2" class="btn btn-info btn-block" data-toggle="collapse"><div>	Bước 2. Chỉnh sửa thông tin cá nhân </div></a>
		</div>
		<div id="buoc2" class="collapse">
		<ul>
    		<li>-	Bấm vào tab Thông tin cá nhân (1) -> Chỉnh sửa thông tin (2):  để chỉnh sửa thông tin cá nhân <br>
			<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/4.png">
    		</li>
    		<li>
			-	Nhập tất cả các thông tin vào form và bấm nút: Lưu sửa (5) để lưu lại kết quả. <br>
			Lưu ý: 
			Cần chuẩn bị 3 hình ảnh: CMND mặt trước, CMND mặt sau, Hình thẻ (trong điện thoại hay máy tính). <br>
			Số điện thoại cá nhân: Trở thành mật khẩu (1) cho thành viên đăng nhập lần sau.
			Nhập hình CMND mặt trước (2) (từ điện thoại, máy tính), mặt sau (3), hình thẻ (4): để chọn hình ảnh.
			<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/5.png">
    		</li>
    		<li>
    	</ul>
		</div>


		<div>
		<a href="#buoc3" class="btn btn-info btn-block" data-toggle="collapse"><div>Bước 3. Đăng ký các kỳ khóa Tu </div></a>
		</div>
		<div id="buoc3" class="collapse">
		  	<ul>
        		<li>- Sau khi đăng nhập hệ thống, chỉnh sửa thông tin cá nhân, thành viên có thể đăng ký các kỳ khóa tu. Bấm vào tab Các kỳ khóa tu đang đăng ký (1) để xem danh sách các kỳ khóa tu đang đang ký.
				-	Chọn kỳ khóa tu cần đăng ký->  bấm Thực hiện đăng ký (2)
 				<br>
				<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/6.png">
        		</li>
        		<li>
				- Nhập mã bảo vệ phù hợp với màn hình và bấm Đăng ký  để lưu lại kết quả. 
				•	Lưu ý: Mỗi thành viên được đăng ký và hủy đăng ký 2 lần (2 lần đăng ký + 2 lần hủy = 4 lần). Lần 1 ->đăng ký, lần 2: hủy, lần 3: đăng ký, lần 4: hủy.
 				<br>
				<img src="<?php echo base_url();?>assets/image/huong-dan-su-dung/7.png">
        		</li>
		        <li>
		        </ul>
		  </div>

</div>
</body>