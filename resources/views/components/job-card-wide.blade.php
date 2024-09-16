@props(['job'])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo />
    </div>
    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">Laracasts</a>
        <h3 class="group-hover:text-blue-600 font-bold transition-colors duration-300 text-xl ">Video Producer</h3>
        <p class="text-sm mt-4">Full time - From $60,000</p>
    </div>

    <div>
        @foreach ($job->tags as $tag)
        <x-tag :tag="$tag" size="base" />
        @endforeach

    </div>
</x-panel>