<x-dashboard-tile :position="$position">

        <div class="font-bold text-3xl leading-none mb-2"><a href="https://dev.to/dashboard">DEV.TO Articles</a></div>

        <div wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center | divide-y-2">
            <table class="table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Views</th>
                        <th class="px-4 py-2">Reactions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item["title"] }}</td>
                        <td class="border px-4 py-2">{{ $item["page_views_count"] }}</td>
                        <td class="border px-4 py-2">{{ $item["public_reactions_count"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

</x-dashboard-tile>
