<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj Sprzęt') }}
        </h2>
    </x-slot>
    <!-- component -->
<table class="border-collapse w-full">
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nazwa</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Ilość</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Data przydatności</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Zmień dane</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)

        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Nazwa</span>
                {{$user->nazwaSprzetu}}
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Ilośc</span>
                {{$user->iloscSprzetu}}
            </td>
          	<td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Data przydatności</span>
                <span class="rounded bg-green-400 py-1 px-3 text-xs font-bold">
                {{$user->stopienZuzycia}}</span>
          	    
            </td>
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Zmień date</span>
                <a href="./edytujsprzet/{{$user->id}}" class="text-blue-400 hover:text-blue-600 underline">Edytuj</a>

            </td>
        </tr>
       @endforeach
    </tbody>
</table>
<button class="mx-2 my-2 bg-white transition duration-150 ease-in-out rounded text-gray-800 border border-gray-300 px-6 py-2 text-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-800 right-0" ><a href="./dodajsprzet">Dodaj</a></button>

</x-app-layout>