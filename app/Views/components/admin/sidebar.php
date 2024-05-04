
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_dark">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Dashboard Panel</li>
                            <li class="<?php if($currentpage === 'dashboard') { echo 'active'; } ?>"><a href="/admin/dashboard" aria-expanded="false"><i class="nav-icon ti ti-dashboard"></i><span class="nav-title">Dashboard</span></a> </li>
                            <li class="<?php if($currentpage === 'auditdashboard') { echo 'active'; } ?>"><a href="/admin/audit-dashboard" aria-expanded="false"><i class="nav-icon fa fa-file-text"></i><span class="nav-title">Audit Dashboard</span></a> </li>
                            <li class="<?php if($currentpage === 'reimbursementdashboard') { echo 'active'; } ?>"><a href="/admin/reimbursement-dashboard" aria-expanded="false"><i class="nav-icon fa fa-money"></i><span class="nav-title">Reimbursement Dashboard</span></a> </li>
                            <li class="<?php if($currentpage === 'addmerchant' || $currentpage === 'merchantmasterlist') { echo 'active'; } ?>">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon fa fa-briefcase"></i>
                                    <span class="nav-title">Merchants</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li class="<?php if($currentpage === 'addmerchant') { echo 'active'; } ?>"><a href='/admin/add-merchant'>Add Merchant</a></li>
                                    <li class="<?php if($currentpage === 'merchantmasterlist') { echo 'active'; } ?>"> <a href='/admin/merchant-masterlist'>Merchant Masterlist</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($currentpage === 'addstore' || $currentpage === 'storemasterlist' || $currentpage === 'storeloghistory') { echo 'active'; } ?>">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon fa fa-building-o"></i>
                                    <span class="nav-title">Stores</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li class="<?php if($currentpage === 'addstore') { echo 'active'; } ?>"><a href='/admin/add-store'>Add Store</a></li>
                                    <li class="<?php if($currentpage === 'storemasterlist') { echo 'active'; } ?>"> <a href='/admin/store-masterlist'>Store Masterlist</a></li>
                                    <li class="<?php if($currentpage === 'storeloghistory') { echo 'active'; } ?>"> <a href='/admin/store-log-history'>Store Log History</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($currentpage === 'adduser' || $currentpage === 'usermasterlist' || $currentpage === 'storeloghistory') { echo 'active'; } ?>">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon fa fa-users"></i>
                                    <span class="nav-title">Users</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li class="<?php if($currentpage === 'adduser') { echo 'active'; } ?>"><a href='/admin/add-user'>Add User</a></li>
                                    <li class="<?php if($currentpage === 'usermasterlist') { echo 'active'; } ?>"> <a href='/admin/user-masterlist'>User Masterlist</a></li>
                                </ul>
                            </li>
                            <li class="<?php if($currentpage === 'commissionreport' || $currentpage === 'inboundfollowupcases' || $currentpage === 'outstandingcasescount' || $currentpage === 'reimbursementdaily' || $currentpage === 'reversalreports' || $currentpage === 'userreport' || $currentpage === 'confirmeddocuments') { echo 'active'; } ?>">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon ti ti-bar-chart"></i>
                                    <span class="nav-title">Reports</span>
                                </a>
                                <ul aria-expanded="false">
                                    <li class="<?php if($currentpage === 'commissionreport') { echo 'active'; } ?>"> <a href='/admin/commission-report'>Commission Report</a></li>
                                    <li class="<?php if($currentpage === 'inboundfollowupcases') { echo 'active'; } ?>"> <a href='/admin/inbound-follow-up-cases'>Inbound Follow Up Cases</a></li>
                                    <li class="<?php if($currentpage === 'outstandingcasescount') { echo 'active'; } ?>"> <a href='/admin/outstanding-cases-count'>Outstanding Cases Count</a></li>
                                    <li class="<?php if($currentpage === 'reimbursementdaily') { echo 'active'; } ?>"> <a href='/admin/reimbursement-daily'>Reimbursement Daily</a></li>
                                    <li class="<?php if($currentpage === 'reversalreports') { echo 'active'; } ?>"> <a href='/admin/reversal-reports'>Reversal Reports</a></li>
                                    <li class="<?php if($currentpage === 'userreport') { echo 'active'; } ?>"> <a href='/admin/user-report'>User Report</a></li>
                                    <li class="<?php if($currentpage === 'confirmeddocuments') { echo 'active'; } ?>"> <a href='/admin/confirmed-documents'>Confirmed Documents</a></li>
                                    <li class="<?php if($currentpage === 'confirmeddocuments') { echo 'active'; } ?>"> <a href='/admin/admin-user-log-history'>Admin Log History</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>