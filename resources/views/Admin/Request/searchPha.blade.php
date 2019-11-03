@IF(count($data) == 0)
    <div class="row" id="search-result">
        <p>ไม่พบข้อมูล</p>
    </div>
@ELSE 
<div class="row" id="search-result">
    <table class="table">
        <thead>
            <tr>
                <th>ชื่อยา</th>
                <th>บริษัท</th>
                <th>วันหมดอายุ</th>
                <th>เลือก</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->trade_name }}</td>
                    <td>{{ $item->company_Name }}</td>
                    <td>{{ $item->expiry_date }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-secondary"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@ENDIF
