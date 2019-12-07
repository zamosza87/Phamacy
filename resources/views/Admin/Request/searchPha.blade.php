@IF(count($data) == 0)
    <div class="row justify-content-center" id="search-result">
        <p style="margin-top: 20px;">ไม่พบข้อมูล</p>
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
                        <button type="button" class="btn btn-outline-secondary selectPha" id="{{ $item->pha_id }}"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
<script>
    $(".selectPha").click(function(){
        var pha_id = $(this).attr("id");
        var action_url = "{{ route('InsertPhaRequest')}}";
        // console.log(url)
        axios.post(action_url, {
            pha_id: pha_id
        }).then(function (response) {
            $('#card-pha').append(response.data.display);
        }).catch(function (error) {
                
        });
    });
</script>
@ENDIF
