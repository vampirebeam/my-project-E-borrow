<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-primary text-light">
                <h5><i class="fa fa-tasks fa-1x"></i>&nbsp;รายการอุปกรณ์ทั้งหมด</h5>
            </div>
            <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">ส่วนของผู้ดูแลระบบ</a></li>
                            <li class="breadcrumb-item"><a href="manager/tool/index">อุปกรณ์</a></li>
                        </ol>
                    </nav>
                <section> 
                                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr class="list-group-item-primary">
                                            <th>ลำดับ</th>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>จำนวน</th>
                                            <th>รูปภาพ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM   shop";
                                            $array = mysqli_query($con,$sql);
                                            $i= 1;
                                            foreach($array as $value){
                                        ?>
                                        <tr align="center">
                                            <td width="10%"><?php echo $i ?></td>
                                            <td width="20%"><?php echo $value['name']; ?></td>
                                            <td width="20%"><?php echo $value['total']; ?></td>
                                            <td width="20%">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleShowShop<?php echo $value['id']; ?>">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button>
                                            </td>
                                            


                                        </tr>
                                        <?php
                                            $i++;
                                            }   
                                        ?>
                                    </tbody>
                                </table>
                    </section>
            </div>
        </div>
    </div>
    

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header bg-primary text-light">
                <h5><i class="fa-sharp fa-solid fa-repeat fa-1x"></i>&nbsp;รายการยืมล่าสุด</h5>
            </div>
            <div class="card-body">
                รอใส่ข้อมูล
            </div>
        </div>
    </div>

</div>

<!-- modal exampleShowShop -->
<?php
                    $sql = "SELECT * FROM   shop";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>

    <div class="modal fade" id="exampleShowShop<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fa-regular fa-pen-to-square"></i>&nbsp;รูปภาพ</h5>

                </div>
                <div class="modal-body">
                    
                        <div class="input-group mb-3">
                            <img src="/view/admin/manager/tool/public/<?php echo $value['pic']; ?>" class="img-thumbnail" alt="<?php echo $value['name']; ?>">
                                   
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>                 
            </div>
        </div>
    </div>

                <?php   }   ?>
<!-- end modal exampleShowShop -->