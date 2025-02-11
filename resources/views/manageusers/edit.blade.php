@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">     <a class="btn btn-success" href=""> Back</a>  </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

             

                    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

              
            </div>

            <div class="pull-right">

        


            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

 

    <form action=" {{ route('manageusers.update',$manageUsers->id)}}" method="POST">

@csrf
@method('PUT')


 <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>

            <input type="text" name="name" value ="{{ $manageUsers->name}}"   class="form-control" placeholder="Name">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

<strong>Phone:</strong>

<input type="text" name="phone_number" value ="{{ $manageUsers->phone_number }}"   class="form-control" placeholder="Phone">

</div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

<strong>Email:</strong>

<input type="text" name="email" value ="{{ $manageUsers->email }}"  class="form-control" placeholder="Email">

</div>

</div>



  

</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">

<button type="submit" class="btn btn-primary">Submit</button>

</div>

</form>

  

   

      

@endsection

                </div>
            </div>
        </div>
    </div>
</div>

