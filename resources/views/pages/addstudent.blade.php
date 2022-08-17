@extends('layouts.default')
@section('content')

<div x-data="{ sidebarOpen: true }" class="lg:flex overflow-x-auto md:min-h-screen w-full">
    <main class="flex-1 ">
        <div class=" bg-primary-400">
                <div class="container sm:px-1 mx-auto">
                    <div class="flex justify-between">
                        <ul class="flex md:space-x-10 py-5">
                            <li class="py-3 text-center self-center">
                                <a href="#" class=" flex">
                                    <span class="self-center font-poppins font-medium text-white md:text-sm text-xs uppercase ">Customers</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="pt-3 bg-white">
                <div class="sm:p-4 py-4">
                    <div class="container sm:px-6 px-3 mx-auto">
                        <div class="flex justify-between">
                            <a class="font-medium text-black hover:text-blue-700 justify-end" href="#">
                                <svg class="w-5 opacity-70" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </a>
                            <a href="{{ route('add') }}" class="flex w-40 text-center z-10 rounded-full focus:outline-none py-2 uppercase border border-transparent shadow-sm text-xs font-normal text-black hover:text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-7 mt-5">
                                <span class="text-xs self-center font-normal"> Add student</span>
                            </a>
                        </div>

                        <h3 class="text-lg font-medium leading-6 text-gray-900 py-4">Student List</h3>

                        <div class="shadow border-b border-gray-200 sm:rounded-lg mb-5">
                        <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th> No</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Address</th>
                                      <th>date_of_birth</th>
                                      <th>Company</th>
                                      <th>Contact No.</th>
                                      <th>Education</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                <tr>
                                @if(count($nik)) <!-- Do whatever you like -->
                                @foreach($nik as $row)
                                  <tr>
                                      <td>{{ $row ->id}}</td>
                                      <td>{{ $row ->name}}</td>
                                      <td>{{ $row ->email}}</td>
                                      <td>{{ $row ->address}}</td>
                                      <td>{{ $row ->date_of_birth}}</td>
                                      <td>
                                          <ul>
                                              @foreach ($row->company as $user)
                                                  <li>{{ $user['company_name'] }}</li><br>
                                              @endforeach
                                          </ul>
                                      </td>
                                      <td>
                                        <table style=" width:50px;">
                                            <tr>
                                              @foreach ($row->contact as $user)
                                                {{ $user['contact_no'] }}
                                              @endforeach
                                            </tr>
                                        </table>
                                      </td>
                                      <td>
                                        <table style=" width:50px;">
                                        <thead>
                                            <tr>
                                              <th>Degree</th>
                                              <th>Percentage</th>
                                              <th>year_of_passing</th>

                                            </tr>
                                          </thead>
                                            <tr>
                                              <td>
                                              @foreach ($row->Degree as $user)
                                              <ul><li> {{ $user['college'] }}</li><br><br></ul>
                                              @endforeach
                                              </td>

                                              <td>
                                              @foreach ($row->Degree as $user)
                                              <ul><li> {{ $user['degree'] }}</li><br><br></ul>
                                              @endforeach
                                              </td>

                                              <td>
                                              @foreach ($row->Degree as $user)
                                              <ul><li> {{ $user['year_of_passing'] }}</li><br><br></ul>
                                              @endforeach
                                              </td>
                                            </tr>

                                        </table>
                                      </td>
                                      </tr>
                                      @endforeach
                                      @endif
                                    </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="flex justify-end">
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                              <span class="sr-only">Previous</span>
                              <!-- Heroicon name: solid/chevron-left -->
                              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                              </svg>
                            </a>

                            <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-xs font-medium">
                              1
                            </a>
                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-xs font-medium">
                              2
                            </a>

                            <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-xs font-medium text-gray-700">
                              ...
                            </span>

                            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-xs font-medium">
                              10
                            </a>
                            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                              <span class="sr-only">Next</span>

                              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                              </svg>
                            </a>
                          </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script>
@endsection
