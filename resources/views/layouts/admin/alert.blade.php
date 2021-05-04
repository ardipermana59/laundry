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
      confirmButtonText: event.detail.btnConfirm,
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        if(event.detail.restore){
          Livewire.emit('restore', event.detail.id)
        }
        else if(event.detail.destroyAll){
          Livewire.emit('destroyAll')
        }
        else {
          Livewire.emit('destroy', event.detail.id)
        }
      }
    })
  })
  window.addEventListener('info', event => {
    Swal.fire({
      icon: 'info',
      title: 'Oops',
      text: event.detail.text,
      timer: 2500,
    });
  });
</script>
