<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PSU PHUKET</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class=""><a href="main.php">หน้าหลัก <span class="sr-only">(current)</span></a></li>
                <li><a href="document.php">จัดการเอกสาร</a></li>
                <li><a href="new.php">ออกเลข</a></li>
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ออกเลข <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="new.php">ปกติ</a></li>
                        <li><a href="back.php">ย้อนหลัง</a></li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงาน <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <!-- <li><a href="report4.php">ค้นหาเลขหนังสือ ตามชื่อเรื่อง</a></li>
                        <li><a href="report2.php">ค้นหาเลขหนังสือ ตามชื่อผู้ส่ง</a></li>
                        <li><a href="report3.php">ค้นหาเลขหนังสือ ตามชื่อผู้รับ</a></li>
                        <li><a href="report5.php">ค้นหาเลขหนังสือ ตามชื่อผู้ขอเลขหนังสือ</a></li> -->
                        <li><a href="report6.php">ค้นหาเลขหนังสือ ตามช่วงเวลาที่ต้องการ</a></li>
                        <!-- <li><a href="report8.php">ค้นหาเลขหนังสือ ตามกลุ่ม</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="report7.php">ตรวจสอบจำนวนเอกสาร</a></li>
                        <li><a href="report1.php">ตรวจสอบเลขหนังสือทั้งหมด</a></li> -->
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?echo $Name_Member ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php">ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
