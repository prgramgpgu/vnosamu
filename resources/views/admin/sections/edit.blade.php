@extends('admin.dashboard')
@section('title', 'Редактировать раздел')

@section('content')
    <div class="container col-md-12 col-md-offset-2 unselectable">
        <div class="card mt-8">
            <div class="card-header unselectable">
                <h5 class="float-left" style="font-family: Roboto Slab, Times New Roman, serif; font-size: 14pt"><b>Редактировать раздел</b></h5>
                <div class="clearfix"></div>
            </div>

            <div class="card-body mt-4">
                <form method="POST" action="{{ route('sections.update', $section->link) }}">
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
                        <label for="title"><b>Заголовок раздела</b></label>
                        <div>
                            <input type="text" name="title" class="form-control" id="title" value="{{$section->title }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label "><b>Описание</b></label>
                        <div>
                            {{--                            <textarea class="form-control" name="description" id="description"></textarea>--}}
                            <textarea class="form-control" id="description" name="description">
                                {{$section->description}}</textarea>
                        </div>
                    </div>

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

@push('styles')
    <link rel="stylesheet" href="{{asset('dropzone/dist/dropzone.css')}}">
@endpush

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
                        url: "{{ route('file.index', $section->link)}}",
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
                url: "{{ route('upload', $section->link) }}",
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                }
            });
        }
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endpush
