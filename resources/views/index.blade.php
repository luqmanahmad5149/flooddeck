@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font bold text-shadow-md pb-14">
                    Do you want to learn more about flood?
                </h1>
                <a 
                    href="/"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase hover:bg-gray-900 hover:text-gray-100">
                    Click Here
                </a>
            </div>
        </div>
    </div>
    <div class="mt-15">
        {{-- Search Bar --}}
        <h1 class="text-4xl text-center pb-10">
            Search Channel by ID
        </h1>
        <div class="pb-3 flex justify-center mx-auto text-gray-600">
            <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
              type="search" name="search" placeholder="Search">
            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
              <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                width="512px" height="512px">
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
              </svg>
            </button>
          </div>
        <!-- cards channel -->
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-10 gap-x-8">
            @foreach ($thingspeakchannels as $thingspeakchannel)
                @php
                    $datas = Http::get($thingspeakchannel->thingspeak_api)
                @endphp 
                <div class="rounded overflow-hidden shadow-lg"> 
                    @foreach ($datas['feeds'] as $data)
                        <div class="px-6 py-4">     
                                <div class="font-bold text-xl mb-2">Channel ID: {{ $thingspeakchannel->channel_id }}
                                    @if (isset(Auth::user()->id) && Auth::user()->id == $thingspeakchannel->user_id)
                                        <span class="sm:ml-15 md:ml-12 lg:ml-9 xl:ml-6 bg-blue-800 py-0 px-3.5 rounded-full"></span>
                                    @endif  
                                </span></div>
                                <p class="text-gray-700 text-base py-2">Temperature: {{ $data['field1'] }}°C</p>
                                <p class="text-gray-700 text-base py-2">Humidity: {{ $data['field2'] }}%</p>
                                <p class="text-gray-700 text-base py-2">Water Level: {{ $data['field3'] }} meters</p>
                                <p class="text-gray-700 text-base py-2">Water Flowrate: {{ $data['field4'] }} mL/sec</p>         
                        </div>
                    @endforeach
                    @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="details/{{ $thingspeakchannel->channel_id }}"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                    @endif
                    @if (Auth::guest())
                        <span class="float-right pb-5 pr-3">
                            <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                        </span>
                    @endif
                </div>
            @endforeach
            {{-- dummy cards --}}
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Channel ID: 2596800</div>
                  <p class="text-gray-700 text-base py-2">Temperature: 37°C</p>
                  <p class="text-gray-700 text-base py-2">Humidity: 60%</p>
                  <p class="text-gray-700 text-base py-2">Water level: 50 meters</p>
                  <p class="text-gray-700 text-base py-2">Water Flowrate: 30 mL/sec</p>
                </div>
                @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="#"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <span class="float-right pb-5 pr-3">
                        <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                    </span>
                @endif
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Channel ID: 1777701</div>
                  <p class="text-gray-700 text-base py-2">Temperature: 37°C</p>
                  <p class="text-gray-700 text-base py-2">Humidity: 60%</p>
                  <p class="text-gray-700 text-base py-2">Water level: 50 meters</p>
                  <p class="text-gray-700 text-base py-2">Water Flowrate: 30 mL/sec</p>
                </div>
                @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="#"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <span class="float-right pb-5 pr-3">
                        <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                    </span>
                @endif
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Channel ID: 0996509</div>
                  <p class="text-gray-700 text-base py-2">Temperature: 37°C</p>
                  <p class="text-gray-700 text-base py-2">Humidity: 60%</p>
                  <p class="text-gray-700 text-base py-2">Water level: 50 meters</p>
                  <p class="text-gray-700 text-base py-2">Water Flowrate: 30 mL/sec</p>
                </div>
                @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="#"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <span class="float-right pb-5 pr-3">
                        <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                    </span>
                @endif
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Channel ID: 1446959</div>
                  <p class="text-gray-700 text-base py-2">Temperature: 37°C</p>
                  <p class="text-gray-700 text-base py-2">Humidity: 60%</p>
                  <p class="text-gray-700 text-base py-2">Water level: 50 meters</p>
                  <p class="text-gray-700 text-base py-2">Water Flowrate: 30 mL/sec</p>
                </div>
                @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="#"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <span class="float-right pb-5 pr-3">
                        <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                    </span>
                @endif
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Channel ID: 1266909</div>
                  <p class="text-gray-700 text-base py-2">Temperature: 37°C</p>
                  <p class="text-gray-700 text-base py-2">Humidity: 60%</p>
                  <p class="text-gray-700 text-base py-2">Water level: 50 meters</p>
                  <p class="text-gray-700 text-base py-2">Water Flowrate: 30 mL/sec</p>
                </div>
                @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="#"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <span class="float-right pb-5 pr-3">
                        <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                    </span>
                @endif
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                  <div class="font-bold text-xl mb-2">Channel ID: 5390505</div>
                  <p class="text-gray-700 text-base py-2">Temperature: 37°C</p>
                  <p class="text-gray-700 text-base py-2">Humidity: 60%</p>
                  <p class="text-gray-700 text-base py-2">Water level: 50 meters</p>
                  <p class="text-gray-700 text-base py-2">Water Flowrate: 30 mL/sec</p>
                </div>
                @if (Auth::user())
                    <div class="text-center px-6 py-4 pb-10">
                        <a 
                            href="#"
                            class="text-center uppercase bg-blue-500 text-gray-100 text-sm font-bold py-3 px-4 rounded-3xl my-2 w-3/6 hover:bg-blue-800">
                            View more           
                        </a>
                    </div>
                @endif
                @if (Auth::guest())
                    <span class="float-right pb-5 pr-3">
                        <a href="/login" class="text-gray-500 italic hover:text-gray-900 pb-1 border-b-2">Login to view more</a>
                    </span>
                @endif
            </div>
        </div>

    </div>
@endsection

