<div id="sidebar-wrapper" class="col-md-2 py-3 pr-1" style="background-color: #e3f2fd;">
    <div class="list-group px-1 py-1">
        <a href="{{route('home')}}" class="list-group-item list-group-item-action px-2" id="main">
            Об издании
        </a>
        <a href="{{route('sections.show', ['issues'])}}" class="list-group-item list-group-item-action px-2"
           id="issues">Выпуски</a>
        <a href="{{route('sections.show', ['authors'])}}" class="list-group-item list-group-item-action px-2"
           id="authors">Авторам</a>
        <a href="{{route('sections.show', ['redaction'])}}"
           class="list-group-item list-group-item-action px-2" id="redaction">Редколлегия</a>
        <a href="{{route('sections.show', ['peer_review'])}}" class="list-group-item list-group-item-action px-2"
           id="peer_review">Рецензирование</a>
        <a href="{{route('sections.show', ['ethics'])}}" class="list-group-item list-group-item-action px-2"
           id="ethics">Этика научных публикаций</a>
    </div>
    <hr>
    <div class="card mx-1 my-1">
        <div class="card-header">
            <b>Последний выпуск</b>
        </div>
        <div class="card-body px-1 py-1">
            **ссылка на последний номер журнала**
        </div>
    </div>
    <hr>
    <div class="text-center">
        <img width="200" height="50" src="{!! asset('elibrary.svg') !!} "/>
        <hr>
        <img width="200" height="50" src="{!! asset('scienceindex.svg') !!} "/>
    </div>
    <hr>
</div>

<script>
    document.onload
    {
        {
            var currentSection = {!! json_encode($section->toArray()) !!};
            document.querySelector("#" + currentSection['link']).classList.add("active");
        }
    }
</script>

