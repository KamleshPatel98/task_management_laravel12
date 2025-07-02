@forelse ($records as $row)
<tr>
    <td>{{ $row->name }}</td>
</tr>
@empty
    
@endforelse
{{ $records->links('pagination::bootstrap-5') }}