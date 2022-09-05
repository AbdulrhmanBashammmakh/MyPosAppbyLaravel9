@extends('../layouts/app')

@section('content')
<div  class = "container">
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex col-6">
              <input class="form-control me-2 " type="search" placeholder="البحث" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
</div>

<div  class = "container">
    <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
      <h5 class="text-white h4">Collapsed content</h5>
      <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>
  </div>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
</div>
<br>

    <br>
    <form action= " {{route('pro.create')}} ">
        <div  class = "row justify-content-center" >
        <button class="btn btn-primary col-3" type="submit"> create </button>
    </div>
    </form>


<div  class = "container">
    <table class="table caption-top">
        <caption>List of Products</caption>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">details</th>
            <th scope="col">Unit</th>
            <th scope="col">code</th>
            <th scope="col">barcode</th>
            <th scope="col">cata</th>
            <th scope="col">button</th>
          </tr>
        </thead>
        <tbody>
            @php
            $i=0;
            @endphp
 @foreach ($products as $product)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->details }}</td>
                <td>{{ $product->unit->name }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->barcode }}</td>
                <td>{{ $product->category->cate }}</td>

                <td>
                    <a href="{{route('pro.show',$product->id)}}" >show</a>
                    <a href=" {{route('pro.edit',$product->id)}} " >Update</a>
                    <form action= " {{route('pro.destroy',$product->id)}} "> </form>
                    @csrf
                    @method('delete')
                    <button type="submit">delete</button>
                </td>
              </tr>
 @endforeach

        </tbody>
      </table>

</div>

@endsection
