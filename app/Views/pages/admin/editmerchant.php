<?=$this->include('components/admin/header');?>
<div class="app-container">
    <?=$this->include('components/admin/sidebar');?>
    <div class="app-main" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h4><i class="fa fa-briefcase"></i> Merchants</h4>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                    <a href="<?=base_url();?>admin/"><i class="fa fa-briefcase"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Merchants
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Edit Merchant</li>
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
                                <h4 class="card-title"><i class="fa fa-briefcase"></i> Merchants</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="editmerchant" enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="merchant_primary_id">Merchant Primary ID</label>
                                    <input type="text" name="merchant_primary_id" id="merchant_primary_id" class="form-control" placeholder="Enter Merchant Primary ID" value="<?=$merchantDetails['merchant_primary_id'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="merchant_id">Merchant ID</label>
                                    <input type="text" name="merchant_id" id="merchant_id" class="form-control" placeholder="Enter Merchant ID" value="<?=$merchantDetails['merchant_id'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" value="<?=$merchantDetails['fullname'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="Enter Email Address" value="<?=$merchantDetails['emailaddress'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="contactnumber">Contact Number</label>
                                    <input type="text" name="contactnumber" id="contactnumber" class="form-control" placeholder="Enter Contact Number" value="<?=$merchantDetails['contactnumber'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="cardnumber">Card Number</label>
                                    <input type="text" name="cardnumber" id="cardnumber" class="form-control" placeholder="Enter Card Number" value="<?=$merchantDetails['cardnumber'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="fee">Fee (Percentage)</label>
                                    <input type="text" name="fee" id="fee" class="form-control" placeholder="Enter Fee" value="<?=$merchantDetails['fee'];?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->include('components/admin/footer');?>
<script type="text/javascript" src="<?=base_url();?>assets/js/admin/editmerchant.js"></script>