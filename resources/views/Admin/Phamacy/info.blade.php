<div id="info-result">
    <div class="form-group-row">
        <label for="thai_name">ชื่อไทย:</label>
        <input type="text" class="form-control" name="thai_name" value="{{ $data->thai_name }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="generic_name">ชื่อสามัญทางยา:</label>
        <input type="text" class="form-control" name="generic_name" value="{{ $data->generic_name }}"readonly/>
    </div>

    <div class="form-group-row">
            <label for="trade_name">ชื่อทางการค้า:</label>
            <input type="text" class="form-control" name="trade_name" value="{{ $data->trade_name }}"readonly/>
        </div>

    <div class="form-group-row">
        <label for="company_Name">ชื่อบริษัท:</label>
        <input type="text" class="form-control" name="company_Name" value="{{ $data->company_Name }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="drug_type">ชนิดยา:</label>
        <input type="text" class="form-control" name="drug_type" value="{{ $data->drug_type }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="stock">จำนวน:</label>
        <input type="number" class="form-control" name="stock" value="{{ $data->stock }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="package">ประเภท:</label>
        <input type="text" class="form-control" name="package" value="{{ $data->package }}"readonly/>
    </div>

    <div class="form-group-row">
        <label for="amount">ปริมาณ:</label>
        <input type="text" class="form-control" name="amount" value="{{ $data->amount }}"readonly/>
    </div>

    <div class="form-group-row">
            <label for="timeuse">วิธีการใช้:</label>
            <input type="text" class="form-control" name="timeuse" value="{{ $data->timeuse }}"readonly/>
        </div>

    <div class="form-group-row">
            <label for="properties">สรรพคุณ:</label>
            <textarea class="form-control" name="properties" value="" readonly>{{ $data->properties }}</textarea>
        </div>

    <div class="form-group-row">
            <label for="expiry_date">วันที่หมดอายุ:</label>
            <input type="date" class="form-control" name="expiry_date" value="{{ $data->expiry_date }}"readonly/>
        </div>
</div>
