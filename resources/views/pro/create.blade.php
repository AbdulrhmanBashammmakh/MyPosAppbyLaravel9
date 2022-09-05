@extends('../layouts/app')

@section('content')

<br>
<div class="card" class="container" style="padding:10px">
    <div class="card-body">
        <div class="card-header text-center">
            <h3>Create product</h3>
          </div>
<div  class="card-body">

    <form class="row g-3">
        <div class="col-8">
          <label for="inputEmail4" class="form-label">Product</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="col-md-4">
            <label for="inputAddress" class="form-label">Code</label>
            <input type="text" class="form-control" name="code">
          </div>

        <div class="col-12">
          <label for="inputPassword4" class="form-label">details</label>
          <input type="text" class="form-control" name="details">
        </div>



        <div class="col-md-4">
          <label for="inputAddress2" class="form-label">Bar Code</label>
          <input type="text" class="form-control" name="barcode" >
        </div>


        <div class="col-md-4">
            <label for="inputState" class="form-label">Unit</label>
            <select name="unit" class="form-select">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>

        <div class="col-md-4">
          <label for="inputState" class="form-label">Cata</label>
          <select name="cata" class="form-select">
            <option selected>Choose...</option>
            <option>...</option>
          </select>
        </div>

        <div class="col-4">
            <div  class = "row justify-content-center" >
          <button type="submit" class="btn btn-primary "> Create </button>
        </div>
    </div>
      </form>

 </div>
</div>
</div>
@endsection
