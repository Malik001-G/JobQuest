@props(['job'])

<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>
    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">{{$job->employer->name}}</a>
        <h3 class="group-hover:text-blue-600 font-bold transition-colors duration-300 text-xl ">
            <a href="{{$job->url}}" target="_blank">
                {{$job->title}}
            </a>
        </h3>
        <p class="text-sm mt-4">{{$job->salary}}</p>
    </div>

    <div>
        @foreach ($job->tags as $tag)
        <x-tag :tag="$tag" size="base" />
        @endforeach

    </div>
</x-panel>