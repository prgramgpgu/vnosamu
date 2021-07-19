@extends('master')
@section('title', 'Добавить файлы')

@section('content')
    <div class="container col-md-12 col-md-offset-2 unselectable">
        <div class="card mt-8">
            <div class="card-header unselectable">
                <h5 class="float-left" style="font-family: Roboto Slab, Times New Roman, serif; font-size: 14pt"><b>Добавить файл</b></h5>
                <div class="clearfix"></div>
            </div>

            <div class="card-body mt-4">
                <form method="POST" action="{{// route('sections.store') }}" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-lg-6 control-label"><b>Название файла</b></label>
                        <div class="col-lg-10">
                            <input type="file" name="title" class="form-control" id="title" >
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


