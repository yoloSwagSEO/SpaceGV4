@extends('layout')


@section('header')
    <span>M:{{round($planet->metal,0)}} / {{round($planet->metalStorage,0)}}</span> |
    <span>C:{{round($planet->cristal,0)}} / {{round($planet->cristalStorage,0)}}</span> |
    <span>U:{{round($planet->uradium,0)}} / {{round($planet->uradiumStorage,0)}}</span>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
