<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
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
    {{-- {{dd(Auth::user())}} --}}
  </header>
  <main>
    {{-- {{dd($products)}} --}}
    <x-layout bodyClass="g-sidenav-show  bg-gray-200">

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            
                            <div class=" me-3 my-3 text-end">
                                <a class=" add btn bg-gradient-dark mb-0" href="/admin/add"><i
                                        class=" add material-icons text-sm"></i>&nbsp;&nbsp;Add New
                                    User</a>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ID
                                                </th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ФОТО</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    НАЗВАНИЕ</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ЦЕНА</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ОПИСАНИЕ</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ОЦЕНКА
                                                </th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        @foreach ($products as $product)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$product->id}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{asset('images/'.$product->image)}}"
                                                                class="avatar avatar-sm me-3 border-radius-lg" style="width: 300px" alt="user1">
                                                        </div>
    
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$product->title}}</h6>
    
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs text-secondary mb-0">{{$product->price}}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{$product->description}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{$product->grade}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a rel="tooltip" class="btn edit btn-success btn-link"
                                                        href="/admin/edit/{{$product->id}}" data-original-title=""
                                                        title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    
                                                    <button type="button" class="btn close btn-danger btn-link"
                                                    data-original-title="" title="">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    
    </x-layout>
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

