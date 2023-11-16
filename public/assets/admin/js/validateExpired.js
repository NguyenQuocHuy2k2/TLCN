document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('inputExpired');
    input.addEventListener('blur', function() {
        const enteredDate = input.value;
        const parsedDate = new Date(enteredDate);
        if (!isNaN(parsedDate.getTime())) {
            const formattedDate = parsedDate.toISOString().split('T')[0];
            input.value = formattedDate;
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Invalid date!',
                text: 'Please enter a valid date in the Year-Month-Day format.',
                showConfirmButton: false,
                timer: 5000
            });
            input.value = '';
        }
    });
});
