<tr id="row-edit-{{$c->id}}" class="d-none">
    <form method="POST" action="{{ route('categories.update') }}">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" value="{{$c->id}}">
    <td>{{$c->id}}</td>
    <td>
        <input type="text" name="name" value="{{$c->name}}" class="form-control form-control-sm">
    </td>
    <td>{{$c->created_at}}</td>
    <td>
        <button type="submit" class="btn btn-sm btn-dark" style="width: 40px;">✓</button>
        <button type="button" class="btn btn-sm btn-secondary" style="width: 40px;" onclick="cancelEdit({{$c->id}})">✕</button>
    </td>
    @csrf
    </form>
</tr>