document.getElementById('toggleButton').addEventListener('click', function() {
    var insertForm = document.getElementById('insertForm');
    var selectView = document.getElementById('selectView');

    if (insertForm.style.display === 'none') {
        insertForm.style.display = 'block';
        selectView.style.display = 'none';
    } else {
        insertForm.style.display = 'none';
        selectView.style.display = 'block';
    }
});