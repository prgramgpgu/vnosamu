@extends('master')
@section('title', $section->title)

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12 text-justify">
                {!! $section->description !!}
            </div>
        </div>
    </div>
@endsection
