@extends('master')
@section('title', 'О нас')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-7 text-justify">
                {!! $section->description !!}
            </div>
            <div class="col-lg-5 text-justify">
                <img src="{!! asset('1.jpg') !!}" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('plugins/summernote/lang/summernote-ru-RU.min.js')}}"></script>
    <script>
        $(function () {
            $("description").summernote({
                lang: 'ru-RU',
                height: 160
            });
        })
    </script>
@endpush
