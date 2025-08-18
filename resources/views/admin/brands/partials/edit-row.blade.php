            <tr id="row-edit-{{$b->id}}" class="d-none">
            <form method="POST" action="{{route('brands.update')}}">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="{{$b->id}}">
                
                <td>{{$b->id}}</td>
                <td>
                <input type="text" name="name" value="{{$b->name}}" class="form-control form-control-sm">
                </td>
                <td>
                <select name="category_id" class="form-select form-select-sm">
                    @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" <?= $cat['id'] == $b['category_id'] ? 'selected' : '' ?>>
                        {{$cat->name}}
                    </option>
                    @endforeach
                </select>
                </td>
                <td><?= $b['created_at'] ?></td>
                <td>
                <button type="submit" class="btn btn-sm btn-dark" style="width: 40px;">✓</button>
                <button type="button" class="btn btn-sm btn-secondary" style="width: 40px;" onclick="cancelEdit({{$b->id}})">✕</button>
                </td>
                @csrf
            </form>
            </tr>