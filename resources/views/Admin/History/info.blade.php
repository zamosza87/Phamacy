<div id="info-result">
    <div class="form-group-row">
        <label for="thai_name">อาการ:</label>
        <input type="text" class="form-control" name="thai_name" value="{{ $data->note  }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="generic_name">ผลวินิจฉัย:</label>
        <input type="text" class="form-control" name="generic_name" value="{{ $data->diagnose }}"readonly/>
    </div>
    <div class="form-group-row">
        <label for="thai_name">การรักษา:</label>
        <input type="text" class="form-control" name="thai_name" value="{{ $data->treatment }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="generic_name">ผู้ตรวจ:</label>
        <input type="text" class="form-control" name="generic_name" value="{{ $data->doc ? $data->doc->first_name . ' ' . $data->doc->last_name : 'ไม่ระบุ'}}"readonly/>
    </div>
    <div class="row">
        <label>การสั่งจ่ายยา</label>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-nowrap">ชื่อยา</th>
                <th scope="col" class="text-nowrap">จำนวน</th>
                <th scope="col" class="text-nowrap">ผู้สั่งจ่าย</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->historydetail as $item)
            <tr>
                <td>{{$item->pha->generic_name}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->nurse ? $item->nurse->first_name . ' ' . $item->nurse->last_name : 'ไม่ระบุ' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
