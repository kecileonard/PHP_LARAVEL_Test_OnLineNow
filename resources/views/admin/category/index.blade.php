@extends('layouts.admin')

@section('content')

 <div class="container-fluid px-4">

	<div class='card mt-4'>

      <div class="card-header bg-primary">
            <h4 class="text-white">Registered categories </h4>
      </div>

	  <div class ="card-body mt-4">

		<table id="categories_table" class="table table-bordered ">
          <thead>
		    <tr>
	  		  <th> Id </th>
	  		  <th> Name </th>
              <th> Slug </th>
              <th> Description </th>
	  		  <th> Status </th>
              <th> Image</th>
	  		  <th> Action</th>
	  	    </tr>
	  	  </thead>
	  	  <tbody>
	  	    @foreach ($categories as $category)

		  	    <tr>
                   <td> {{$loop->iteration }} </td>
		  	       <td> {{$category->name }}  </td>
		  	       <td> {{$category->slug}}   </td>
                   <td> {{$category->description}} </td>
                   <td> {{$category->status}} </td>

                   <td>
                        <img  src="{{ asset('assets/uploads/category/'.$category->image) }}" class ="category-image" alt="">
                   </td>

		  	       <td style="display:flex">
                        <a href= "{{ url('/edit-category/'.$category->id) }}" class ="btn btn-primary" style="margin-right:10px"> Edit </a>
                        <form method="post" class="delete-category" data-route="{{route('category.destroy',$category->id)}}">
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
