@extends('home')
@section('main')
<div class="content">
	@include('dashboard.headingtwo')	



	<div class="container-fluid">
		<br><br>

    <h2 align="center">Add More Products to the Database</h2> 

   

    <form action="{{ route('submitMoreProduct') }}" method="POST">

        @csrf

   

        @include('dashboard.errorSuccess')

   

        <table class="table table-bordered" id="dynamicTable">  

            <tr>

                <th>Name</th>

                <th>Description</th>

                <th>Available Stock <span class="text-small">(optional)</span></th>

                <th>Select Vendor</th>

                <th>Action</th>

            </tr>

            <tr>  

                <td><input type="text" name="product[0][name]" placeholder="Enter Product Name" class="form-control" /></td>  

                <td><input type="text" name="product[0][description]" placeholder="Enter Product description" class="form-control" /></td>  
             

                <td><input type="number" name="product[0][stock]" placeholder="Enter Product Stock" class="form-control" /></td>

                

                <td>
                
                <select name="product[0][vendor_id]"  class="form-control">
                    @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                    @endforeach
                </select>
                </td>  


                
 

                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

            </tr>  

        </table> 

    

        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>

   

<script type="text/javascript">

   

    var i = 0;

       

    $("#add").click(function(){

   

        ++i;

   

        $("#dynamicTable").append('<tr><td><input type="text" name="product['+i+'][name]" placeholder="Enter Product Name" class="form-control" /></td><td><input type="text" name="product['+i+'][description]" placeholder="Enter your Description" class="form-control" /></td><td><input type="number" name="product['+i+'][stock]" placeholder="Enter Product Stock" class="form-control" /></td><td><select name="product['+i+'][vendor_id]"  class="form-control">@foreach($vendors as $vendor)<option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>@endforeach</select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });

   

    $(document).on('click', '.remove-tr', function(){  

         $(this).parents('tr').remove();

    });  

   

</script>

</div>


@endsection