<tr class="intro-x">
    <td class="w-40">
        <div class="flex">
            <p class="text-xs">{{ $formattedDate }}</p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs">{{ $data->req_no }}</p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs">{{ $data->user->name }}</p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs">{{ $data->user->address }}</p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <p class="text-xs">{{ $totalAmount }}</p>
        </div>
    </td>
    <td class="w-40">
        <div class="flex">
            <a href="{{ route('sell.assetListAd', $data->id) }}" data-toggle="modal" data-target="#view"
                class="view-dialog rounded-md p-1 w-35 text-white bg-theme-1 hover:bg-blue-400 xl:mr-3 flex"><i data-feather="eye"></i></a>
        </div>
    </td>
</tr>