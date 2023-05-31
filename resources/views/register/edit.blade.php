 @extends('layouts.default')
 @section('content')
     <div class="content-wrapper" style="min-height: 1345.31px;">

         <div class="row">

             <div class="col-md-12">

                 <div class="card card-primary">
                     <div class="card-header">
                         <h3 class="card-title">Editing Form</h3>
                     </div>


                     <form action="{{ route('registers.update', $register->id) }}" method="post">
                         @method('PUT')
                         @csrf

                         <div class="card-body">
                             <div class="form-group">
                                 <label for="exampleInputName">Full Name</label>
                                 <input type="text" class="form-control" name="name"
                                     value="{{ old('name', $register->name) }}" id="exampleInputName"
                                     placeholder="Enter name">
                                 @error('name')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>


                             <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                 <input type="email" class="form-control" name="email"
                                     value="{{ old('email', $register->email) }}" id="exampleInputEmail1"
                                     placeholder="Enter email">
                                 @error('email')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>


                             <div class="form-group">
                                 <label for="exampleInputPhone">Phone</label>
                                 <input type="string" class="form-control" name="phone"
                                     value="{{ old('phone', $register->phone) }}" id="exampleInputPhone"
                                     placeholder="Enter phone">
                                 @error('phone')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>


                             <div class="form-group">
                                 <label for="exampleInputBirthday">Birthday</label>
                                 <input type="date" class="form-control" name="birthday"
                                     value="{{ old('birthday', $register->birthday) }}" id="exampleInputBirthday"
                                     placeholder="Enter birthday">
                                 @error('birthday')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>


                             <div class="form-group">
                                 <label for="exampleInputAddress">Address</label>
                                 <input type="text" class="form-control" name="address"
                                     value="{{ old('address', $register->address) }}" id="exampleInputAddress"
                                     placeholder="Enter address">
                                 @error('address')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>



                             <div class="form-group">
                                 <label for="exampleInputCode">Code</label>
                                 <input type="integer" class="form-control" name="code"
                                     value="{{ old('code', $register->code) }}" id="exampleInputCode" placeholder="Code">
                                 @error('code')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>


                             <div class="form-group">


                                 <label for="gender">Gender:</label><br>
                                 <input type="radio" name="gender" value="male"> Male <input type="radio"
                                     name="gender" value="female">
                                 Female <br>
                                 @error('gender')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                 @enderror
                             </div>



                             <div class="card-footer">
                                 <button type="submit" class="btn btn-primary">UPDATE</button>
                             </div>
                     </form>
                 </div>

             </div>

         </div>

     </div>
 @endsection
