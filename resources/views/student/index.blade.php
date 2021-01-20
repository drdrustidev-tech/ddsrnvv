@extends('layouts.dashboard')

@section('content')


   <div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card">
            <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger py-0" 
            style="font-size: 0.8em; width:100px;" id="createNewCompany">Add Student</a>
            <table class="table table-bordered">
              <thead>
                  <tr>
                     <th>First Name</th>
                     <th>Last Name</th>
                     <th>Address</th>
                     <th width="200px">Action</th>
                  </tr>
              </thead>

              <tbody>
              </tbody>

            </table>
              @include('student.modal')
           </div>
        </div>
    </div>

@endsection


@section('script')
<script>

$(document).ready(function(){

  get_student_data()

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

//Get all company
function get_student_data() {
    
	$.ajax({
        url: "{{ route('student.getall') }}",
        type:'GET',
    	data: { }
	}).done(function(data){
        table_data_row(data.data)
	});
}

//Company table row
function table_data_row(data) {

    var	rows = '';
    
	$.each( data, function( key, value ) {
        
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+value.first_name+'</td>';
      rows = rows + '<td>'+value.last_name+'</td>';
	  	rows = rows + '<td>'+value.address+'</td>';
	  	rows = rows + '<td data-id="'+value.id+'">';
                rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="editCompany" data-id="'+value.id+'" data-toggle="modal" data-target="#modal-id">Edit</a> ';
                rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="'+value.id+'" >Delete</a> ';
                rows = rows + '</td>';
	  	rows = rows + '</tr>';
	});

	$("tbody").html(rows);
}



//Insert company data
$("body").on("click","#createNewCompany",function(e){

e.preventDefault;
$('#userCrudModal').html("Create company");
$('#submit').val("Create company");
$('#modal-id').modal('show');
$('#company_id').val('');
$('#companydata').trigger("reset");
});


//Save data into database
$('body').on('click', '#submit', function (event) {
    event.preventDefault()
    var student_id = $("#student_id").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var address = $("#address").val();
    alert(first_name);
   
    $.ajax({
      url: "{{ route('student.store') }}",
      type: "POST",
      data: {
        student_id: student_id,
        first_name: first_name,
        last_name: last_name,
        address: address
      },
      dataType: 'json',
      success: function (data) {
          
          $('#companydata').trigger("reset");
          $('#modal-id').modal('hide');
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Success',
            showConfirmButton: false,
            timer: 1500
          })
          get_student_data()
      },
      error: function (data) {

          console.log('Error......');
      }
  });
});


//Edit modal window
$('body').on('click', '#editCompany', function (event) {

event.preventDefault();
var id = $(this).data('id');

$.get('student/'+id+'/edit', function (data) {
  //alert(data.id);
     
     $('#userCrudModal').html("Edit company");
     $('#submit').val("Edit company");
     $('#modal-id').modal('show');
     $('#student_id').val(data.id);
     $('#first_name').val(data.first_name);
     $('#last_name').val(data.last_name);
     $('#address').val(data.address);
 })
});



//DeleteCompany
$('body').on('click', '#deleteCompany', function (event) {
    if(!confirm("Do you really want to do this?")) {
       return false;
     }

     event.preventDefault();
    var id = $(this).attr('data-id');
 
    $.ajax(
        {
          url: 'student/'+id+'/delete',
          type: 'GET',
          data: {
                id: id
        },
        success: function (response){
          
            Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            )
            get_student_data()
        }
     });
      return false;
   });



















  
});
   
</script>


@endsection