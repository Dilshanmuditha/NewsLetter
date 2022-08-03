
<x-application-logo/>
<x-app-layout>
   <x-slot name="header">
        <div class="flex space-x-2 ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight hover:underline">
        <a href="/dashboard" class="{{request()->is('dashboard') ? 'text-blue-500' : ''}}"> All Posts </a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight hover:underline">
        <a href="/dashboard/create" class="{{request()->is('dashboard/create') ? 'text-blue-500' : ''}}">New Post</a>
        </h2></div>
    </x-slot>
   

    <x-dashboard-body :post="$post"/>
     
</x-app-layout><x-footer />