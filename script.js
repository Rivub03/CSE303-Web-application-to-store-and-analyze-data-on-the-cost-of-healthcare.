// Use const instead of var
const hospitalTypeSelect = document.getElementById('hospital_type');
const specialitySelect = document.getElementById('speciality');
const priceSelect = document.getElementById('price');

// Use template literals instead of string concatenation
const url = `http://localhost/backend.php?data=`;

// Use arrow functions instead of regular functions
document.addEventListener('DOMContentLoaded', () => {
    fetch(url + 'hospital_types')
        .then(response => response.json())
        .then(data => {
            // Use data to populate hospital types select element
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                hospitalTypeSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
    
    // Similarly fetch and populate specialities and price ranges
    fetch(url + 'specialities')
        .then(response => response.json())
        .then(data => {
            // Use data to populate specialities select element
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                specialitySelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));

    fetch(url + 'price_ranges')
        .then(response => response.json())
        .then(data => {
            // Use data to populate price ranges select element
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                priceSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error:', error));
});