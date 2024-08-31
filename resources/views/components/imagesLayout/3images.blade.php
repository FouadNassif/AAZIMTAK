@props(['image1', 'image2', 'image3'])
<div class="flex">
    <div class="w-1/2 flex">
        <img src="{{ $image1 }}" alt="Image 1" class="object-cover w-full h-full">
    </div>
    <div class="w-1/2 flex flex-col space-y-1">
        <div class="flex-1 ml-1">
            <img src="{{ $image2 }}" alt="Image 2" class="object-cover w-full h-full">
        </div>
        <div class="flex ml-1">
            <img src="{{ $image3 }}" alt="Image 3" class="object-cover w-full h-full">
        </div>
    </div>
</div>
