@include('layouts.header')
<section>
    <form action="{{route('download')}}" method="post">
        <h2>Сохранить файл</h2>
        <img src="/img/qrcodes/{{$fileName}}.png" alt="qr">
        <p>Выберите формат сохранения:</p>
        <p><input name="formatFile" type="radio" value="png" checked>.PNG</p>
        <p><input name="formatFile" type="radio" value="jpg">.JPG</p>
        <input type="hidden" name="fileName" value="{{$fileName}}">
        <input type="submit" name="download" value="Скачать">
    </form>
</section>
@include('layouts.footer')
