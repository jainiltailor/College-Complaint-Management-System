// Basic client-side validation before form submission
document.addEventListener('DOMContentLoaded', function() {
    const complaintForm = document.querySelector('form');
    if (complaintForm) {
        complaintForm.addEventListener('submit', function(e) {
            const complaintText = document.querySelector('textarea').value.trim();
            if (complaintText.length < 5) {
                alert("Complaint text must be at least 5 characters long.");
                e.preventDefault();
            }
        });
    }
});

// Confirmation before marking a complaint as resolved
document.querySelectorAll('.mark-resolved').forEach(button => {
    button.addEventListener('click', function(e) {
        if (!confirm("Are you sure you want to mark this complaint as resolved?")) {
            e.preventDefault();
        }
    });
});
