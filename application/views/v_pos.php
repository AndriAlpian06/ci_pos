<!DOCTYPE html>
<html>
<head>
	<title>Point Of Sale</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<div class="container">
		<div class="col-md-12 col-md-offset-1">
		<hr/>
			<form class="form-horizontal">
				<div class="form-group">
                    <label class="control-label col-xs-3" >Kode Barang</label>
                    <div class="col-xs-9">
                        <input name="kode" id="kode" class="form-control" type="hidden" placeholder="Kode Barang..." style="width:335px;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" >Nama Barang</label>
                    <div class="col-xs-9">
                        <input name="nama_barang" id="nama_barang" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;">
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-xs-3" >Harga</label>
                    <div class="col-xs-9">
                        <input name="harga" class="form-control" type="text" placeholder="Harga..." style="width:335px;" readonly>
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-xs-3" >Satuan</label>
                    <div class="col-xs-9">
                        <input name="satuan" class="form-control" type="text" placeholder="Satuan..." style="width:335px;" readonly>
                    </div>
                </div>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#nama_barang').on('input',function(){
                
                var nama_barang=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/pos/get_barang')?>",
                    dataType : "JSON",
                    data : {nama_barang: nama_barang},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kode, nama_barang, harga, satuan){
                            $('[name="nama"]').val(data.nama_barang);
                            $('[name="harga"]').val(data.harga);
                            $('[name="satuan"]').val(data.satuan);
                            
                        });
                        
                    }
                });
                return false;
           });

		});
	</script>
</body>
</html>