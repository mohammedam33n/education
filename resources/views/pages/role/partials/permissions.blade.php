<div class="table-responsive">
    <table class="table table-bordered mb-4 text-left">
        <thead>
            <tr>
                <th>Table</th>
                <th>Create</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Edit</th>
                <th>show</th>
                <th>index</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getPermissionsForView() as $table => $permissions)
                <tr>
                    <td>
                        {{-- <label for="{{$table}}">{{$table}}</label> --}}
                        <label class="control control-checkbox">
                            {{$table}}
                            <input type="checkbox" id="{{$table}}" class="checkAll" data-table="{{$table}}"/>
                            <div class="control_indicator"></div>
                        </label>

                        {{-- <input type="checkbox" id="{{$table}}" class="custom-checkbox checkAll" data-table="{{$table}}"> --}}
                    </td>
                    @foreach ($permissions as $permission)
                        <td>
                            <label class="control control-checkbox">
                                    <span class="opacity-0">Hello</span>
                                    <input type="checkbox" name="permissions[{{$table}}][]" value="{{$permission['value']}}" />
                                <div class="control_indicator"></div>
                            </label>
                            {{-- <input type="checkbox" name="{{$table}}[]" value="{{$permission['value']}}"> --}}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('js')
    <script>
        $('.checkAll').on('change',function(){
            let table = $(this).data('table')
            if(this.checked == true)
            {
                $(`input[name='permissions[${table}][]']`).prop('checked',true)
            }
            else
            {
                $(`input[name='permissions[${table}][]']`).prop('checked',false)
            }
        })
    </script>
@endpush