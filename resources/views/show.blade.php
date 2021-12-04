@extends('layouts.app')

@section('content')
    <div class="flex justify-center pt-2">
        <div class="py-8 border-b border-gray-200 text-center grid grid-cols-3 gap-x-40">
            <div class="self-center pl-10">
                <img src="/img/water_level_legends.png" alt="" width="200" class="border border-gray-900 m-auto p-5 bg-gray-50 ">
            </div>
            <div>
                <h1 class="text-4xl">
                    Simulation Analytics
                </h1>
                <p class="pt-4">For channel: <span class="font-bold">{{ $details->channel_id }}</span></p>
                <p class="pt-4">Flood Risk: <span class="font-bold pl-2">
                    @foreach ($datas['feeds'] as $data)
                    @if ( $data['field3'] >= 2.91 && $data['field3'] <= 3.74 && $data['field2'] > 83 )
                        <span class="pr-2">Alert</span>
                        <span 
                            href="#"
                            class="bg-yellow-200 py-0.5 px-3.5 my-2 w-10 h-10">     
                        </span>
                    @elseif ( $data['field3'] >= 3.75 && $data['field3'] <= 5.74 && $data['field2'] > 83 )
                        <span class="pr-2">Warning</span>
                        <span 
                            href="#"
                            class="bg-orange-500 py-0.5 px-3.5 my-2 w-10 h-10">    
                        </span>
                    @elseif ( $data['field3'] >= 5.75 && $data['field2'] > 83)
                        <span class="pr-2">Danger</span>
                        <span 
                            href="#"
                            class="bg-red-600 py-0.5 px-3.5 my-2 w-10 h-10">     
                        </span>
                    @else
                        <span class="pr-2">Normal</span>
                        <span 
                            href="#"
                            class="bg-green-600 py-0.5 px-3.5 my-2 w-10 h-10">     
                        </span>
                    @endif
                @endforeach
                </span></p>
                <p class="pt-4">Water Current: <span class="font-bold">
                    @foreach ($datas['feeds'] as $data)
                    @if ( $data['field4'] >= 3.0 && $data['field4'] <= 8.0 )
                        Moderate
                    @elseif ( $data['field4'] >= 8.1)
                        Heavy
                    @else
                        Natural
                    @endif
                @endforeach
                </span></p>
            </div>
            <div class="self-center m-auto">
                @foreach ($datas['feeds'] as $data)
                    @if ( $data['field2'] <= 82)
                        <img src="/img/sunny_icon.png" alt="" width="200">
                    @else
                        <img src="/img/rainy_icon.png" alt="" width="200">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 sm:gap-y-5 md:gap-y-8 gap-x-10 pt-8">
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-top: 10px solid #2F7EB2; border-bottom: 10px solid #2F7EB2; border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/widgets/324012"></iframe>
            </div>
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-top: 10px solid #2F7EB2; border-bottom: 10px solid #2F7EB2; border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/widgets/324014"></iframe>
            </div>
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-top: 10px solid #2F7EB2; border-bottom: 10px solid #2F7EB2; border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/widgets/324016"></iframe>
            </div>
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-top: 10px solid #2F7EB2; border-bottom: 10px solid #2F7EB2; border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/widgets/324017"></iframe>
            </div>
        </div>
    </div>
    <div class="flex justify-center pt-10">
        <div class="py-8 border-b border-gray-200 text-center">
            <div>
                <h1 class="text-4xl">
                    Advance Analytics
                </h1>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 sm:gap-y-5 md:gap-y-8 gap-x-10 pt-8">
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
            </div>
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
            </div>
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/charts/3?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
            </div>
            <div>
                <iframe width="440" height="250" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;" src="https://thingspeak.com/channels/{{ $details->channel_id }}/charts/4?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>
            </div>
        </div>
    </div>
    {{-- <div class="py-8 border-b border-gray-200 text-center">
        <h2 class="text-4xl">
            Forecasting
        </h2>
    </div>
    <div class="flex justify-center py-20">
        <div class="grid grid-cols-1 gap-y-4">
            <div>
                <h3>Current Weather:</h3>
                @foreach ($datas['feeds'] as $data)
                    @if ( $data['field2'] <= 75)
                        <img src="/img/sunny_icon.png" alt="" width="200">
                    @else
                        <img src="/img/rainy_icon.png" alt="" width="200">
                    @endif
                @endforeach
            </div>
            <div class="pb-8">
                <h3>Flood Risk: <span class="pl-1">
                    @foreach ($datas['feeds'] as $data)
                        @if ( $data['field3'] >= 20 && $data['field3'] <= 30 )
                            <a 
                                href="#"
                                class="bg-yellow-200 py-3 px-4 my-2 w-3/6">     
                            </a>
                        @elseif ( $data['field3'] >= 31 && $data['field3'] <= 40 )
                            <a 
                                href="#"
                                class="bg-orange-600 py-3 px-4 my-2 w-3/6">     
                            </a>
                        @elseif ( $data['field3'] >= 41 && $data['field3'] <= 50 )
                            <a 
                                href="#"
                                class="bg-red-600 py-3 px-4 my-2 w-3/6">     
                            </a>
                        @else
                            <a 
                                href="#"
                                class="bg-green-600 py-3 px-4 my-2 w-3/6">     
                            </a>
                        @endif
                    @endforeach
                </span></h3>
            </div>
            <div>
                <h3>Water Current: <span>
                    @foreach ($datas['feeds'] as $data)
                        @if ( $data['field4'] >= 20 && $data['field4'] <= 30 )
                            Moderate
                        @elseif ( $data['field4'] >= 31 && $data['field4'] <= 40 )
                            Heavy
                        @else
                            Natural
                        @endif
                    @endforeach
                </span></h3>
            </div>
        </div>
    </div> --}}
@endsection
