<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>Seminar Beasiswa LPDP 2023</title>
</head>
<body id="register">
  <div class="container register-container">
    <form class="register-form" action="{{ route('register.store') }}" method="post">
        @csrf
      <nav class="navbar">
        <a href="{{ route('home') }}">
          <i class="fas fa-arrow-left"></i> Back
        </a>
          <img src="{{asset('storage/utils/logo.png')}}" alt="logo" width="100">
      </nav>
      <h1>Registrasi Seminar Beasiswa LPDP 2023</h1>
      <p>Yuk daftar untuk mengikuti kegiatan <b>Seminar Beasiswa LPDP 2023</b> yang mengusung tema “<b>Indonesia Maju 2045: Sumber Daya Manusia, Industrialisasi & Kewirausahaan</b>”!</p>
      <p>
        Kamis, 27 Juli 2023
        <br>Pukul 09:00–16:30 WIB  
      </p>
      @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif
      <div class="form-control">
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" required>
        @error('name')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="email">Email</label>
        <input type="email" name="email" required>
        @error('email')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="phone">Nomor HP yang Terhubung dengan WhatsApp</label>
        <input type="text" name="phone" required>
        @error('phone')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="nik">NIK</label>
        <input type="text" name="nik" required>
        @error('nik')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="age">Usia</label>
        <input type="number" name="age" min="17" max="100" required>
        @error('age')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="education">Pendidikan Terakhir</label>
        <select name="education" required>
          <option value="Doktor (S3)">Doktor (S3)</option>
          <option value="Magister (S2)">Magister (S2)</option>
          <option value="Sarjana (S1)">Sarjana (S1)</option>
          <option value="Diploma 4 (D4)">Diploma 4 (D4)</option>
          <option value="Diploma 3 (D3)">Diploma 3 (D3)</option>
          <option value="Diploma 1 (D1)">Diploma 1 (D1)</option>
          <option value="Sekolah Menengah Atas (SMA)">Sekolah Menengah Atas (SMA)</option>
        </select>
        @error('education')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="occupation">Jenis Pekerjaan</label>
        <select name="occupation" required>
          <option value="PNS">PNS</option>
          <option value="Pegawai BUMN">Pegawai BUMN</option>
          <option value="Pegawai Swasta">Pegawai Swasta</option>
          <option value="Dosen">Dosen</option>
          <option value="Guru">Guru</option>
          <option value="Peneliti">Peneliti</option>
          <option value="Entrepreneur">Entrepreneur</option>
          <option value="Profesional">Profesional</option>
          <option value="Mahasiswa">Mahasiswa</option>
          <option value="Pelajar">Pelajar</option>
          <option value="Lainnya">Lainnya</option>
        </select>
        @error('occupation')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <label for="instance">Asal Instansi</label>
        <input type="text" name="instance" required>
        @error('instance')
        <span class='error-msg'>{{$message}}</span>
        @enderror
      </div>
      <div class="form-control">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>