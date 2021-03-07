<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">



          @if(Session::has('msg'))
          <div class="card">
            <div class="card-body">
              {{ Session::get('msg')}}
            </div>
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif


          <form method="post" action="{{url('dashboard')}}" enctype="multipart/form-data">
           @csrf
           <x-label for="email" :value="__('Image Uploder')" />
           <br>
           <input type="radio" id="landscape" name="orentation" {{ $next=="landscape" ? 'checked' : '' }} value="landscape">
           <label for="landscape">landscape</label><br><br>
           <input type="radio" id="portrait" name="orentation" {{ $next=="portrait" ? 'checked' : '' }} value="portrait">
           <label for="portrait">portrait</label>

           <br>
           <br>
           <input type="file" name="fileToUpload" id="fileToUpload">
           <input type="submit" value="Upload Image" name="submit">
         </form>



       {{--   <div class="flex ">

          <table class="border-separate border">

            @foreach ($images as $image) --}}
            {{-- {{$image->orientation}} --}}
             {{--  @php
              $height = 100;
              $width = 100
              @endphp
              --}}
         {{--      @if($image->orientation=="landscape")
              @php
              $height = 100;
              $width = 100
              @endphp
              @else 
              @php
              $height = 100;
              $width = 100
              @endphp
              
              @endif
              <div class=" ">
                {{$image->orientation}}
                <img src=" https://chart.googleapis.com/chart?chs={{$height}}x{{$width}}&cht=qr&chl=http://192.168.1.103/qrcode/public/{{$image->name}}">
              </div>
              @endforeach

            </div>
          </table> --}}




          <div class="rounded-t-xl  bg-gradient-to-r from-purple-50 to-purple-100 p-10">
            <div class="grid grid-cols-2 gap-2 place-content-start ">

             @php
             $skip=false
             @endphp
             @foreach ($images as  $index =>$image)

             {{-- {{$image->orientation}} --}}
             {{--  @php
              $height = 100;
              $width = 100
              @endphp
              --}}
              @if($image->orientation=="landscape")
              <div class="flex-1 col-span-2 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3"> {{$image->orientation}}
                <img class="content-center " src=" https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://192.168.1.103/qrcode/public/{{$image->name}}">
              </div>
              @else
              @if($skip)
              @php
              $skip=false
              @endphp
              @continue
              @endif

              <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3" >{{$image->orientation}} <img src=" https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://192.168.1.103/qrcode/public/{{$image->name}}"> </div>  
              @if( (isset($images[$index+1]->orientation))  && ($images[$index+1]->orientation=="landscape"))

              <div class="flex-1 col-span-2 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">11 {{$images[$index+1]->orientation}}  <img class="self-center" src=" https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://192.168.1.103/qrcode/public/{{ $images[$index+1]->name}}">
              </div>
              @elseif(isset($images[$index+1]->orientation))
              <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">{{$images[$index+1]->orientation}}  <img src=" https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl=http://192.168.1.103/qrcode/public/{{ $images[$index+1]->name}}">
              </div>
              @endif
              @php
              $skip=true
              @endphp

              @endif
              {{-- <img src=" https://chart.googleapis.com/chart?chs={{$height}}x{{$width}}&cht=qr&chl=http://192.168.1.103/qrcode/public/{{$image->name}}"></td> --}}
              @endforeach
            </div>
          </div>



{{--   <div class="rounded-t-xl overflow-hidden bg-gradient-to-r from-purple-50 to-purple-100 p-10">
  <div class="grid grid-cols-2 gap-2 place-content-start h-48">
    <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">1</div>
    <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">2</div>
    <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">3</div>
    <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">4</div>
    <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">5</div>
    <div class="flex-1 rounded-md bg-purple-500 text-white text-2xl font-extrabold flex items-center justify-center py-3">6</div>
  </div>
</div>
--}}

</div>

</div>
</div>
</div>
</div>
</div>
</x-app-layout>
