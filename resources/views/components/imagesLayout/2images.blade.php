@props(['image1', 'image2'])
<div class="flex space-y-1 flex-col">
    <div class="w-full h-64">
        <img src="{{$image1}}" alt="Image 1" class="object-cover w-full h-full">
    </div>
    <div class="w-full h-64">
        <img src="{{$image2}}" alt="Image 2" class="object-cover w-full h-full">
    </div>
</div>
