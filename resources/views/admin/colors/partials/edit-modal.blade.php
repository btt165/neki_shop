<tr id="row-edit-{{$c->id}}" class="d-none" >
    <form method="POST" enctype="multipart/form-data" action="{{ route('colors.update', $c->id) }}">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" value="{{$c->id}}">
    <td> {{$c->id}} </td>
    <td><input type="text" name="name" value="{{$c->name}}" class="form-control form-control-sm "></td>
    <td>
        <div class="image-wrapper" >
            <input type="file" name="image" class="form-control form-control-sm mb-2" accept="image/*">
            <div class="mt-2 input-file">
                <img src="{{asset('storage/' . $c->image)}}">
            </div>
        </div>
    </td>
    <td>{{$c->created_at}}</td>
    <td>
        <button class="btn btn-sm btn-dark" style="width: 40px;">✓</button>
        <button type="button" class="btn btn-sm btn-secondary" style="width: 40px;" onclick="cancelEdit({{$c->id}})">✕</button>
    </td>
    @csrf
    </form>
</tr>