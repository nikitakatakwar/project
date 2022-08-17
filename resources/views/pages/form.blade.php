@extends('layouts.default')

<link rel=”stylesheet” href=”//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css”>
<link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css”>
<script src=”//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js”></script>
@section('content')
<div class="font-poppins ">
    <div x-data="{ sidebarOpen: true }" class="lg:flex overflow-x-auto md:min-h-screen w-full">
      <main class="flex-1 ">
            <div class="pt-3 bg-white">
                    <div class="sm:p-4 py-4">
                        <div class="container sm:px-6 px-3 mx-auto">
                            <div class="pt-3">
                                <div class="sm:p-4 py-4">
                                    <div class="container sm:px-6 px-3 mx-auto">
                                        <a class="font-medium text-black hover:text-blue-700 " href="manage-user.html">
                                            <svg class="w-5 opacity-70" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                            </svg>
                                        </a>
                                        <div class="md:grid md:grid-cols-3 md:gap-6 my-6">
                                            <div class="md:col-span-1">
                                              <div class="px-4 sm:px-0">
                                                <h3 class="text-lg font-medium leading-6 text-gray-900">Add
                          												Students
                          											</h3>
                                                <p class="mt-1 text-sm text-gray-600">
                                                  Use a permanent address where you can receive mail.
                                                </p>
                                              </div>
                                            </div>
                                            <div class="mt-5 md:mt-0 md:col-span-2 p-5">

                                              <form action="{{ route('saveData') }}" method="POST" class="p-5">
                                                  @csrf

                                                  @if ($errors->any())

                                                    <div class="alert alert-danger">
                                                    <p><strong>Opps Something went wrong</strong></p>
                                                      <ul>
                                                        @foreach ($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                        @endforeach
                                                      </ul>
                                                    </div>
                                                  @endif

                                                  @if (Session::has('success'))
                                                    <div class="alert alert-success text-center">
                                                      <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                      <p>{{ Session::get('success') }}
                                                    </div>
                                                  @endif
                                                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                                                      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                                        <div class="grid grid-cols-3 gap-6">
                                                            <div class="col-span-3 sm:col-span-2">
                                                              <label for="Name" class="block text-sm font-medium text-gray-700">
                                                                Name
                                                              </label>
                                                              <div class="mt-1 flex rounded-md shadow-sm">

                                                                <input type="text" name="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                                                              </div>
                                                            </div>
                                                            <div class="col-span-3 sm:col-span-2">
                                                              <label for="email-address" class="block text-sm font-medium text-gray-700">
                                                                Email address
                                                              </label>
                                                              <div class="mt-1 flex rounded-md shadow-sm">

                                                                <input type="email" name="email" id="email-address" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                                                              </div>
                                                            </div>
                                                            <div class="col-span-3 sm:col-span-2">
                                                              <label for="address" class="block text-sm font-medium text-gray-700">
                                                                 Address
                                                              </label>
                                                              <div class="mt-1 flex rounded-md shadow-sm">

                                                                <textarea  name="address" cols="3" rows="3" id="address" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"></textarea>
                                                              </div>
                                                            </div>
                                                            <div class="col-span-3 sm:col-span-2">
                                                                  <label for=" Date of birth" class="block text-sm font-medium text-gray-700">
                                                                   Date of birth
                                                                  </label>
                                                                  <div class="mt-1 flex rounded-md shadow-sm">
                                                                    <input type="date" name="date" id="contact" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                                                                  </div>
                                                                </div>
                                                            <div class="col-span-3 sm:col-span-2">
                                                              <label for="contact" class="block text-sm font-medium text-gray-700">
                                                                Contact Number
                                                              </label>
                                                              <div class="mt-1 flex rounded-md shadow-sm">

                                                                <input type="tel" name="contact_number" id="contact" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                                                              </div>
                                                            </div>


                                                              <div class="col-span-3 sm:col-span-3">
                                                                <label for="Education_detail" class="block text-sm font-medium text-gray-700 self-center w-1/4">
                                                                  Education
                                                                </label>
                                                              </div>
                                                          </div>
                                                        </div>
                          											         <table class="table table-bordered " id="dynamicTable">
                                  													<tr>
                                  														<th>Degree</th>
                                  														<th>Passing Year</th>
                                  														<th>Percentage</th>
                                  														<th>Action</th>
                                  													</tr>
                                  													<tr>
                                  														<td><input type="text"  name="college[]"  placeholder="Enter your degree" class="form-control " /></td>
                                  														<td><input type="date"  name="year_of_passing[]" placeholder=" Passing year" class="form-control" /></td>
                                  														<td><input type="text"  name="degree[]"  placeholder="Enter percentage" class="form-control" /></td>
                                  														<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                  													</tr>
                                                          </table>
                                                          <div class="col-span-3 sm:col-span-3 ml-3">
                                                                <label for="Education_detail" class="block text-sm font-medium text-gray-700 self-center w-1/4">
                                                                  company Detail
                                                                </label>
                                                              </div>

                                          		                  <table class="table table-bordered p-5 " id="dynamicTablec">
                                          													<tr>
                                          														<th>Company Name</th>
                                                                      <th>Action</th>
                                                                    </tr>
                                          													<tr>
                                          														<td><input type="text" name="company_name[]" placeholder="Enter your company_name" class="form-control" /></td>

                                          														<td><button type="button" name="add" id="addc" class="btn btn-success">Add More</button></td>
                                          													</tr>
                                                                </table>
                                                                  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 flex space-x-6 justify-start">
                                                                      <button type="submit"name="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                        Save
                                                                      </button>

                                                                      <a href="{{ route('addStudent') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                       back
                                                                      </a>
                                                                  </div>
                                                                </div>
                                                         </form>
                                                       </div>
                                                     </div>
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                                           </div>
                                         </div>
                  </main>
                </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>

    	<script type="text/javascript">
        var i = 0;
        $("#add").click(function(){
          ++i;
            $("#dynamicTable").append('<tr><td><input type="text" name="college[]" placeholder="Enter your College" class="form-control" /></td><td><input type="date" name="year_of_passing[]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="degree[]" placeholder="Enter your degree" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    			});

    			$(document).on('click', '.remove-tr', function(){
    				$(this).parents('tr').remove();
    			});
      </script>
      <script type="text/javascript">
        var i = 0;
        $("#addc").click(function(){
          ++i;
          $("#dynamicTablec").append('<tr><td><input type="text" name="company_name[]" placeholder="Enter your Company" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
           });

    			$(document).on('click', '.remove-tr', function(){
    				$(this).parents('tr').remove();
    			});

    </script>
</div>
@endsection
