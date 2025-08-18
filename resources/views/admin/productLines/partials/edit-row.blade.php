<tr id="row-edit-{{$pl->id}}" class="d-none">
    <form method="POST" action="{{ route('productLines.update') }}">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="id" value="{{$pl->id}}">
        <td>{{$pl->id}}</td>
        <td>
            <input type="text" name="name" class="form-control form-control-sm" value="{{$pl->name}}">
        </td>
        <td>
            <select name="brand_id" class="form-select form-select-sm">
                @foreach($brands as $b)
                    <option value="{{ $b->id }}" <?= $b['id'] == $pl['brand_id'] ? 'selected' : '' ?> >
                        {{ $b->name }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>{{$pl->created_at}}</td>
        <td>
            <button type="submit" class="btn btn-sm btn-dark" style="width:40px;">✓</button>
            <button type="button" class="btn btn-sm btn-secondary" style="width:40px;" onclick="cancelEdit({{$pl->id}})">✕</button>
        </td>
        @csrf
    </form>
</tr>