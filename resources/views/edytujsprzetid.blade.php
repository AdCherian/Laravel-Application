<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sprzęt') }}
        </h2>
    </x-slot>
    <div class="flex mx-auto items-center justify-center shadow-lg mt-56 max-w-lg">
   <form method="POST" action="./{{$sprzet->id}}" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
    @csrf

      <div class="flex flex-wrap -mx-3 mb-6">
         <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Dodaj sprzęt</h2>
         <div class="w-full md:w-full px-3 mb-2 mt-2">
            <!-- <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea> -->
            <label class="block text-gray-700 text-sm font-bold mt-2" for="nazwa">Nazwa</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="nazwa" name="nazwa" type="text" value="{{$sprzet->nazwaSprzetu}}" placeholder="Wpisz informacje">

            <label class="block text-gray-700 text-sm font-bold mt-2" for="ilosc">Ilość</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="ilosc" name="ilosc" type="number" value="{{$sprzet->iloscSprzetu}}" placeholder="Wpisz informacje">

            <label class="block text-gray-700 text-sm font-bold mt-2" for="data">Data przydatności</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
            id="data" name="data" type="date" value="{{$sprzet->stopienZuzycia}}" placeholder="Wpisz informacje">

            
      
        </div>
         <div class="w-full md:w-full flex items-start md:w-full px-3">
            
            <div class="-mr-1">
               <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Dodaj sprzęt'>
            </div>
         </div>
      </form>
   </div>
</div>
</x-app-layout>