function deleteHandle(event){
  event.preventDefault();
  if(window.confirm('本当に削除していいですか？？')){
    document.getElementById('delete-form').submit();
  }else{
    alert('キャンセルしました！！');
  }

  // swal({
  //   title: "Are you sure?",
  //   text: "Once deleted, you will not be able to recover this imaginary file!",
  //   icon: "warning",
  //   buttons: true,
  //   dangerMode: true,
  // })
  // .then((willDelete) => {
  //   if (willDelete) {
  //     swal("Poof! Your imaginary file has been deleted!", {
  //       icon: "success",
  //     });
  //   } else {
  //     swal("Your imaginary file is safe!");
  //   }
  // });
}