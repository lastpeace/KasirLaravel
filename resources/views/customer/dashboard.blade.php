@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard customer</h1>
        <!-- Tambahkan komponen-komponen lain yang Anda inginkan -->
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
