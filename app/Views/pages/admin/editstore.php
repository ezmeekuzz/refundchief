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
                            <form id="editstore" enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="store_id">Store ID</label>
                                    <input type="text" name="store_id" id="store_id" class="form-control" placeholder="Enter Store ID" value="<?=$storeDetails['store_id'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="merchant_primary_id">Merchants</label>
                                    <select class="form-control js-basic-single " name="merchant_primary_id" id="merchant_primary_id">
                                        <option value="<?=$storeDetails['merchant_primary_id'];?>"><?=$storeDetails['merchant_id'].' - '.$storeDetails['fullname'];?></option>
                                        <?php if($merchantList) :  ?>
                                        <?php foreach($merchantList as $list) : ?>
                                        <?php if($storeDetails['merchant_primary_id'] != $list['merchant_primary_id']) : ?>
                                        <option value="<?=$list['merchant_primary_id'];?>"><?=$list['merchant_id'].' - '.$list['fullname'];?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif;  ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="storename">Store Name</label>
                                    <input type="text" name="storename" id="storename" class="form-control" placeholder="Enter Store Name" value="<?=$storeDetails['storename'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="sellertype">Seller Type</label>
                                    <select class="form-control js-basic-single " name="sellertype" id="sellertype">
                                        <option disabled selected>Seller Type</option>
                                        <option value="Reseller" <?=$storeDetails['sellertype'] == 'Reseller' ? 'selected' : '';?>>Reseller</option>
                                        <option value="Manufacturer" <?=$storeDetails['sellertype'] == 'Manufacturer' ? 'selected' : '';?>>Manufacturer</option>
                                        <option value="Both" <?=$storeDetails['sellertype'] == 'Both' ? 'selected' : '';?>>Both</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="grossmerchandisevalue">Gross Merchandise Value</label>
                                    <select class="form-control js-basic-single " name="grossmerchandisevalue" id="grossmerchandisevalue">
                                        <option disabled selected>Gross Merchandise Value</option>
                                        <option value="$0 - $500k" <?=$storeDetails['grossmerchandisevalue'] == '$0 - $500k' ? 'selected' : '';?>>$0 - $500K</option>
                                        <option value="$500K - $1M" <?=$storeDetails['grossmerchandisevalue'] == '$500K - $1M' ? 'selected' : '';?>>$500K - $1M</option>
                                        <option value="$1M - $5M" <?=$storeDetails['grossmerchandisevalue'] == '$1M - $5M' ? 'selected' : '';?>>$1M - $5M</option>
                                        <option value="$5M - $10M" <?=$storeDetails['grossmerchandisevalue'] == '$5M - $10M' ? 'selected' : '';?>>$5M - $10M</option>
                                        <option value="$10M+" <?=$storeDetails['grossmerchandisevalue'] == '$10M+' ? 'selected' : '';?>>$10M+</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="marketplace">Market Place</label>
                                    <select class="form-control js-basic-single " name="marketplace" id="marketplace">
                                        <option disabled selected>Market Place</option>
                                        <option value="https://sellercentral.amazon.com/" <?=$storeDetails['marketplace'] == 'https://sellercentral.amazon.com/' ? 'selected' : '';?>>NA (USA, Canada, Mexico)</option>
                                        <option value="https://sellercentral.amazon.co.uk/" <?=$storeDetails['marketplace'] == 'https://sellercentral.amazon.co.uk/' ? 'selected' : '';?>>AU (Europe Market Place)</option>
                                        <option value="https://sellercentral.amazon.in/" <?=$storeDetails['marketplace'] == 'https://sellercentral.amazon.in/' ? 'selected' : '';?>>IN (India Market Place)</option>
                                        <option value="https://sellercentral.amazon.ae/" <?=$storeDetails['marketplace'] == 'https://sellercentral.amazon.ae/' ? 'selected' : '';?>>AE (UAE Market Place)</option>
                                        <option value="https://sellercentral.amazon.com.au/" <?=$storeDetails['marketplace'] == 'https://sellercentral.amazon.com.au/' ? 'selected' : '';?>>FE (Far East Market Place)</option>
                                        <option value="https://sellercentral.amazon.co.jp/" <?=$storeDetails['marketplace'] == 'https://sellercentral.amazon.co.jp/' ? 'selected' : '';?>>JP (Japan Market Place)</option>
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
</div><?=$this->include('components/admin/footer');?>
<script type="text/javascript" src="<?=base_url();?>assets/js/admin/editstore.js"></script>