<!--[if !IE]> -->
		<script src="<?php echo base_url()?>assets/admin/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url()?>assets/admin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url()?>assets/admin/assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/dataTables.select.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/buttons.colVis.min.js"></script>
		

		<!-- ace scripts -->
		<script src="<?php echo base_url()?>assets/admin/assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url()?>assets/admin/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table').DataTable( 
					{
        dom: 'frtB',

        scrollY: '50vh',
        scrollCollapse: true,
        "bAutoWidth": true,
        "pagingType": "full_numbers",
        "iDisplayLength": 20,
        "bLengthChange": false,
        ordering: false,

        buttons: [
            {
                extend: 'csv',
                className: 'btn btn-success',
                text: 'Export to Excel',
                //footer: true,
                title: 'Commissions Export'
            }
        ]
    }
					
				/*{
					
					dom: "fltip",
					"pagingType": "full_numbers"
					
			    } */

			    );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						exportOptions: {
										columns: ':visible',
										},
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",

						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						exportOptions: {
										columns: ':visible',
										},
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
				
				
				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			
			
			
			
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});
			
			
			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>


<script type="text/javascript">
var base_url = "<?php echo base_url() ?>";
	$('#myModal1').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');
        $("#myModal1 #idnhanvien").val(id);
  // alert(id);
  loadChitietNghiPhep(id);

});

function openThemMoiThanhVien()
{
	$("#myModalThemMoiThanhVien").modal('show');
}

$('#myModal3').on('shown.bs.modal', function (event) {

    var button = $(event.relatedTarget);
        var id = button.data('id');

  // alert(id);
  loadChitietThanhVien(id);

})

function loadChitietThanhVien(id)
{
	//alert(id); return;
	$("#idthanhvien").val(id);//return;
	url = base_url +'Admin/chitietthanhvien/';
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		datatype:'json',
		success:function(data2)
		{
			data2= JSON.parse(data2);
		
			console.log(data2);
			
			$("#myModal3 #ttt_code").html(data2.code);
			$("#myModal3 input[name=hoten]").val(data2.hoten);
			$("#myModal3 input[name=phapdanh]").val(data2.phapdanh);
			$("#myModal3 input[name=ngaysinh]").val(data2.ngaysinh);
			//$("#myModal3 input[name=gioitinh]").val(data2.gioitinh);
			if (data2.gioitinh=='Nam')
				$("#myModal3 input.gtnam[name=gioitinh]:first").prop("checked", true); 
			else $("#myModal3 input.gtnu[name=gioitinh]:first").prop("checked", true); 

			$("#myModal3 input[name=noidkhk]").val(data2.noidkhk);

			$("#myModal3 input[name=cmnd]").val(data2.cmnd);
			$("#myModal3 input[name=noicap]").val(data2.noicap);
			$("#myModal3 input[name=nghenghiep]").val(data2.nghenghiep);
			$("#myModal3 input[name=tinhtrangthannhan]").val(data2.tinhtrangthannhan);
			$("#myModal3 input[name=sodtcanhan]").val(data2.sodtcanhan);
			$("#myModal3 input[name=sodtnguoithan]").val(data2.sodtnguoithan);
			$("#myModal3 textarea[name=tinhtrangbenhly]").val(data2.tinhtrangbenhly);
			$("#myModal3 #ghichu").val(data2.ghichu);


			if (data2.hinhcmnd1 !='' && data2.hinhcmnd1 !='null')
			{
				h1 = base_url+'assets/image/cmnd/'+data2.hinhcmnd1;
			}
			else h1 = base_url+'assets/image/cmnd/0image.png';
			//alert(h1);
			$("#myModal3 img#h1").prop('src',h1);
			if (data2.hinhcmnd2 !='' && data2.hinhcmnd2 !='null')
			{
				h2 = base_url+'assets/image/cmnd/'+data2.hinhcmnd2;
			}
			else h2 = base_url+'assets/image/cmnd/0image.png';
			$("#myModal3 img#h2").prop('src',h2);

			if (data2.hinh46 !='' && data2.hinh46 !='null')
			{
				h3 = base_url+'assets/image/cmnd/'+data2.hinh46;
			}
			else h3 = base_url+'assets/image/cmnd/0image.png';
			$("#myModal3 img#h3").prop('src',h3);



		}
	});

}

function fLuuMoi()
{
	alert('New');
	url ='<?php echo base_url() ?>quanly/themnhanvien/';
	data= $("#frmthemmoi").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			location.reload();
			//console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function fLuuSua()
{    alert('Dữ liệu sẽ cập nhật...admin');


	var form = $("#myModal3 form");
    var formData = new FormData(form[0]);
	url ='<?php echo base_url() ?>admin/suathanhvien/';
	
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

function fthemngaycong()
{alert('Dữ liệu sẽ cập nhật...');
	url ='<?php echo base_url() ?>quanly/suanhanvien/';
	data= $("#frmthemngaycong").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			location.reload();
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function fthemngaynghi()
{//alert('Dữ liệu sẽ cập nhật...');
	url ='<?php echo base_url() ?>quanly/themngaynghi/';
	data= $("#frmthemngaynghi").serialize();
	$.ajax({
		url:url,
		data:data,
		type:"POST",
		//datatype:'json',
		success:function(data2)
		{
			//location.reload();
			if (data2=='1')//them ok
			{
				loadChitietNghiPhep($("#frmthemngaynghi #idnhanvien").val());
			}
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

function XoaNghiPhep(idphep)
{
	url ='<?php echo base_url() ?>quanly/xoanghiphep/';
	if (confirm('Xoa?')==false) return;
	$.ajax({
		url:url,
		data:{id:idphep},
		type:"GET",
		//datatype:'json',
		success:function(data2)
		{
			//location.reload();
			$("#nghiphep_"+idphep).hide(1000);
			console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}
function fXoa(id)
{
	
	url ='<?php echo base_url() ?>quanly/xoanhanvien/';
	if (confirm('Xoa?')==false) return;
	$.ajax({
		url:url,
		data:{id:id},
		type:"GET",
		//datatype:'json',
		success:function(data2)
		{
			location.reload();
			//console.log(data2);
			//alert("Xng");
			//$("#myModal1 #hoten").val(data2.hoten);
		}
	});
}

</script>