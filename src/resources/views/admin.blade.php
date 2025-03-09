<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gorditas&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif+JP:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="">
                FashionablyLate
            </a>
            <div class="logout__button">
                @if (Auth::check())
                <form action="/logout" method="post">
                    @csrf
                    <button class="logout__button-submit">logout</button>
                </form>
                @endif
            </div>
        </div>
    </header>
    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>
            <form class="form" action="/admin" method="post">
                @csrf
                <div class="form__item">
                    <div class="form__item-utilities">
                        <input class="form__item-input" type="search" name="content" placeholder="名前やメールアドレスを入力してください" value="{{ old('content') }}">
                        <select class="form__item-select" name="gender">
                            <option value="" selected="selected">性別</option>
                            <option value="男性">男性</option>
                            <option value="女性">女性</option>
                            <option value="その他">その他</option>
                        </select>
                        <select class="form__item-select" name="category">
                            <option value="" selected="selected">お問い合わせの種類</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category['content'] }}">{{ $category['content'] }}</option>
                            @endforeach
                        </select>
                        <input type="date">
                        <div class="form__button">
                            <button class="form__button-submit" type="submit">検索</button>
                            <input type="reset" value="reset">
                        </div>
                    </div>
                </div>
                <div class="admin__table">
                    <table class="admin__table-inner">
                        <tr>
                            <th>お名前</th>
                            <th>性別</th>
                            <th>メールアドレス</th>
                            <th>お問い合わせの種類</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </main>
</body>
</html>