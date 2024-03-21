{{-- @foreach ($users as $user)
<tr border="1">
    {{-- <td>{{ $user->first_name }}</td>
<td>{{ $user->last_name }}</td> --}}
    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
    <td>{{ $user->email }}</td>
    <td><img src="{{ asset('vendor/blade-flags/country-' . $user->countryData->iso . '.svg') }}"
            width="60" height="40" /></td>
    <td>{{ $user->phone }}</td>
    <td>
        @foreach (json_decode($user->hobby) as $hobby)
            {{ $hobby }}
            @unless ($loop->last)
                ,
            @endunless
        @endforeach
    </td>
    <td>{{ $user->address }}</td>
    <td>
        <img src="{{ $user->profile }}" alt="profile Picture" width="100"
            height="100">
    </td>
    <td>
        <a class="btn btn-warning"
            href={{ 'update_show/' . $user['id'] }}>UPDATE</a>
    </td>
    <td>
        <button class="btn btn-danger"
            onclick="openConfirmDeleteModal('{{ $user['id'] }}')">Delete</button>

    </td>
</tr>
@endforeach --}}
