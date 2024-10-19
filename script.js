document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registration-form');

    form.addEventListener('submit', function(event) {
        const firstName = document.getElementById('first-name').value.trim();
        const lastName = document.getElementById('last-name').value.trim();
        const email = document.getElementById('email').value.trim();
        const contact = document.getElementById('contact').value.trim();
        const dob = document.getElementById('dob').value.trim();
        const address = document.getElementById('address').value.trim();
        const city = document.getElementById('city').value.trim();

        function validateName(name) {
            const re = /^[a-zA-Z]+$/;
            return re.test(name);
        }

        function validateAddress(address) {
            const re = /^[a-zA-Z0-9\s,\/-]+$/;
            return re.test(address);
        }

        function validateCity(city) {
            const re = /^[a-zA-Z\s]+$/;
            return re.test(city);
        }
        
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    
        function validateContact(contact) {
            const re = /^[0-9]{10}$/;
            return re.test(contact);
        }

        let errors = [];

        if (firstName === '') {
            errors.push('First Name is required.');
        }
        if (lastName === '') {
            errors.push('Last Name is required.');
        }
        if (!validateName(firstName)) {
            errors.push('First Name must contain only letters.');
        }
        if (!validateName(lastName)){
            errors.push('Last Name must contain only letters');
        }
        if (!validateEmail(email)) {
            errors.push('Email is not valid.');
        }
        if (!validateContact(contact)) {
            errors.push('Contact number must be 10 digits.');
        }
        if (dob === '') {
            errors.push('Date of Birth is required.');
        }
        if (address === '') {
            errors.push('Address is required.');
        } else if (!validateAddress(address)) {
            errors.push('Address must contain only letters, numbers, commas, and spaces.');
        }
        if (city === '') {
            errors.push('City is required.');
        } else if (!validateCity(city)) {
            errors.push('City must contain only letters and spaces.');
        }

        if (errors.length > 0) {
            event.preventDefault(); // Prevent form submission
            alert(errors.join('\n')); // Display errors
        } else {
            alert('Registration Complete!');
        }
    });
});