@include('layouts.header')
<section>
    @if(count($errors) > 0)
    <div class="errors">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="post">
        <label for="qrName">Название QR-кода:<br /><input id="qrName" type="text" name="qrName" placeholder="Введите название QR кода" value="{{$name}}" required></label><br />
        <label for="city">City:<br /><input id="city" type="text" name="city" placeholder="Введите название города" value="{{$param->city}}" required></label><br />
        <label for="campaing">Campaing:<br /><input id="campaing" type="text" name="campaing" placeholder="Введите название компании" value="{{$param->campaing}}" required></label><br />
        <label for="source">Source:<br /><input id="source" type="text" name="source" placeholder="Введите адрес" value="{{$param->source}}" required></label><br />
        <label for="product">Product:<br /><input id="product" type="text" name="product" placeholder="Введите название продукта" value="{{$param->product}}" required></label><br /><br />
        <input type="hidden" name="id" value="{{$id}}">
        <input id="cancel" type="button" value="Отмена">
        <input type="submit" value="Сохранить">
    </form>
</section>
@include('layouts.footer')
