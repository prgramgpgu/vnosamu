@extends('admin.dashboard')
@section('title', 'Добавить журнал')

@section('content')
    <div class="container col-md-12 col-md-offset-2 unselectable">
        <div class="card mt-8">
            <div class="card-header unselectable">
                <h5 class="float-left" style="font-family: Roboto Slab, Times New Roman, serif; font-size: 14pt"><b>Добавить
                        журнал</b></h5>
                <div class="clearfix"></div>
            </div>

            <div class="card-body mt-4">
                <form method="POST" action="{{ route('issues.store', ['issues', 'year']) }}">
                    @csrf
                    @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" class="col-lg-6 control-label"><b>Название</b></label>
                        <div class="col-lg-12">
                            <input type="text" name="title" class="form-control" id="title"
                                   value="Вестник научного общества студентов, аспирантов, молодых ученных">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3">
                            <label for="year" class="col-lg-12 control-label"><b>Год</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="year" class="form-control" id="year" value="{{$year}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="issue" class="col-lg-12 control-label"><b>Номер</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="issue" class="form-control" id="issue">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="number_of_pages" class="col-lg-12 control-label"><b>Количество страниц</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="number_of_pages" class="form-control" id="number_of_pages">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="issn" class="col-lg-12 control-label"><b>ISSN</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="issn" class="form-control" id="issn">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3">
                            <label for="volume" class="col-lg-12 control-label"><b>Том</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="volume" class="form-control" id="volume" value="1">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="number_of_volumes" class="col-lg-12 control-label"><b>Количество томов</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="number_of_volumes" class="form-control" id="number_of_volumes" value="1">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <label for="cover" class="col-lg-12 control-label"><b>Обложка</b></label>
                            <div class="col-lg-12">
                                <div id="file" class="">
                                    <input type="file" name="cover" />
                                </div>
                            </div>
                        </div>
                    </div>

{{--                    <input type="file" name="logo" />--}}

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default">Отмена</button>
                            <button class="btn btn-primary" type="submit">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('dropzone/dist/dropzone-amd-module.js') }}"></script>
    <script>
        {{--document.onload--}}
        {{--{--}}
        {{--    Dropzone.autoDiscover = false;--}}
        {{--    var drop = new Dropzone('#file', {--}}
        {{--        acceptedFiles: "image/jpeg, image/png, image/jpg",--}}
        {{--        dictDefaultMessage: "Выберите изображение для загрузки",--}}
        {{--        dictCancelUpload: "Отменить загрузку",--}}
        {{--        dictRemoveFile: "Удалить файл",--}}
        {{--        dictMaxFilesExceeded: "Загружено максимальное количество файлов",--}}
        {{--        maxFilesize: 200,--}}
        {{--        maxFiles: 1,--}}
        {{--        timeout: 180000,--}}
        {{--        createImageThumbnails: false,--}}
        {{--        addRemoveLinks: true,--}}
        {{--        removedfile: function(file) {--}}
        {{--            var id = JSON.parse(file.xhr.response)['id'];--}}
        {{--            jQuery.ajax({--}}
        {{--                type: 'DELETE',--}}
        {{--                url: "{{ route('file.delete') }}",--}}
        {{--                data: "id="+id,--}}
        {{--                headers: {--}}
        {{--                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content--}}
        {{--                }--}}
        {{--            });--}}
        {{--            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;--}}
        {{--        },--}}
        {{--        url: "{{ route('upload', 'issues') }}",--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content--}}
        {{--        },--}}

        {{--    });--}}
        {{--}--}}
    </script>
@endpush
