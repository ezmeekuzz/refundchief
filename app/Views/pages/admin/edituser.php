<?=$this->include('components/admin/header');?>
<div class="app-container">
    <?=$this->include('components/admin/sidebar');?>
    <div class="app-main" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h4><i class="fa fa-users"></i> Users</h4>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                    <a href="<?=base_url();?>admin/"><i class="ti ti-users"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Users
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Edit User</li>
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
                                <h4 class="card-title"><i class="ti ti-user"></i> Users</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="edituser" enctype="multipart/form-data">
                                <div class="form-group" hidden>
                                    <label for="user_id">User ID</label>
                                    <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Enter User ID" value="<?=$userDetails['user_id'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" value="<?=$userDetails['fullname'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" name="emailaddress" id="emailaddress" class="form-control" placeholder="Enter Email Address" value="<?=$userDetails['emailaddress'];?>">
                                </div>
                                <div class="form-group">
                                    <label for="usertype">UserType</label>
                                    <select class="form-control" name="usertype" id="usertype">
                                        <option hidden>Select UserType</option>
                                        <option value="Administrator" <?=$userDetails['usertype'] == 'Administrator' ? 'selected' : '';?>>Administrator</option>
                                        <option value="Editor" <?=$userDetails['usertype'] == 'Editor' ? 'selected' : '';?>>Editor</option>
                                        <option value="Refund Specialist" <?=$userDetails['usertype'] == 'Refund Specialist' ? 'selected' : '';?>>Refund Specialist</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_audit_dashboard_view">Access Privilege</label><br/>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="is_audit_dashboard_view" id="is_audit_dashboard_view" value="Yes" <?=$userDetails['is_audit_dashboard_view'] == 'Yes' ? 'checked' : '';?>>
                                        <label class="form-check-label" for="is_audit_dashboard_view">Can View Audit Dashboard</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="is_audit_dashboard_update" id="is_audit_dashboard_update" value="Yes" <?=$userDetails['is_audit_dashboard_update'] == 'Yes' ? 'checked' : '';?>>
                                        <label class="form-check-label" for="is_audit_dashboard_update">Can Update Audit Dashboard</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="is_admin_log_history" id="is_admin_log_history" value="Yes" <?=$userDetails['is_admin_log_history'] == 'Yes' ? 'checked' : '';?>>
                                        <label class="form-check-label" for="is_admin_log_history">Can View Admin Log History</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="<?=$userDetails['password'];?>">
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
<script type="text/javascript" src="<?=base_url();?>assets/js/admin/edituser.js"></script>