<x-datatable>
    <x-data-table-thead>

        <th> {!! xWireLink('프로젝트', "orderBy('project')") !!}</th>

        <th width='200'>등록일자</th>
    </x-data-table-thead>

    @if(!empty($rows))
    <tbody>
        @foreach ($rows as $item)
        <x-data-table-tr :item="$item" :selected="$selected">

            <td>
                {!! $popupEdit($item, $item->project) !!}
            </td>
            <td width='200'>{{$item->created_at}}</td>
        </x-data-table-tr>
        @endforeach

    </tbody>
    @endif
</x-datatable>

@if(empty($rows))
<div >
    목록이 없습니다.
</div>
@endif
