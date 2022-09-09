 @extends('../layouts/app')

 @section('content')

     <div class="row justify-content-center">
         <div class="col-12">
             <div class="card">
                 <div class="card-header d-flux">
                     <b>Create product</b>
                     <a href="{{ route('pro.index') }}" class="btn btn-primary btn-sm ml-auto ">back</a>
                 </div>
                    <div class="card-body">
                     <form class="row g-3" action={{route('pro.store')}} method="POST">
                        @csrf
           
                         <div class="col-8">
                             <label for="inputEmail4" class="form-label">Product</label>
                             <input type="text" class="form-control" name="name" value=" {{ old('name') }} ">
                                @error('name')
                                <span class="text_danger"> {{ $message }} </span>
                                @enderror

                         </div>
                         <div class="col-md-4">
                             <label for="inputAddress" class="form-label">Code</label>
                             <input type="text" class="form-control" name="code"  value=" {{ old('code') }} ">
                         </div>

                         <div class="col-12">
                             <label for="inputPassword4" class="form-label">details</label>
                             <input type="text" class="form-control" name="details" value=" {{ old('details') }} ">
                         </div>



                         <div class="col-md-4">
                             <label for="inputAddress2" class="form-label">Bar Code</label>
                             <input type="text" class="form-control" name="barcode" value=" {{ old('barcode') }} ">
                         </div>


                         <div class="col-md-4">
                             <label for="inputState" class="form-label">Unit</label>
                             <select name="unit" class="form-select">
                                 <option></option>
                                 @foreach ( $unt as $un )
                                 <option  value="{{ $un->id }}" {{ old('unit') == $un->id ? 'selected' :'' }} > {{ $un->name }} </option>
                                 @endforeach
                             </select>
                             @error('unit')
                             <span class="text_danger"> {{ $message }} </span>
                             @enderror
                         </div>

                         <div class="col-md-4">
                             <label for="inputState" class="form-label">Cata</label>
                             <select name="cata" class="form-select">
                                <option></option>
                                @foreach ( $cateq as $cat )
                                <option  value="{{ $cat->id }}" {{ old('cata') == $cat->id ? 'selected' :'' }} > {{ $cat->cate }} </option>
                                @endforeach
                             </select>
                             @error('cata')
                             <span class="text_danger"> {{ $message }} </span>
                             @enderror
                         </div>

                         <div class="continar  ">
                             <div class="  justify-content-center">
                                 <button type="submit" class="btn btn-primary ml-auto btn-sm "> Create </button>
                             </div>
                         </div>
                     </form>

                    </div>

                 </div>
             </div>
         </div>
     </div>
 @endsection
