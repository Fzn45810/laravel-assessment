@extends('layouts.workerlayout')

@section('content')

    <!-- Begin Page Content -->
        <div class="container-fluid">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row form-group mt-2">
                        <div class="col-md-12">
                            <label for="">Province</label>
                            <select data-id="division" class="form-control" name="type">
                                <option value="" selected>Select</option>
                                @foreach($get_province as $typevalue)
                                    <option value="{{$typevalue->id}}">{{$typevalue->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Division</label>
                            <select data-id="district" id="division" class="form-control" name="type">
                                <option value="" selected>Select</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">District</label>
                            <select data-id="tehsil" id="district" class="form-control" name="type">
                                <option value="" selected>Select</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="">Tehsil</label>
                            <select data-id="unioncouncil" id="tehsil" class="form-control" name="type">
                                <option value="" selected>Select</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="">Union Council</label>
                            <select data-id="individualhousehold" id="unioncouncil" class="form-control" name="type">
                                <option value="" selected>Select</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="">Individual House Hold</label>
                            <select data-id="householdmem" id="individualhousehold" class="form-control" name="type">
                                <option value="" selected>Select</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="">House Hold Memeber</label>
                            <select id="householdmem" class="form-control" name="type">
                                <option value="" selected>Select</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('select').on('click', function () {
                        var type_id = $(this).val();
                        var field_type = $(this).data("id");
                       
                        $.ajax({
                            type: 'GET',
                            url:'/getvalue',
                            dataType:'json',
                            contentType: 'json',
                            data: {type_id: type_id, field_type: field_type},
                            success: function (data) {
                                $('#'+field_type+'').empty();
                                $('#'+field_type+'').append('<option value="">Select</option>');
                                for(value of data){
                                    $('#'+field_type+'').append('<option value="' + value['id'] + '">' + value['name'] + '</option>');
                                }
                            }
                        });
                    });
                });
            </script>

        </div>
    <!-- /.container-fluid -->

@endsection
