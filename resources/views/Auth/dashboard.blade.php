@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                <h3>Selamat Datang, {{ Auth::user()->name }}</h3>
                <p>Anda Berhasil Login.</p>

            </div>
            <div class="card-footer">
                <a href="{{route('logout')}}" class="btn btn-danger btn-sm">Logout</a>
            </div>

        </div>
    </div>
</div>
@endsection
