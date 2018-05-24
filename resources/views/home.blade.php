@extends('layouts.members')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">SRPT - NKEA</div>
                        <img src="{{ asset('img/logo.png') }}">
                    <font color="white">Version : 1.4.02.170518</font>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                            

                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
