<?=$this->include('components/admin/header');?>
<div class="app-container">
    <?=$this->include('components/admin/sidebar');?>
    <div class="app-main" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h4><i class="fa fa-building-o"></i> Store</h4>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                    <a href="<?=base_url();?>admin/"><i class="fa fa-building-o"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Stores
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Store Masterlist</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title"><i class="fa fa-building-o"></i> Stores</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="datatable-wrapper table-responsive">
                                <table id="storemasterlist" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Merchant ID</th>
                                            <th>Merchant Name</th>
                                            <th>Store ID</th>
                                            <th>Store Name</th>
                                            <th>Seller Type</th>
                                            <th>Gross Merchandise Value</th>
                                            <th>Market Place</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?=$this->include('components/admin/footer');?>
<script src="<?=base_url();?>assets/js/admin/storemasterlist.js"></script>