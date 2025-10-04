<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      PDF History
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        @if($pdfs->count())
        <table class="w-full text-left">
          <thead>
            <tr class="border-b border-gray-300 dark:border-gray-700">
              <th class="py-2">#</th>
              <th class="py-2">Date</th>
              <th class="py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pdfs as $pdf)
            <tr class="border-b border-gray-200 dark:border-gray-700">
              <td class="py-2">{{ $loop->iteration }}</td>
              <td class="py-2">{{ $pdf->created_at->format('M d, Y g:i A') }}</td>
              <td class="py-2">
                <a href="{{ asset('storage/'.$pdf->file_path) }}" target="_blank" class="text-blue-600 hover:underline">View / Download</a>
                |
                <a href="{{ route('pdf.edit', $pdf) }}" class="text-green-600 hover:underline">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-4">
          {{ $pdfs->links() }}
        </div>
        @else
        <p class="text-gray-600 dark:text-gray-300">
          No PDF history yet.
        </p>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>