<div class="form-inline pha-{{ $data->pha_id }}">
    <label for="pha" class="col-5">{{ $data->generic_name }}</label>
    <div class="col-6">
        <input type="text" class="form-control" name="pha[{{ $data->pha_id }}]" value=""/>
    </div>
    <button type="button" class="btn btn-outline-danger col-1 rm-pha" id="{{ $data->pha_id }}"><i class="fa fa-minus-square" aria-hidden="true"></i></button>
</div>

<script>
    $(".rm-pha").click(function(){
        var pha_id = $(this).attr("id");
        $(".pha-"+pha_id).remove();
    });
</script>