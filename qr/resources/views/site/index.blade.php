@include('layouts.header')
<section>
    @foreach($qrList as $qr)
    <div class="block">
        <p>
            {{$qr['name']}}
        </p>
        @php ($params = json_decode($qr['param']))
        <p>
            @foreach($params as $param => $val)
                        {{$param . ":" . $val}}
            <br />
            @endforeach
        </p>
        <p>Количество переходов:
            {{$qr['count']}}
        </p>
        <p>Дата создания:
            {{$qr['created_at']}}
        </p>
        <a href="{{route('generate', $qr['id'])}}">Сгенерировать QR</a> |
        <a href="{{route('update', $qr['id'])}}">Редактировать</a> |
        <a href="{{route('delete', $qr['id'])}}">Удалить</a>
    </div>
    <hr />
    @endforeach
</section>
@include('layouts.footer')
