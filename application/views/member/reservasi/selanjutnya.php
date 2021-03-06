 <div class="main-content">
    <div class="main-content-inner">
        <!-- #section:basics/content.breadcrumbs -->
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try {
                    ace.settings.check('breadcrumbs', 'fixed')
                } catch (e) {
                }
            </script>
 
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/pelanggan/daftar') ?>">Reservasi</a>
                </li>
                
                <li class="active">Tambah Data Reservasi Detil Kamar</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->

            <!-- /section:basics/content.searchbox -->
        </div>

        <!-- /section:basics/content.breadcrumbs -->
        <div class="page-content">
            <!-- #section:settings.box -->
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <!-- #section:settings.skins -->
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <!-- /section:settings.skins -->

                        <!-- #section:settings.navbar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <!-- /section:settings.navbar -->

                        <!-- #section:settings.sidebar -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <!-- /section:settings.sidebar -->

                        <!-- #section:settings.breadcrumbs -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <!-- /section:settings.breadcrumbs -->

                        <!-- #section:settings.rtl -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <!-- /section:settings.rtl -->

                        <!-- #section:settings.container -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>

                        <!-- /section:settings.container -->
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <!-- #section:basics/sidebar.options -->
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>

                        <!-- /section:basics/sidebar.options -->
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <!-- /section:settings.box -->
            <div class="page-header">
                <h1>
                    Formulir Tambah Data Reservasi
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/reservasi/pesan/'?>" role="form"> 
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
						<div class="form-group">        
                          <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                            Informasi Data Reservasi Detil Kamar
                          </div>
                        </div>
                       
						
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Data Pelanggan <span style="color:red;">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="col-xs-9 col-sm-5" id="form-field-1-1" placeholder="ID" id='id_pelanggan' value="<?php echo $id_pelanggan; ?>" name="txtIDpelanggan" style="margin-right:5px;width:50px;" readonly required/>
								<input type="text" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Nama Pelanggan" id='id_pelanggan' value="<?php echo $nama_lengkap; ?>" name="txtNamaPelanggan" readonly required/>
								<input type="hidden" class="col-xs-10 col-sm-2" readonly  value="<?php echo $checkin; ?>" name="checkin" required/>
								<input type="hidden" class="col-xs-10 col-sm-2" readonly value="<?php echo $checkout; ?>" name="checkout" required/>
								<input type="hidden" class="col-xs-10 col-sm-2" readonly value="<?php echo $id; ?>" name="id_kamar" required/>
							</div>
                        </div>
						
						<form action="<?php echo base_url().'reservasi/pesan/'.$this->uri->segment(3); ?>" class="form-availability" method="post">
						<div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1-1">Pilihan No. Kamar <span style="color:red;">*</span></label>
							<div class="col-sm-9">
						<table class="table">
							<thead>
								<tr>
									<td>No. Kamar</td>
									<td>Posisi Lantai</td>
									<td>Fasilitas Tambahan</td>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 0;
								$i_det = 0;
								foreach ($nomorkamar as $value) {
									$i_det = 0;
								?>
								<tr>
									<td><input type="checkbox" style="float:left; width:20px; margin-top:7px;" name="no_ruang[<?php echo $i ?>]" class="name" value="<?php echo $value['id_detil_kamar'] ?>"><div style="float:left;"><?php echo $value['no_ruang']; ?></td>
									<td>Lantai <?php echo $value['lantai_kamar']; ?></td>
									<td><?php foreach ($fasilitastambahan as $value) 
									  { ?>
									<input type="checkbox" style="float:left; width:20px;margin-left:12px;margin-top:7px;" name="id_fasilitastambahan[<?php echo $i ?>][<?php echo $i_det ?>]" class="name" value="<?php echo $value['id_fasilitastambahan'] ?>"><div style="float:left; "><?php echo $value['nama_fasilitastambahan'] ?></div>
									<?php 
									$i_det++ ; } 
									?></td>
								</tr>
								<?php 
									$i++; } ?>
									<input type="hidden" name="totalfastambahan" class="name" value="<?php echo $i_det; ?>">
									<input type="hidden" name="totalruang" class="name" value="<?php echo $i; ?>">
							</tbody>
						</table> 
					</div>
					</div>
							   
								<div class="clearfix form-actions">
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="submit">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Pesan Sekarang
										</button>

									   
									</div>
								</div>

								<div class="hr hr-24"></div>

							</form>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

