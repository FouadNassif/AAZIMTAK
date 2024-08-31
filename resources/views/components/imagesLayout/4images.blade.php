@props(['image1', 'image2', 'image3', 'image4'])
<div class="flex space-x-1"> <!-- Adjust the height as needed -->
    <div class="w-1/2 flex flex-col space-y-1">
        <img src="{{ $image1 }}" class="object-cover h-2/5 w-full">
        <img src="{{ $image2 }}" class="object-cover h-3/5 w-full">
    </div>
    <div class="w-1/2 flex flex-col space-y-1">
        <img src="{{ $image3 }}" class="object-cover h-3/6 w-full">
        <img src="{{ $image4 }}" class="object-cover h-3/6 w-full">
    </div>
</div>
