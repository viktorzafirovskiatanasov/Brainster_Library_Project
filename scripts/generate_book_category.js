export function generateCategryDropDown() {
    $.get('./php/generate_categories.php', function (response) {
        if (response.status === 'success') {
            const categoryDropDown = $('#category');
            categoryDropDown.html(response.data);
           
        } else {
            console.error('Error fetching categories:', response);
        }
    });
}