<form action="{{ route(Auth::user()->getRoleNames()->first() .'.'. $resource . '.store') }}" method="POST"
    class="space-y-4">
    @csrf

    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="name" value="{{ old('name', $record->name ?? '') }}"
            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        @error('name')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $record->email ?? '') }}"
            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        @error('email')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block mb-1 text-sm font-medium text-gray-700">Contact Number</label>
        <input type="text" name="contact" value="{{ old('contact', $record->contact_number ?? '') }}"
            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        @error('contact')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div x-data="{ show: false }" class="relative">
        <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
        <input :type="show ? 'text' : 'password'" name="password"
            class="w-full px-3 py-2 pr-10 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        <div class="absolute top-8 right-3 text-gray-500 cursor-pointer" @click="show = !show">
            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 
                    8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 
                    7-4.478 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 
                    0-8.268-2.943-9.542-7a10.056 10.056 0 012.155-3.292m3.384-2.343A9.953 
                    9.953 0 0112 5c4.478 0 8.268 2.943 
                    9.542 7a9.977 9.977 0 01-1.249 
                    2.527M15 12a3 3 0 11-6 0 3 3 0 
                    016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
            </svg>
        </div>
        @error('password')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end space-x-2 pt-4">
        <button type="button" @click="showModal = false"
            class="px-4 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-pink-100 hover:text-pink-600 transition">
            Cancel
        </button>
        <button type="submit" class="px-4 py-2 text-white bg-pink-600 rounded-lg hover:bg-pink-700 transition">
            Submit
        </button>
    </div>
</form>