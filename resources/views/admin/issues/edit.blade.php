@extends('admin.dashboard')
@section('title', 'Добавить журнал')

@section('content')
    <div class="container col-md-12 col-md-offset-2 unselectable">
        <div class="card mt-8">
            <div class="card-header unselectable">
                <h5 class="float-left" style="font-family: Roboto Slab, Times New Roman, serif; font-size: 14pt"><b>Редактировать журнал</b></h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-4">
                <form method="POST" action="{{ route('issues.update', $magazine) }}">
                    @method('PATCH')
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
                                   value="{{$magazine->title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3">
                            <label for="year" class="col-lg-12 control-label"><b>Год</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="year" class="form-control" id="year" value="{{$magazine->year}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="issue" class="col-lg-12 control-label"><b>Номер</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="issue" class="form-control" id="issue" value="{{$magazine->issue}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="number_of_pages" class="col-lg-12 control-label"><b>Количество страниц</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="number_of_pages" class="form-control" id="number_of_pages" value="{{$magazine->number_of_pages}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="issn" class="col-lg-12 control-label"><b>ISSN</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="issn" class="form-control" id="issn" value="{{$magazine->issn}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-3 col-md-3">
                            <label for="volume" class="col-lg-12 control-label"><b>Том</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="volume" class="form-control" id="volume" value="{{$magazine->volume}}">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label for="number_of_volumes" class="col-lg-12 control-label"><b>Количество томов</b></label>
                            <div class="col-lg-12">
                                <input type="text" name="number_of_volumes" class="form-control" id="number_of_volumes" value="{{$magazine->number_of_volumes}}">
                            </div>
                        </div>

{{--                        <div class="col-lg-3">--}}
{{--                            <label for="cover" class="col-lg-12 control-label"><b>Обложка</b></label>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <div id="file" class="">--}}
{{--                                    <input type="file" name="cover" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <input type="file" name="logo" />--}}
                    <div class="form-group">
                        <label for="file" class="control-label"><b>Управление файлами</b></label>
                        <div class="col-md-12">
                            <div id="file" class="dropzone">
                            </div>
                        </div>
                    </div>

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
        document.onload
        {
            Dropzone.autoDiscover = false;
            var drop = new Dropzone('#file', {
                init: function() {
                    myDropzone = this;
                    $.ajax({
                        url: "{{ route('file.getIssues', [$section->link, $magazine->year, $magazine->issue, $magazine->volume])}}",
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                        },
                        success: function(response){
                            $.each(response, function(key,value) {
                                var mockFile = { name: value.name, size: value.size, id: value.id};
                                myDropzone.emit("addedfile", mockFile);
                                myDropzone.emit("complete", mockFile);
                                myDropzone.files.push(mockFile);
                            });
                        }
                    });
                },
                removedfile: function(file) {
                    //id = JSON.parse(file.xhr.response)['id'];
                    id = (file.id === undefined) ? JSON.parse(file.xhr.response)['id'] : file.id;
                    console.log(id);
                    jQuery.ajax({
                        type: 'DELETE',
                        url: "{{ route('file.delete') }}",
                        data: "id="+id,
                        headers: {
                            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                        }
                    });
                    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                },
                dictDefaultMessage: "Перетащите файлы сюда для загрузки",
                dictCancelUpload: "Отменить загрузку",
                dictRemoveFile: "Удалить файл",
                maxFilesize: 200,
                timeout: 180000,
                createImageThumbnails: false,
                addRemoveLinks: true,
                url: "{{ route('upload', $section->link, $magazine) }}",
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                }
            });
        }
    </script>
{{--    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace( 'description' );--}}
{{--    </script>--}}
@endpush
