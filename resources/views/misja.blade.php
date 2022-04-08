<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Akcja') }}
        </h2>
        
    </x-slot>
    <div class="flex mx-auto items-center justify-center shadow-lg mt-56 max-w-lg">
   <form method="POST" action="./dodajakcje" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
    @csrf

      <div class="flex flex-wrap -mx-3 mb-6">
         <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Dodaj akcję</h2>
         <div class="w-full md:w-full px-3 mb-2 mt-2">
            <!-- <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea> -->
            <label class="block text-gray-700 text-sm font-bold mt-2" for="opis">Opis</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="opis" name="opis" type="text" placeholder="Wpisz informacje">

            <label class="block text-gray-700 text-sm font-bold mt-2" for="miejsce">Miejsce</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="miejsce" name="miejsce" type="text" placeholder="Wpisz informacje">

            <label class="block text-gray-700 text-sm font-bold mt-2" for="rodzaj">Rodzaj</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="rodzaj" name="rodzaj" type="text" placeholder="Wpisz informacje">

            <div class="flex justify-center">
                @foreach($strazacy as $strazak)
                <div>     
                    <div class="form-check">       
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="checkbox" name="strazacy[]" value="{{$strazak->id}}" id="flexCheckDefault">       
                        <label class="form-check-label inline-block text-gray-800" 
                        for="flexCheckDefault">{{$strazak->name}}</label>     
                    </div> 
                </div>
                @endforeach
        </div>
        <div class="flex justify-center">
                @foreach($sprzety as $sprzet)
                <div>     
                    <div class="form-check">       
                        <input class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                        type="checkbox" name="sprzety[]" value="{{$sprzet->id}}" id="flexCheckDefault">       
                        <label class="form-check-label inline-block text-gray-800" 
                        for="flexCheckDefault">{{$sprzet->nazwaSprzetu}}</label>     
                    </div> 
                </div>
                @endforeach
        </div>
         <div class="w-full md:w-full flex items-start md:w-full px-3">
           
            <div class="-mr-1">
               <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Dodaj'>
            </div>
         </div>
      </form>
   </div>
</div>
</x-app-layout>