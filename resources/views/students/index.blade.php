@extends('students.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New School</a>
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
	    <th>School</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ ++$i }}</td>
	    <td>{{ $value->name }}</td>
	    <td><a href = '{{route("schools.show", $value->school->id)}}'>{{$value->school->name}}</a></th>
            <td>
                <form action="{{ route('students.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('students.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('students.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection
