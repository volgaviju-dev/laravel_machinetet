@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">     <a class="btn btn-success" href="{{ route('manageusers.create') }}"> Create New User</a>  </div>

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

   

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Phone</th>
            <th>Email</th>
            <th width="280px">Action</th>

        </tr>

        @foreach ($manageusers as $manageusers)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $manageusers->name }}</td>

            <td>{{ $manageusers->phone_number }}</td>
            <td>{{ $manageusers->email }}</td>
            <td>

                <form action="{{ route('manageusers.destroy',$manageusers->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('manageusers.show',$manageusers->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('manageusers.edit',$manageusers->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

   

      

@endsection

                </div>
            </div>
        </div>
    </div>
</div>

