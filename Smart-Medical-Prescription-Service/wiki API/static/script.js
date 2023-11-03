$(document).ready(function() {
    $('#medicine-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var medicineName = $('#medicine-name').val();

        // Make a POST request to the Flask API endpoint
        $.post('/medicine', { name: medicineName }, function(data) {
            if ('error' in data) {
                $('#result').html('<p>' + data['error'] + '</p>');
            } else {
                var resultHtml = '<h2>' + data['title'] + '</h2>';
                resultHtml += '<p>' + data['summary'] + '</p>';
                resultHtml += '<a href="' + data['url'] + '" target="_blank">Read more</a>';
                $('#result').html(resultHtml);
            }
        }).fail(function() {
            $('#result').html('<p>An error occurred while fetching the medicine information.</p>');
        });
    });
});
