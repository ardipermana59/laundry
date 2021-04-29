<script type="text/javascript">
  window.addEventListener('success', event => {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: event.detail.text,
      timer: 2500,
    });
  });
  window.addEventListener('confirmation', event => {
    Swal.fire({
      title: 'Peringatan !',
      text: event.detail.text,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus data !',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        Livewire.emit('destroy', event.detail.id)
      }
    })
  })
</script>
