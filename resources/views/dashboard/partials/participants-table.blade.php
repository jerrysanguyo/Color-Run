@foreach($participants as $participant)
<tr class="hover:bg-blue-50 transition duration-150 ease-in-out">
    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
        {{ $participant->name }}
    </td>
    <td class="px-4 py-3 hidden sm:table-cell">{{ $participant->companion->name ?? 'N/A' }}</td>
    <td class="px-4 py-3 hidden sm:table-cell">{{ $participant->age }}</td>
    <td class="px-4 py-3 hidden sm:table-cell">{{ $participant->sex }}</td>
    <td class="px-4 py-3 hidden md:table-cell">{{ $participant->email }}</td>
    <td class="px-4 py-3 hidden md:table-cell">{{ $participant->phone }}</td>
    <td class="px-4 py-3 hidden lg:table-cell">
        <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold text-white
                        {{ 
                            $participant->shirt_size === 'XS' ? 'bg-pink-400' :
                            ($participant->shirt_size === 'S' ? 'bg-yellow-400' :
                            ($participant->shirt_size === 'M' ? 'bg-green-400' :
                            ($participant->shirt_size === 'L' ? 'bg-blue-500' : 'bg-purple-500')))
                        }}">
            {{ $participant->shirt_size }}
        </span>
    </td>
    <td class="px-4 py-3 hidden md:table-cell">
        <span
            class="inline-block px-2 py-1 rounded-full text-xs font-semibold text-white {{ $participant->clockIn ? 'bg-green-400' : 'bg-red-400' }}">
            {{ $participant->clockIn ? 'Scanned' : 'Not Scanned' }}
        </span>
    </td>
</tr>
@endforeach