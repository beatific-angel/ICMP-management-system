{{--Created by Beatific Angel    20222/3/29 9.00 am --}}
<tbody id="home_group_status">
@if($groups)
    @foreach($groups as $key=> $group)
        <tr class="odd">
            <td>{{$group->id}}</td>
            <td>{{$group->name}}</td>
            <td>{{$devicelists[$key]}}</td>
            <td class="bg-success">{{$uplists[$key]}}</td>
            <td class="bg-danger">{{$downlists[$key]}}</td>
            <td>
                <a href="{{ route('group.edit', ['id' => $group->id]) }}" class="tblEditBtn">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="tblDelBtn" href="{{ route('group.delete', ['id' => $group->id]) }}" id="groupdelete">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
    @endforeach
@endif
</tbody>
