@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                <label>{{ Session::get('success') }}</label>
                </div>
            @endif
            <div class="card">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                       <h1 class="display-3">เพิ่มผู้ป่วย</h1>
                     <div>
                       @if ($errors->any())
                         <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                         </div><br />
                       @endif
                         {{-- <form method="post" action="{{ route('ht.store' , $user->id) }}"> --}}
                             @csrf
                            <div class="form-group">
                                <label for="first_name">ชื่อ:</label>
                                <input type="text" class="form-control" name="first_name"/>
                            </div>

                            <div class="form-group">
                                <label for="last_name">นามสกุล:</label>
                                <input type="text" class="form-control" name="last_name"/>
                            </div>

                            <div class="form-group">
                                <label for="telephone_number">เบอร์โทรศัพท์:</label>
                                <input type="text" class="form-control" name="telephone_number"/>
                            </div>

                            <div class="form-group">
                                <label for="parent_phone_number">เบอร์โทรศัพท์ฉุกเฉิน:</label>
                                <input type="text" class="form-control" name="parent_phone_number"/>
                            </div>

                            <div class="form-group">
                                <label for="birth">วันเกิด:</label>
                                <input type="date" class="form-control" name="birth"/>
                            </div>

                            <div class="form-group">
                                <label for="identification_number">รหัสประจำตัว:</label>
                                <input type="text" class="form-control" name="identification_number"/>
                            </div>

                            <div class="form-group">
                                <label for="congenital_disease">โรคประจำตัว:</label>
                                <input type="text" class="form-control" name="congenital_disease"/>
                            </div>

                            <div class="form-group">
                                <label for="drug_allergies">แพ้ยา:</label>
                                <input type="text" class="form-control" name="drug_allergies"/>
                            </div>

                            <div class="form-group">
                                <label for="select1">คณะ</label>
                                <select class="form-control" id="select1" name="_type">
                                  <option value="-">-</option>
                                  <option value="คณะบริหารธุรกิจ">คณะบริหารธุรกิจ</option>
                                  <option value="คณะบัญชี">คณะบัญชี</option>
                                  <option value="คณะเศรษฐศาสตร์">คณะเศรษฐศาสตร์</option>
                                  <option value="คณะมนุษยศาสตร์และประยุกต์ศิลป์">คณะมนุษยศาสตร์และประยุกต์ศิลป์</option>
                                  <option value="คณะวิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                                  <option value="คณะนิเทศศาสตร์">คณะนิเทศศาสตร์</option>
                                  <option value="คณะวิศวกรรมศาสตร์">คณะวิศวกรรมศาสตร์</option>
                                  <option value="วิทยาลัยผู้ประกอบการ">วิทยาลัยผู้ประกอบการ</option>
                                  <option value="วิทยาลัยนานาชาติเพื่อการจัดการ">วิทยาลัยนานาชาติเพื่อการจัดการ</option>
                                  <option value="บัณฑิตวิทยาลัย">บัณฑิตวิทยาลัย</option>
                                  <option value="คณะวิทยพัฒน์">คณะวิทยพัฒน์</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="select1">สังกัด/หน่วยงาน</label>
                                <select class="form-control" id="select1" name="_type">
                                  <option value="-">-</option>
                                  <option value="กองการเงิน">กองการเงิน</option>
                                  <option value="กองพัสดุและการจัดการทรัพย์สิน">กองพัสดุและการจัดการทรัพย์สิน</option>
                                  <option value="กองประกันคุณภาพการศึกษา">กองประกันคุณภาพการศึกษา</option>
                                  <option value="กองนิติการ">กองนิติการ</option>
                                  <option value="กองอาคารและสิ่งแวดล้อม">กองอาคารและสิ่งแวดล้อม</option>
                                  <option value="กองประชาสัมพันธ์">กองประชาสัมพันธ์</option>
                                  <option value="กองวิเทศสัมพันธ์">กองวิเทศสัมพันธ์</option>
                                  <option value="กองแนะแนว">กองแนะแนว</option>
                                  <option value="กองกีฬา">กองกีฬา</option>
                                  <option value="กองกิจกรรมนักศึกษา">กองกิจกรรมนักศึกษา</option>
                                  <option value="กองบริการสื่อสิ่งพิมพ์">กองบริการสื่อสิ่งพิมพ์</option>
                                  <option value="กองวิชาการ">กองวิชาการ</option>
                                  <option value="กองสวัสดิการนักศึกษา">กองสวัสดิการนักศึกษา</option>
                                  <option value="ศูนย์รับสมัครนักศึกษา">ศูนย์รับสมัครนักศึกษา</option>
                                  <option value="ศูนย์ความเป็นเลิศทางการสอน">ศูนย์ความเป็นเลิศทางการสอน</option>
                                  <option value="ศูนย์พยากรณ์เศษฐกิจและธุรกิจ">ศูนย์พยากรณ์เศษฐกิจและธุรกิจ</option>
                                  <option value="ศูนย์การค้าระหว่างประเทศ">ศูนย์การค้าระหว่างประเทศ</option>
                                  <option value="ศูนย์ธุรกิจครอบครัว">ศูนย์ธุรกิจครอบครัว</option>
                                  <option value="ศูนย์ศึกษาสื่อและการสื่อสารอาเซียน">ศูนย์ศึกษาสื่อและการสื่อสารอาเซียน</option>
                                  <option value="ศูนย์เอสเอ็มอี">ศูนย์เอสเอ็มอี</option>
                                  <option value="ศูนย์บริการวิชาการ">ศูนย์บริการวิชาการ</option>
                                  <option value="ศูนย์การสร้างผู้ประกอบการที่ขับเคลื่อนโดยนวัตกรรม">ศูนย์การสร้างผู้ประกอบการที่ขับเคลื่อนโดยนวัตกรรม</option>
                                  <option value="ศูนย์วิจัยธุรกิจและกรณีศึกษา">ศูนย์วิจัยธุรกิจและกรณีศึกษา</option>
                                  <option value="สำนักทะเบียนและประมวณผล">สำนักทะเบียนและประมวณผล</option>
                                  <option value="สำนักบริหารทรัพยากรมนนุษย์">สำนักบริหารทรัพยากรมนนุษย์</option>
                                  <option value="สำนักงานบริการคอมพิวเตอร์">สำนักงานบริการคอมพิวเตอร์</option>
                                  <option value="แม่บ้าน">แม่บ้าน</option>
                                  <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                              </div>


                            <button type="submit" class="btn btn-outline-primary">เพิ่ม</button>
                            <a class="btn btn-outline-dark" href="{{ route('Member.index') }}">Back</a>
                         </form>
                     </div>
                   </div>
                   </div>
            </div>
        </div>
    </div>
</div>
@endsection
