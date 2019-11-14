@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <h3 class="card-title"><i class="fa fa-bars"></i> BlackList Keywords</h3>
                @foreach($blacklist as $blocked)
                    <div class="card" style="margin-bottom: 5px;">
                        <div class="card-header bg-white text-primary">{{ $blocked->keyword}}
                            <a
                                    onclick="return confirm('are you sure');"
                                    href="/admin/keyword/{{$blocked->id}}" class="btn btn-danger btn-sm"><i
                                        class="fa fa-trash"></i> delete</a>
                        </div>

                    </div>

                @endforeach


            </div>

            <div class="col-md-5">
                <a href="/admin/keywords/create/keyword" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> new
                    keyword</a>
                <a href="/admin/home" class="btn btn-dark  btn-block">users</a>

            </div>

        </div>
    </div>
@endsection
