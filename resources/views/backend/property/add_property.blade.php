@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">

      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
         
<div class="card">
    <div class="card-body">
        <h6 class="card-title">Add Property</h6>
            <form>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Property Name</label>
                            <input type="text" name="property_name" class="form-control">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <select class="form-select" id="exampleFormControlSelect1">
                    <option selected="" disabled="">Select your age</option>
                    <option>12-18</option>
                    <option>18-22</option>
                    <option>22-30</option>
                    <option>30-60</option>
                    <option>Above 60</option>
                </select>
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" placeholder="Enter city">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <input type="text" class="form-control" placeholder="Enter state">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Zip</label>
                            <input type="text" class="form-control" placeholder="Enter zip code">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" placeholder="Enter email">
                        </div>
                    </div><!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" autocomplete="off" placeholder="Password">
                        </div>
                    </div><!-- Col -->
                </div><!-- Row -->
            </form>
            <button type="button" class="btn btn-primary submit">Submit form</button>
    </div>
</div>

        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->

      <!-- right wrapper end -->
    </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function (){
                $('#myForm').validate({
                    rules: {
                        amenities_name: {
                            required : true,
                        }, 
                        
                    },
                    messages :{
                        amenities_name: {
                            required : 'Please Enter Amenities Name',
                        }, 
                         
        
                    },
                    errorElement : 'span', 
                    errorPlacement: function (error,element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight : function(element, errorClass, validClass){
                        $(element).addClass('is-invalid');
                    },
                    unhighlight : function(element, errorClass, validClass){
                        $(element).removeClass('is-invalid');
                    },
                });
            });
            
        </script>


@endsection