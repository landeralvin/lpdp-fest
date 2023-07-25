<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Details Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body id="detail">
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card w-50"> <!-- Set the card width to 75% of the container -->
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <strong>NIK:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->nik }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Email:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->email }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Nama:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->name }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Telepon:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->phone }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Umur:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->age }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Pendidikan Terakhir:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->education }}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Jenis Pekerjaan:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->job_type }}
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-4">
                    <strong>Status Kehadiran:</strong>
                </div>
                <div class="col-lg-8">
                    {{ $data->attend ? "HADIR" : "TIDAK HADIR" }}
                </div>
            </div>
             <!-- Hadir button row -->
             @if (!$data->attend)
             <div class="row mt-2">
                <div class="col-lg-12 d-grid">
                    <a href="{{ route('qrvalidate.update', ['nik' => $data->nik]) }}" class="btn btn-primary btn-lg update-btn">Hadir</a>
                </div>
            </div>
      @endif
             
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>