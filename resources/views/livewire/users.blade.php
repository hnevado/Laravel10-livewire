<div class="container mx-auto px-4 my-8 flex items-start">
    <form class="p-4 border-l-4 border-blue-600 shadow-md mr-8 w-1/4"> 
        
        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2">Nombre</label><br/>
            <input type="text" wire:model='name' class="p-2 bg-gray-200 outline-none w-full">
            @error('name')
             <em class="text-xs text-red-900"> {{ $message }} </em>
            @enderror
        </div>

        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2">Email</label><br/>
            <input type="email" wire:model='email' class="p-2 bg-gray-200 outline-none w-full">
            @error('email')
            <em class="text-xs text-red-900"> {{ $message }} </em>
            @enderror
        </div>

        <div class="mb-4">
            <label class="text-gray-700 font-bold mb-2">Password</label><br/>
            <input type="password" wire:model='password' class="p-2 bg-gray-200 outline-none w-full">
            @error('password')
            <em class="text-xs text-red-900"> {{ $message }} </em>
            @enderror
        </div>

        <button wire:click.prevent='store()' class="bg-blue-600 text-white font-bold w-full p-2 shadow">Guardar</button>

    </form>

    <hr/>
    <table class="shadow-md w-2/4">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">#</th>
                <th class="py-3 px-6 text-left">Nombre</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3-px-6 text-left"></th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @foreach ($users as $user)
             <tr class="border-b border-gray-200">
                <td class="px-4 py-2">{{$user->id }}</td>
                <td class="px-4 py-2">{{$user->name}}</td>
                <td class="px-4 py-2">{{$user->email}}</td>
                <td> 
                  <form> 
                    @method('DELETE')
                    <button wire:click.prevent='destroy({{$user->id}})' class="bg-gray-400 text-white font-bold w-full p-2 shadow mb-2 mt-2">X</button>
                  </form>
                </td>
             </tr>
            @endforeach
        </tbody>
    </table> 
    
</div>
