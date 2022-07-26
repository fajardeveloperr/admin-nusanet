<table class="table app-table-hover mb-0 text-left">
    <thead>
        <tr>
            <th class="text-black" style="font-weight:bold; background-color:#3CB371;">Nama</th>
            <th class="text-black" style="font-weight:bold; background-color:#3CB371;">Email</th>
            <th class="text-black" style="font-weight:bold; background-color:#3CB371;">Jabatan</th>
            <th class="text-black" style="font-weight:bold; background-color:#3CB371;">Detail</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pengguna as $peng)
            <tr>
                <td>
                    {{ $peng->name }}
                </td>
                <td>
                    {{ $peng->email }}
                </td>
                <td>
                    {{ $peng->utype }}
                </td>
                <td>
                    {{ $peng->created_at }}
                </td>
            </tr>
        @empty
            <td>
                <i>Maaf data belum tersedia!</i>
            </td>
        @endforelse
    </tbody>
</table>
