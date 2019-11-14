@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <h3 class="card-title"><i class="fa fa-bars"></i> Blocked Ips</h3>
                @foreach($blacklist as $blocked)
                    <div class="card" style="margin-bottom: 5px;">
                        <div class="card-header bg-white text-primary">{{ $blocked->user->name }}</div>

                        <div class="card-body">{{ $blocked->ip_address }} <div class="float-md-right">{{
                        $blocked->created_at }}</div> </div>
                        <div class="card-footer bg-white">
                            <a  onclick="return confirm('are you sure');"  href="/admin/unblock/{{$blocked->id}}"
                                class="btn btn-danger">unblock</a>
                        </div>
                    </div>

                @endforeach


            </div>

            <div class="col-md-3">
                <a href="/admin/keywords" class="btn btn-dark">keywords</a>
            </div>


        </div>
    </div>
@endsection
