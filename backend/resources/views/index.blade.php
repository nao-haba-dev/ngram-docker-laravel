<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
<div class="container">
    <div class="card center-block">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form action="/admin" method="Get">
                <div class="mb-2">
                    <label for="free_word" class="form-label">全文検索</label>
                    <input type="text" class="form-control" name="free_word" id="free_word"
                           value="{{$parameters->get('free_word')}}">
                </div>
                <input type="submit" class="btn btn-primary" value="検索">
                <a href="/admin" class="btn btn-secondary">検索条件クリア</a>
            </form>
        </div>
    </div>
    <br>
    <div>
        <div>検索結果は{{$shops->total()}}件です。</div>
        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>年齢</th>
                    <th>性別</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shops as $shop)
                    <tr>
                        <td>{{$shop->id}}</td>
                        <td>{{$shop->name}}</td>
                        <td>{{$shop->age}}</td>
                        <td>{{$shop->gender_id ===1 ? '男性':'女性'}}</td>
                    </tr>
                @endForeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
