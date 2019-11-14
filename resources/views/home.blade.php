@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="card-title"><i class="fab fa-twitter"></i> Twits <a href="/create"><i
                            class="fa
            fa-plus-circle fa-sm"></i> </a> </h3>
            @foreach($twits as $twit)
                <div class="card" style="margin-bottom: 5px;">
                    <div class="card-header bg-white text-primary">{{ '@'.$twit->user->name }}</div>

                    <div class="card-body">

                        {{ $twit->content}}
                        <br>
                        <span class="text-primary">{{ $twit->created_date }}</span>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            @if(in_array(auth()->user()->id, $twit->likes->pluck('user_id')->toArray()))
                            <div class="col-md-6"><a  href="/dislike/{{$twit->id}}" class="btn btn-block btn-sm text-danger">{{ $twit->likes->count() }} &nbsp;&nbsp; <i class="fa fa-heart"></i> </a> </div>
                            @else
                                <div class="col-md-6"><a  href="/like/{{$twit->id}}" class="btn btn-block btn-sm text-primary">{{ $twit->likes->count() }} &nbsp;&nbsp;  <i class="fa fa-heart"></i> </a> </div>

                                @endif
                                <div class="col-md-6"><a  href="/twit/{{$twit->id}}" class="btn btn-block btn-sm text-primary">{{ $twit->replies->count() }} &nbsp;&nbsp; <i class="fa fa-comments"></i> </a> </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
            <hr>
            <div class="card-link">
                {{ $twits->links() }}
            </div>

        </div>
        <div class="col-md-3">
            <h3 class="card-title"><i class="fa fa-users"></i> users</h3>
            @foreach($users  as $user)
                <div class="card" style="margin-bottom: 5px;">
                    <div class="card-header bg-white text-primary">{{ '@'.$user->name }}</div>
                </div>
            @endforeach

        </div>


    </div>
</div>
@endsection
