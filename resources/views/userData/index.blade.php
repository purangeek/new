@extends('userData.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody id="tableDodyData">

            </tbody>  
            </table>
        </div>
    </div>
<script>
    jQuery(document).ready(function($){
        $.ajax({
            url:"/users/getusers",
            type: "POST",
            data: {
                _token:'{{ csrf_token() }}'
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                resultData = dataResult.data;
                var body_data = '';
                var number = 1;
                $.each(resultData, function(i, item) {
                    body_data += '<tr>';
                    body_data += '<td>'+number+'</td>';
                    body_data += '<td><img style="height:40px;width:40px" src="{{url('assets/images')}}/'+item.image+'"></td>';
                    body_data += '<td>'+item.first_name+'</td>';
                    body_data += '<td>'+item.last_name+'</td>';
                    body_data += '<td>'+item.gender+'</td>';
                    body_data += '<td>'+item.email+'</td>';
                    body_data += '<td>'+item.address+'</td>';
                    body_data += '<td>'+item.country+'</td>';
                    number++;
                });
                $("#tableDodyData").append(body_data);

            },
        });
    });
</script>
@endsection