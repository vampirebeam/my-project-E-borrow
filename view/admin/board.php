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
                                            <!-- <td width="10%">
                                                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#<?php echo $value['id']; ?>">
                                                    <i class="fa-solid fa-eye"></i>
                                                </button> 
                                            </td> -->


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