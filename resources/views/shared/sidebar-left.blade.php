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
        <div class="card-header text-center">
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

    @guest
        <div class="card">
            <div class="card-header text-center">
                <b>Вход в систему</b>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login.custom') }}">
                    @csrf
                    <div class="form-group mb-3 text-center">
                        <input type="text" placeholder="Почтовый адрес" id="email" class="form-control" name="email"
                               required>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3 text-center">
                        <input type="password" placeholder="Пароль" id="password" class="form-control" name="password"
                               required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3 text-center">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Запомнить меня
                            </label>
                        </div>
{{--                        <div class="text-center">--}}
{{--                            <a href="#">Зарегистрироваться</a>--}}
{{--                        </div>--}}
                    </div>

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-primary btn-block active">Вход</button>
                    </div>
                </form>

            </div>
        </div>
    @else
            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
    @endguest


</div>

<script>
    document.onload
    {
        {
            var currentSection = {!! (isset($section)) ? json_encode($section->toArray()) : " " !!};
            document.querySelector("#" + currentSection['link']).classList.add("active");
        }
    }
</script>

