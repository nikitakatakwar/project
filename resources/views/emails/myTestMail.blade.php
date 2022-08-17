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

                                            <h1>{{$details['greeting'] }}</h1>
                                                <p>{{ $details['body'] }}</p>
                                                <p>{{ $details['thanks'] }}</p>
                                                <p>{{ $details['actionText'] }}</p>
                                                <p>{{ $details['actionURL'] }}</p>
                                                <p>{{ $details['order_id'] }}</p>
                                            <p>Thank you</p>
                                            <a href="{{ route('addStudent') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                                                                back
                                                                                                                </a>
                                           </div>
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
</div>
@endsection





