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
                    <a href="<?php echo base_url('admin/konfirmasipembayaran/daftar') ?>">Verifikasi Pembayaran</a>
                </li>
                <li class="active">Data Verifikasi Pembayaran</li>
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
                    Data Verifikasi Pembayaran
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Data semua pembayaran yang belum diverifikasi
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">


                    <!--
                    <h4 class="pink">
                        <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
                        <a href="#modal-table" role="button" class="green" data-toggle="modal"> Table Inside a Modal Box </a>
                    </h4>
                    -->


                    <div class="row">
                        <div class="col-xs-12">

                            <div class="clearfix">

                            <?php echo $this->session->flashdata('msgbox') ?>
                            </div>
                            <div class="table-header">
                                Menampilkan seluruh data pembayaran yang belum dikonfirmasi
                            </div>

                            <!-- div.table-responsive -->
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Transaksi</th>
                                    <th>No. Rekening</th>
                                    <th>Atas Nama</th>
                                    <th>Nama Bank</th>
                                    <th>Bukti Bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead> 
                            <tbody>
                                 <?php
                                $no = 0 ;
                                foreach($listData as $value){
                                $no++;
                                 ?>
                                  <tr>
                                    <td><?php echo $no ?></td>
                                    <td><a target="_blank" href="<?php echo base_url('admin/reservasi/transaksi/'.$value['id_reservasi']) ?>"><?php echo $value['id_reservasi'] ?></a></td>
                                    <td><?php echo $value['no_rek'] ?></td>
                                    <td><?php echo $value['nama_rek'] ?></td>
                                    <td><?php echo $value['nama_bank'] ?></td>
                                    <td><a target="_blank" href="<?php echo ASSET_SAYA."konfirmasi/".$value['bukti_bayar'] ?>"><?php echo $value['bukti_bayar'] ?></a></td>
                                    <td>
                                    <a href="<?php echo base_url('admin/konfirmasipembayaran/verified/'.$value['id_reservasi'].'/2/'.$value['id_konfirmasipembayaran']) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Valid</span></button></a>
                                    <a href="<?php echo base_url('admin/konfirmasipembayaran/verified/'.$value['id_reservasi'].'/3/'.$value['id_konfirmasipembayaran']) ?>"><button class="btn btn-warning btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Invalid</span></button></a>
                                    <a href="<?php echo base_url('admin/konfirmasipembayaran/verified/'.$value['id_reservasi'].'/4/'.$value['id_konfirmasipembayaran']) ?>"><button class="btn btn-danger btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Spam</span></button></a>
                                    </td>
                                    
                                </tr>
                                <?php 
                                }
                                ?>   
                            </tbody>
                        </table> 
                            </div>
                    </div><!-- /.modal-dialog -->
                </div><!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
