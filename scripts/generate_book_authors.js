


export function generateAuthorDropDown() {
    $.get('./php/generate_authors.php', function (response) {
        if (response.status === 'success') {
            const authorDropDown = $('#author');
            authorDropDown.html(response.data);
            
        } else {
            console.error('Error fetching authors:', response);
        }
    });
}
