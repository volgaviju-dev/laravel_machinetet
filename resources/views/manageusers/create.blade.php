@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">     <a class="btn btn-success" href="{{ route('manageusers.create') }}"> Create New User</a>  </div>

                <div class="card-body">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
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

   

    <form action="{{ route('manageusers.store') }}" method="POST">

@csrf



 <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>

            <input type="text" name="name" class="form-control" placeholder="Name">
            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

    <div class="form-group">

<strong>Phone:</strong>

<input type="text" name="phone_number" class="form-control" placeholder="Phone">
@if ($errors->has('phone_number'))
                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                        @endif
</div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

<div class="form-group">

<strong>Email:</strong>

<input type="text" name="email" class="form-control" placeholder="Email">
@if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

</div>

</div>



    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>



</form>

  

   

      

@endsection

                </div>
            </div>
        </div>
    </div>
</div>

