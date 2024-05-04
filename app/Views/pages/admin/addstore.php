<?=$this->include('components/admin/header');?>
<div class="app-container">
    <?=$this->include('components/admin/sidebar');?>
    <div class="app-main" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h4><i class="fa fa-building-o"></i> Stores</h4>
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
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Add Store</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row select-wrapper">
                <div class="col-lg-12 selects-contant">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title"><i class="fa fa-building-o"></i> Stores</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="addstore" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="merchant_primary_id">Merchants</label>
                                    <select class="form-control js-basic-single " name="merchant_primary_id" id="merchant_primary_id">
                                        <option disabled selected>Merchants</option>
                                        <?php if($merchantList) :  ?>
                                        <?php foreach($merchantList as $list) : ?>
                                        <option value="<?=$list['merchant_primary_id'];?>"><?=$list['merchant_id'].' - '.$list['fullname'];?></option>
                                        <?php endforeach; ?>
                                        <?php endif;  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="storename">Store Name</label>
                                    <input type="text" name="storename" id="storename" class="form-control" placeholder="Enter Store Name">
                                </div>
                                <div class="form-group">
                                    <label for="sellertype">Seller Type</label>
                                    <select class="form-control js-basic-single " name="sellertype" id="sellertype">
                                        <option disabled selected>Seller Type</option>
                                        <option value="Reseller">Reseller</option>
                                        <option value="Manufacturer">Manufacturer</option>
                                        <option value="Both">Both</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="grossmerchandisevalue">Gross Merchandise Value</label>
                                    <select class="form-control js-basic-single " name="grossmerchandisevalue" id="grossmerchandisevalue">
                                        <option disabled selected>Gross Merchandise Value</option>
                                        <option value="$0 - $500k">$0 - $500K</option>
                                        <option value="$500K - $1M">$500K - $1M</option>
                                        <option value="$1M - $5M">$1M - $5M</option>
                                        <option value="$5M - $10M">$5M - $10M</option>
                                        <option value="$10M+">$10M+</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marketplace">Market Place</label>
                                    <select class="form-control js-basic-single " name="marketplace" id="marketplace">
                                        <option disabled selected>Market Place</option>
                                        <option value="https://sellercentral.amazon.com/">NA (USA, Canada, Mexico)</option>
                                        <option value="https://sellercentral.amazon.co.uk/">AU (Europe Market Place)</option>
                                        <option value="https://sellercentral.amazon.in/">IN (India Market Place)</option>
                                        <option value="https://sellercentral.amazon.ae/">AE (UAE Market Place)</option>
                                        <option value="https://sellercentral.amazon.com.au/">FE (Far East Market Place)</option>
                                        <option value="https://sellercentral.amazon.co.jp/">JP (Japan Market Place)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marketplace"><h4 style="color: green;">Open your main Seller Central account</h4></label>
                                    <p>In a separate Browser Tab, please login to your Main Seller Central Account, or  <a href="javascript:window.open($('#marketplace').val(), '_blank');" style="color: green;">click here</a>.</p>
                                    <p>You will need to use your Primary User Login Credentials.</p>
                                </div>
                                <div class="form-group">
                                    <label for="marketplace"><h4 style="color: green;">Authorize and store registration</h4></label>
                                    <p>
                                        Once you are logged into your Seller Central Account, 
                                        you need to grant <b>Refund Chief App</b> access to your store data by clicking on the 
                                        <button type="button" class="btn btn-info btn-sm"><i class="fa fa-check"></i> Authorize</button> button on the right.
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?=$this->include('components/footer');?>
<script type="text/javascript" src="<?=base_url();?>assets/js/admin/addstore.js"></script>