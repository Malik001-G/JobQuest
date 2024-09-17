<x-layout>
    <x-page-heading>Results</x-page-heading>
    <div class="mt-6 space-y-6">
        @forelse ($jobs as $job)
        <x-job-card-wide :$job />
        @empty
        <p class="text-white text-center">We couldn’t find any jobs that match your search. <a href="/"
                class="text-blue-500 hover:underline">Return to the homepage</a> to explore other opportunities.</p>
        @endforelse
    </div>
</x-layout>