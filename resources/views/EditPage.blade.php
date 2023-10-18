<!doctype html>
<html lang="en">

<head>
  <title>Изменение товара</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container">
        <div class="wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel-body">
                <form action="/admin/edit/{{$product->id}}" method="POST" class="form-horizontal " style="display: flex;
                flex-direction: column;" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="display: flex; align-items: center">
                        <h2 class="col-lg-1 control-label">ID</h2>
                        <div class="col-lg-10">
                            <h1 class="form-control-static">{{$product->id}}</h1>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">НАЗВАНИЕ</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="focusedInput" type="text" name="title" value="{{$product->title}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ЦЕНА</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="focusedInput" name="price" type="number" value="{{$product->price}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ОПИСАНИЕ</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 200px" name="description" type="text">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2" for="inputSuccess">ОЦЕНКА</label>
                        <div class="col-lg-10">
                            <select name="grade" class="form-control m-bot15">
                                <option value="1" {{ $product->grade == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $product->grade == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $product->grade == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $product->grade == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $product->grade == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('images/' . $product->image) }}" alt="Текущее изображение">
                        <label for="exampleInputFile">Изображение</label>
                        <input type="file" name="image" id="exampleInputFile">
                    </div>
                    <button type="submit" class="btn btn-warning col-sm-10">Изменить</button>
                </form>
            </div>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>