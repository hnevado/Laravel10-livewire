<div class="container mx-auto px-4 my-8 flex items-start">
   
   <div class="p-4 border-l-4 border-blue-600 shadow-md mr-8 w-1/4">
   
      <p class="mb-4 shadow p-2 font-bold"><a href="{{route('home')}}">&lt; Volver</a></p>
      <p><strong>ID:</strong> {{$user->id}}</p>
      <p><strong>Nombre:</strong> {{$user->name}}</p>
      <p><strong>Email:</strong> {{$user->email}}</p>
   
      @if ($user->avatar)
       <div class="mt-6">
            <img 
             class="mr-4 w-full"
             src="{{ asset('storage/' . $user->avatar) }}">
       </div>
   @endif 


  </div> 





  <div class="w-2/3">
    <form wire:submit.prevent="upload()" enctype="multipart/form-data"> 
      @method('PUT')

         <input type="file" wire:model="file" class="mr-8">
         <button class="bg-blue-600 text-white font-bold p-2 shadow">
            Subir Avatar
         </button>

      @error('file')
        <p class="text-xs text-red-900 italic">{{ $message }}</p>
      @enderror
    </form>
  </div>

</div>
