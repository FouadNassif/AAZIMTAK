@props(['image1', 'image2', 'image3', 'image4', 'image5'])
<div class="flex flex-col h-screen space-y-1"> <!-- Full screen height with spacing -->
    <!-- Top Row -->
    <div class="flex space-x-1 h-2/6">
        <div class="w-8/12 h-full">
            <img src="{{ $image1 }}" alt="Image 1" class="object-cover h-full w-full">
        </div>
        <div class="w-4/12 h-full">
            <img src="{{ $image2 }}" alt="Image 2" class="object-cover h-full w-full">
        </div>
    </div>

    <!-- Bottom Row -->
    <div class="flex space-x-1" style="height: 50vh">
        <div class="w-4/12 flex flex-col space-y-1">
            <div class="flex-1">
                <img src="{{ $image3 }}" alt="Image 3" class="object-cover h-full w-full">
            </div>
            <div class="flex-1">
                <img src="{{ $image4 }}" alt="Image 4" class="object-cover h-full w-full">
            </div>
        </div>
        <div class="w-8/12 h-full">
            <img src="{{ $image5 }}" alt="Image 5" class="object-cover h-full w-full">
        </div>
    </div>
</div>
