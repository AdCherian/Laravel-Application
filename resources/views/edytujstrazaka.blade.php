<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edytuj') }}
        </h2>
    </x-slot>
    <!-- component -->
<!-- comment form -->
<div class="flex mx-auto items-center justify-center shadow-lg mt-56 max-w-lg">
   <form method="POST" action="./{{$users->id}}" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
    @csrf
    @method('PUT')

      <div class="flex flex-wrap -mx-3 mb-6">
         <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Role</h2>
         <div class="w-full md:w-full px-3 mb-2 mt-2">
            <!-- <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea> -->
            <select name="role" id="role">   
                <option value="user">User</option>   
                <option value="strazak">Strażak</option>   
                <option value="admin">Admin</option>
            </select>
      
        </div>
         <div class="w-full md:w-full flex items-start md:w-full px-3">
           
            <div class="-mr-1">
               <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Przypsiz role'>
            </div>
         </div>
      </form>
   </div>
</div>
</x-app-layout>