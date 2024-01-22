document.getElementById('save-changes').addEventListener('click', () => {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return;
    }

    // Save the changes using AJAX or Fetch API
    // ...

    alert('Changes saved successfully');
});