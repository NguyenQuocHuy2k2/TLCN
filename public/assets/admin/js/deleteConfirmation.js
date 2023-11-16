function confirmDelete(event) {
    event.preventDefault();

    Swal.fire({
        title: "You want to delete this item?",
        text: "This action cannot be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#80bb35",
        cancelButtonColor: "#FE9705",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.closest('form').submit();
        }
    });
}
