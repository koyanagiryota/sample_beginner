<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset = "UTF-8">
    <meta name="viewpoint" content="width=device-width", initial-scale=1.0">
    <title>ToDo App</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <nav class = "my-navbar">
        <a class="my-navbar-brand" href="/">To Do App</a>
    </nav>
</header>
<main>
    <div class = "contaier">
        <div class = "row">
            <div class = "col col-md-4">
                <nav class = "panel panel-default">
                    <div class = "panel-heading">フォルダ</div>
                    <div class = "panel-body">
                        <a href = "#" class = "btn btn-default btn-block">
                            フォルダを追加する
                        </a>
                    </div>
                    <div class = "list-group">
                        @foreach($folders as $folder)
                            <a href="{{ route('tasks.index', ['id' => $folder->id]) }}">
                                {{ $folder->title }}
                            </a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class = "column col-md-8">

            </div>
        </div>
    </div>
</main>
</body>
</html>