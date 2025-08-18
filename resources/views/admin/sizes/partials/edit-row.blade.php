<tr id="row-edit-{{$s->id}}" class="d-none">
    <form method="POST" action="{{ route('sizes.update', $s->id)}}">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="{{$s->id}}">
        <td>{{$s->id}}</td>
        <td><input type="text" name="name" class="form-control form-control-sm" value="{{$s->name}}"></td>
        <td>{{$s->created_at}}</td>
        <td>
            <button class="btn btn-sm btn-dark" style="width:40px;">✓</button>
            <button type="button" class="btn btn-sm btn-secondary" style="width:40px;" onclick="cancelEdit({{$s->id}})">✕</button>
        </td>
        @csrf
    </form>
</tr>