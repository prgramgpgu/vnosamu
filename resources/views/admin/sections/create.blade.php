@extends('admin.dashboard')
@section('title', 'Добавить раздел')

@section('content')
    <div class="container col-md-12 col-md-offset-2 unselectable">
        <div class="card mt-8">
            <div class="card-header unselectable">
                <h5 class="float-left" style="font-family: Roboto Slab, Times New Roman, serif; font-size: 14pt"><b>Добавить раздел</b></h5>
                <div class="clearfix"></div>
            </div>

            <div class="card-body mt-4">
                <form method="POST" action="{{ route('sections.store') }}" >
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
                        <label for="title" class="col-lg-6 control-label"><b>Заголовок раздела</b></label>
                        <div class="col-lg-10">
                            <input type="text" name="title" class="form-control" id="title" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-lg-10 control-label "><b>Описание</b></label>
                        <div class="col-lg-10">
{{--                            <textarea class="form-control" name="description" id="description"></textarea>--}}
                            <textarea class="form-control" id="description" name="description"></textarea>
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
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endpush
