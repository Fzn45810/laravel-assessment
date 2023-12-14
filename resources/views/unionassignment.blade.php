@extends('layouts.adminlayout')

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
                    <form action="{{route('polio-worker.assignment-process')}}" method="POST">
                        @csrf
                        <div class="row form-group mt-2">
                            <div class="col-md-12">
                                <label for="">Select Council</label>
                                <select data-id="division" class="form-control" name="council" required>
                                    <option value="" selected>Select</option>
                                    @foreach($counciles as $each)
                                        <option value="{{$each->id}}">{{$each->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Select Workers</label>
                                <select data-id="worker" class="form-control multi-select" name="workers[]" required multiple>
                                    @foreach($get_polio_worker as $each)
                                        <option value="{{$each->id}}">{{$each->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 text-right mt-3">
                               <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->

@endsection
