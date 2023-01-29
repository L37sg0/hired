@php
use App\Models\JobBoard\Listing;

/** @var Listing $listing */
@endphp

@extends('layouts.app')

@section('content')
<section class="container mx-auto p-6 font-mono">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
        <div class="w-full overflow-x-auto">
            <table class="w-full">
                <thead>
                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Company</th>
                    <th class="px-4 py-3">Location</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($listings as $listing)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">
                                <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                         src="{{$listing->getAttribute(Listing::FIELD_LOGO)}}"
                                         alt="" loading="lazy"/>
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <h1>{{$listing->getAttribute(Listing::FIELD_TITLE)}}</h1>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-ms font-semibold border">{{$listing->getAttribute(Listing::FIELD_COMPANY)}}</td>
                        <td class="px-4 py-3 text-xs border">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{$listing->getAttribute(Listing::FIELD_LOCATION)}}</span>
                        </td>
                        <td class="px-4 py-3 text-sm border badge-dark"><a href="#">Apply</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
