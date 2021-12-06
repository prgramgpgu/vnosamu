<div class="col-md-2 py-3 px-1" style="background-color: #e3f2fd;">

    @if (isset($section))
        @if (count($section->uploads) > 0)
            @include('shared.documents')
        @endif
    @endif

    <div class="card">
        <div class="card-header text-center">
            <b>Контакты</b>
        </div>
        <div class="card-body px-1 py-1">
            <p class="text-center" style="font-size: 10pt;">Россия, 681000, Дальневосточный федеральный
                округ, Хабаровский край, г. Комсомольск-на-Амуре, ул. Кирова, д. 17, корп. 2, ауд. 138 </p>
            <div class="dropdown-divider"></div>
            <p style="font-size: 10pt;">Тел.: +7 (4217) 59-13-79 </p>
            <div class="dropdown-divider"></div>
            <p style="font-size: 10pt;">e-mail.: izdat@amgpgu.ru </p>
            <div class="dropdown-divider"></div>
            <div class="text-center">
                <a href="https://google.com" target="_blank" class="btn btn-primary active" role="button"
                   aria-pressed="true">Задать вопрос</a>
            </div>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-header text-center">
            <b>Свидетельство</b>
        </div>
        <div class="card-body px-1 py-1">
            **Будет скан свидетельства о регистрации СМИ**
        </div>
    </div>



{{--    <div class="card my-3">--}}
{{--        <div class="card-header">--}}
{{--            <b>Последний выпуск</b>--}}
{{--        </div>--}}
{{--        <div class="card-body px-1 py-1">--}}
{{--            **ссылка на последний номер журнала**--}}
{{--        </div>--}}
{{--    </div>--}}

</div>
