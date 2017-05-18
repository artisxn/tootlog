@extends('layouts.app')

@section('title', '@' . $user->name . '/' . $date . ' - ' . config('app.name', 'tootlog'))

@if(!empty($statuses->first()->content))
    @section('description', strip_tags($statuses->first()->content))
@endif

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 col-md-push-4">
                <ol class="breadcrumb">
                    <li><a href="{{ route('open.user', $user) }}">{{ '@' . $user->name  }}</a></li>
                    <li><a href="{{ route('open.archives', $user) }}">archives</a></li>
                    <li class="active">{{ $date  }}</li>
                </ol>

                {{ $statuses->links() }}

                @foreach($statuses as $status)
                    @include('status.item')
                @endforeach

                {{ $statuses->links() }}

            </div>

            @include('open.side')
        </div>
    </div>
@endsection
