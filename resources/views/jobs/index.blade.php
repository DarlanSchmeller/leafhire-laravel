<x-layout>
    <x-search-bar :categories="$categories" />

    @foreach ($jobs as $job)
        <x-job-card :job="$job" />
    @endforeach
</x-layout>
