@extends('layouts.admin')

@section('content')

 <div class="container-fluid px-4">

	<div class='card mt-4'>

      <div class="card-header bg-primary">
            <h4 class="text-white">Registered users
               <a href="{{url('new-user')}}" class="btn btn-success float-end"> Add User </a>
            </h4>
      </div>

	  <div class ="card-body mt-4">

		  <table id="user_table" class="table table-bordered ">
          <thead>
		    <tr>
	  		  <th> Id </th>
	  		  <th> First Name </th>
              <th> Last Name </th>
	  		  <th> Username</th>
	  		  <th> Email </th>
              <th> Role </th>
	  		  <th> Action</th>
	  	    </tr>
	  	  </thead>
	  	  <tbody>
	  	    @foreach ($users as $user)

		  	    <tr>
                   <td>{{ $loop->iteration }}</td>
		  	       <td>{{ $user->first_name }} </td>
                   <td>{{ $user->last_name }} </td>
                   <td>{{ $user->username }} </td>
                   <td>{{ $user->email }} </td>
                   <td>{{ $user->role_as == '1' ? 'Admin': 'User'}} </td>
		  	       <td style="display:flex ">
                     <a href= "{{ url('/edit-user/'.$user->id) }}" class ="btn btn-primary" style="margin-right:10px"> Edit </a>
                     {{--
                     <a href= "{{ url('/delete-user/'.$user->id) }}" class ="btn btn-danger">Delete </a>
                    --}}
                    <form method="post" class="delete-user" data-route="{{route('admin.destroy',$user->id)}}">
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

		  	       </td>
		  	    </tr>

		    @endforeach
		 </tbody>
		 </table>
	  </div>


	</div>
</div>

@endsection
