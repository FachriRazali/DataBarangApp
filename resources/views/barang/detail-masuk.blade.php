<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Barang</title>
    <link rel="stylesheet" href="{{ asset('css/masuk.css') }}" />
</head>
<tbody>
    @foreach($Barang as $barangs)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $barangs->barang }}</td>
        <td>{{ $barangs->nobarang }}</td>
        <td>{{ $barangs->kodebarang }}</td>
        <td>{{ $barangs->status }}</td>
        <td>
            <a href="{{ route('barang.edit', $barang->id) }}">Edit</a>
            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

