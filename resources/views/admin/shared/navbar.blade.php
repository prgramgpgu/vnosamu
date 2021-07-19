<nav class="shadow navbar navbar-expand-lg navbar-light mb-2 py-0" style="background-color: #99FFCC;">
{{--    FFCBDB - для админки--}}
    <a href={{route('home')}} class="navbar-brand">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
        <b>Вестник научного общества студентов, аспирантов и молодых ученных</b>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {{--            <li class="nav-item">--}}
            {{--                <a href="#" class="nav-link active">Архив</a>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"--}}
            {{--                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Информация--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
            {{--                    <a href="#" class="dropdown-item">Редакция</a>--}}
            {{--                    <a href="#" class="dropdown-item">Правила приема статей</a>--}}
            {{--                    <a href="#" class="dropdown-item">Рецензирование</a>--}}
            {{--                </div>--}}
            {{--            </li>--}}
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input type="search" placeholder="..." aria-label="Search" class="form-control mr-sm-2">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> Поиск статьи</button>
        </form>
    </div>
</nav>
