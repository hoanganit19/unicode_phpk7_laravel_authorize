@extends('layouts.app')

@section('content')
    <h1>Phân quyền nhóm: {{$group->name}}</h1>
    <hr>
    @if (session('msg'))
        <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif
    <form action="" method="post">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="20%">Module</th>
                <th>Phân quyền</th>
            </tr>
            </thead>
            <tbody>
            @if ($modules->count()>0)
                @foreach($modules as $module)
                    <tr>
                        <td>
                            {{$module->title}}
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-3">
                                    <label for="role_{{$module->name}}_view">
                                        <input id="role_{{$module->name}}_view" type="checkbox" name="role[{{$module->name}}][]" value="view" {{isRole($group, $module->name, 'view')?'checked':false}}/> Xem
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label for="role_{{$module->name}}_add">
                                        <input id="role_{{$module->name}}_add" type="checkbox" name="role[{{$module->name}}][]" value="add" {{isRole($group, $module->name, 'add')?'checked':false}}/> Thêm
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label for="role_{{$module->name}}_edit">
                                        <input id="role_{{$module->name}}_edit" type="checkbox" name="role[{{$module->name}}][]" value="edit" {{isRole($group, $module->name, 'edit')?'checked':false}}/> Sửa
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label for="role_{{$module->name}}_delete">
                                        <input id="role_{{$module->name}}_delete" type="checkbox" name="role[{{$module->name}}][]" value="delete" {{isRole($group, $module->name, 'delete')?'checked':false}}/> Xoá
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

        @csrf

        <button type="submit" class="btn btn-primary">Phân quyền</button>
    </form>

@endsection
