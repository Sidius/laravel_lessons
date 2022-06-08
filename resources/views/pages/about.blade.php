@extends('layouts.layout')

@section('title') @parent:: About Page @endsection

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            {!! mb_strtoupper($hi ?? null) !!}
        </div>
    </section>
@endsection
