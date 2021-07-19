@extends('master')

@section('content')
    @if(session()->get('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Загрузка файлов в раздел <b>"{{$section->title}}"</b></div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('file.upload', $section->link) }}" aria-label="{{ __('Upload') }}">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <label for="title" class="col-sm-2 col-form-label text-md-right">Загрузить файлы</label>
                                <div class="col-md-10">
                                    <div id="file" class="dropzone">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0 ju">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Загрузить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
           //var section = {!! json_encode($section->toArray()) !!};
          // console.log(section.id);

           Dropzone.autoDiscover = false;
           var drop = new Dropzone('#file', {
               dictDefaultMessage: "Перетащите файлы сюда для загрузки",
               dictCancelUpload: "Отменить загрузку",
               dictRemoveFile: "Удалить файл",
               maxFilesize: 200,
               timeout: 180000,
               createImageThumbnails: false,
               addRemoveLinks: true,
               removedfile: function(file) {
                   var id = JSON.parse(file.xhr.response)['id'];
                   console.log(id);
                   // $.noConflict();
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
               url: "{{ route('upload', $section->link) }}",
               headers: {
                   'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
               },

           });
       }
    </script>
@endpush

