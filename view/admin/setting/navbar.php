<!-- Sidebar-->
<div class="border-end bg-light" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-dark text-light">ระบบยืม-คืนอุปกรณ์</div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index"><i class="fa fa-home fa-1x"></i>&nbsp;หน้าแรก</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../manager/index"><i class="fa-solid fa-screwdriver-wrench fa-1x"></i>&nbsp;ส่วนของผู้ดูแลระบบ</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../trading/index"><i class="fa-sharp fa-solid fa-repeat fa-1x"></i>&nbsp;ยืม - คืน</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index"><i class="fa-solid fa-gear fa-1x"></i>&nbsp;แก้ไขข้อมูลส่วนตัว</a>
                    <a class="list-group-item list-group-item-action list-group-item-danger p-3" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-right-from-bracket fa-1x"></i>&nbsp;ออกจากระบบ</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">เปิด/ปิด เมนู</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active">ยินดีต้อนรับคุณ <?php echo $_SESSION["name"]?>&nbsp;<?php echo $_SESSION["lname"]?>&nbsp;<?php echo $_SESSION["section"]?></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- class main content modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header bg-dark text-light">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-right-from-bracket fa-1x"></i>&nbsp;ออกจากระบบ</h5>
                        
                    </div>
                    <div class="modal-body">
                    ต้องการออกจากระบบ ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <a href="logout" type="button" class="btn btn-danger">ยืนยันออกจากระบบ</a>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end class main cintent modal -->