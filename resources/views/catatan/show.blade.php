{{-- 
    View Index - Menampilkan daftar semua catatan
    Dibuat oleh: AMAR
--}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catatan Sederhana</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        h1 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn-primary {
            background: #4CAF50;
            color: white;
        }
        .btn-primary:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .btn-warning {
            background: #ff9800;
            color: white;
        }
        .btn-warning:hover {
            background: #e68900;
        }
        .btn-danger {
            background: #f44336;
            color: white;
        }
        .btn-danger:hover {
            background: #da190b;
        }
        .btn-info {
            background: #2196F3;
            color: white;
        }
        .btn-info:hover {
            background: #0b7dda;
        }
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            background: white;
            color: #155724;
            border-left: 4px solid #4CAF50;
        }
        .catatan-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .catatan-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .catatan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.2);
        }
        .catatan-judul {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .catatan-deskripsi {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
            max-height: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .catatan-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .empty-state {
            background: white;
            border-radius: 12px;
            padding: 60px 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .empty-state h2 {
            color: #666;
            margin-bottom: 10px;
        }
        .empty-state p {
            color: #999;
        }
        .team-info {
            background: rgba(255,255,255,0.2);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📝 Catatan Sederhana</h1>
        
        <div class="team-info">
            <strong>Dibuat oleh Kelompok:</strong> Rafif, Amar, Zidan, Dana, Irji
        </div>

        @if(session('success'))
            <div class="alert">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="header-section">
            <h2 style="color: white;">Daftar Catatan</h2>
            <a href="{{ route('catatan.create') }}" class="btn btn-primary">+ Tambah Catatan Baru</a>
        </div>

        @if($catatans->count() > 0)
            <div class="catatan-grid">
                @foreach($catatans as $catatan)
                    <div class="catatan-card">
                        <div class="catatan-judul">{{ $catatan->judul }}</div>
                        <div class="catatan-deskripsi">{{ Str::limit($catatan->deskripsi, 100) }}</div>
                        <div class="catatan-actions">
                            <a href="{{ route('catatan.show', $catatan->id) }}" class="btn btn-info">Lihat</a>
                            <a href="{{ route('catatan.edit', $catatan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('catatan.destroy', $catatan->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h2>📭 Belum ada catatan</h2>
                <p>Mulai dengan menambahkan catatan pertama Anda!</p>
            </div>
        @endif
    </div>
</body>
</html>
