document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitBtn').addEventListener('submit', function(event) {
        event.preventDefault();

        console.log("submit button clicked");
       
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        
        const formData = new FormData();
        formData.append('email', email);
        formData.append('password', password);

        fetch('api/login.php', {
            method: 'post',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to login');
            }
            return response.text();
        })
        .then(data => {
            // Handle the response from the login.php script
            console.log(data); // Log the response
            // You can perform additional actions based on the response here
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
