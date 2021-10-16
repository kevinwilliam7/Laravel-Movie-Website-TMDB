<div class="container flex flex-wrap">
    <table class="text-black dark:text-white w-auto">
        <thead class="uppercase leading-2">
            <tr>
                <th class="px-14 py-2">Option</th>
                <th class="px-14 py-2">Resolution</th>
                <th class="px-14 py-2">Status</th>
                <th class="px-14 py-2">Date</th>
                <th class="px-14 py-2">Uploaded</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($downloads as $download)
                <tr class="">
                    <td class="py-6 p-4">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <img class="w-6 h-6" src="{{$download->cloud_storage->image}}"/>
                            </div>
                            <span class="font-medium hover:text-blue-500"><a href="{{$download->source}}">{{$download->cloud_storage->name}}</a></span>
                        </div>
                    </td>
                    <td>{{$download->resolution}}</td>
                    <td><span class="@if($download->status=='Released') bg-green-200 text-green-600  @elseif($download->status=='Coming Soon') bg-red-200 text-red-600 @endif py-1 px-3 rounded-full text-xs">{{$download->status}}</span></td>
                    <td>{{Carbon\Carbon::parse($download->created_at)->format('M d, Y')}}</td>
                    <td>Admin Joker</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>