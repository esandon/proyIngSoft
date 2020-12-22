@extends($theme)
  
@section('content')
  
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th width="300px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($data) && $data->count())
            @foreach($data as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">There are no data.</td>
            </tr>
        @endif
    </tbody>
</table>
   
{!! $data->links() !!}
  
@endsection