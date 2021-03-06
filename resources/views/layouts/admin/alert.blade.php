@if(session('success'))
  Swal.fire(
    'Berhasil',
    '{{ session('success') }}',
    'success'
  )
@elseif(session('update'))
  Swal.fire(
      'Berhasil',
      '{{ session('update') }}',
      'success'
  )
@elseif(session('restore'))
  Swal.fire(
      'Berhasil',
      '{{ session('restore') }}',
      'success'
  )
@elseif(session('error'))
  Swal.fire(
      'Gagal',
      '{{ session('error') }}',
      'error'
  )

@endif