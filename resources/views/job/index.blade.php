<x-layout>
    <x-search-bar />

    @foreach ($jobs as $job)
        <x-job-card :job="$job" />
    @endforeach
</x-layout>
