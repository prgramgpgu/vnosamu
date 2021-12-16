@extends('master')
@section('title', $section->title . ' ' . $year)

@section('content')
    <div class="content">
        @foreach($issues as $index => $issue)
        <div class="row">
            <div class="col-lg-12 text-justify">
                <a target="_blank" href="{{route('file.getIssue', $files[$index]->title)}}">Выпуск {{$issue->issue}}</a> <br>
            </div>
        </div>
            @endforeach
    </div>
@endsection
