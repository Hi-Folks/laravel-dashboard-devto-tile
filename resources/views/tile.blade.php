<x-dashboard-tile :position="$position">

        <div class="font-bold text-3xl leading-none mb-2"><a href="https://dev.to/dashboard">DEV.TO Articles</a></div>

        <div wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center | divide-y-2">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-2 py-2 text-xs">Title</th>
                        <th class="px-2 py-2 text-xs">Views</th>
                        <th class="px-2 py-2 text-xs">React</th>
                        <th class="px-2 py-2 text-xs">Comm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $item)
                    <tr class="hover:bg-gray-100  border-gray-200">
                        <td class="border px-2 py-1  items-center"><a href="{{ $item["url"] }}">{{ $item["title"] }}</a></td>
                        <td class="border px-2 py-1 text-center">{{ $item["page_views_count"] }}</td>
                        <td class="border px-2 py-1 text-center">{{ $item["public_reactions_count"] }}</td>
                        <td class="border px-2 py-1 text-center">{{ $item["comments_count"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</x-dashboard-tile>
