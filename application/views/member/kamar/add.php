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
                    <a href="<?php echo base_url('admin/kamar/daftar') ?>">Kamar</a>
                </li>
                
                
                <li class="active">Tambah Data Kamar</li>
            </ul><!-- /.breadcrumb -->

            <!-- #section:basics/content.searchbox -->
            <div class="nav-search" id="nav-search" style="display:none;">
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
                    Formulir Tambah Data Kamar
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo base_url().'admin/kamar/doAdd/'?>" role="form"> 
                       <?php 
                       $dataOld = $this->session->flashdata('oldPost'); 
                       echo $this->session->flashdata('msgbox');?>
                        <!-- #section:elements.form -->
						<div class="form-group">        
                          <div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
                            Informasi Data Kamar
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nama Kamar</label>
                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi nama kamar" id='kamar' value="<?php echo $dataOld['TxtKamar']; ?>" name="txtKamar" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tipe Kamar</label>
                             <div class="col-sm-9">
                                <select name="txtTipeKamar" class="col-xs-10 col-sm-5">
                                    <option>Pilih</option>
                                    <option disabled>---------------</option>
                                    <?php foreach ($listTipeKamar as $value) { ?>
                                    <option value="<?php echo $value['id_tipekamar'] ?>"><?php echo $value['tipekamar'] ?></option>  
                                    <?php } ?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Jumlah</label>
                            <div class="col-sm-3">
                                <input type="text" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi jumlah" id='jumlah' value="<?php echo $dataOld['TxtJumlah']; ?>" name="txtJumlah" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Lantai</label>
                            <div class="col-sm-3">
                                <input type="text" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi lantai" id='ruangan awal' value="<?php echo $dataOld['txtLantai']; ?>" name="txtLantai" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">No. Ruangan Awal</label>
                            <div class="col-sm-3">
                                <input type="text" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi no. ruangan awal" id='ruangan awal' value="<?php echo $dataOld['txtNoRuangAwal']; ?>" name="txtNoRuangAwal" />
                            </div>
                        </div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Fasilitas Include</label>
							<div class="col-sm-3">
								<select multiple="" tabindex="-1" name="txtFasilitasInclude[]"  class="col-xs-10 col-sm-5 chosen-select" >
									 <?php foreach ($fasilitasInclude as $value) { ?>
									 <option value="<?php echo $value['id_fasilitasinclude'] ?>"><?php echo $value['nama_fasilitasinclude']; ?></option>  
							<?php } ?>
								</select>
							</div>
							<div class="chosen-container chosen-container-multi chosen-container-active chosen-with-drop" title="">
							</div>
						</div>
						
						<div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-5 nominal" id="form-field-1-1" placeholder="Rp. 000,000,000.00"  name="txtHarga" value="<?php echo $dataOld['txtHarga']; ?>" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Deskripsi</label>
                            <div class="col-sm-9">
                                <input type="text" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi deskripsi kamar" id='deskripsi' value="<?php echo $dataOld['TxtDeskripsi']; ?>" name="txtDeskripsi" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Foto 1</label>
                            <div class="col-sm-9">
                                <input type="file" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi deskripsi kamar" id='foto1' value="<?php echo $dataOld['TxtFoto1']; ?>" name="txtFoto1" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Foto 2</label>
                            <div class="col-sm-9">
                                <input type="file" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi deskripsi kamar" id='foto1' value="<?php echo $dataOld['TxtFoto2']; ?>" name="txtFoto2" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Foto 3</label>
                            <div class="col-sm-9">
                                <input type="file" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi deskripsi kamar" id='foto3' value="<?php echo $dataOld['TxtFoto3']; ?>" name="txtFoto3" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Foto 4</label>
                            <div class="col-sm-9">
                                <input type="file" class="col-xs-10 col-sm-5" id="form-field-1-1" placeholder="Isi deskripsi kamar" id='foto1' value="<?php echo $dataOld['TxtFoto4']; ?>" name="txtFoto4" />
                            </div>
                        </div>
						
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Simpan
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
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