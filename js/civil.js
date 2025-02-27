document.getElementById('civil_status').addEventListener('change', function () {
    var otherStatusContainer = document.getElementById('other-status-container');
    var otherStatusInput = document.getElementById('other_status');
    if (this.value === 'others') {
        otherStatusContainer.style.display = 'block';
        otherStatusInput.setAttribute('required', 'required');
    } else {
        otherStatusContainer.style.display = 'none';
        otherStatusInput.removeAttribute('required');
        otherStatusInput.value = '';
        document.getElementById('otherStatusError').textContent = '';
    }
});

document.getElementById('other_status').addEventListener('blur', function () {
    if (this.value.trim() === '') {
        document.getElementById('civil_status').value = 'single';
        document.getElementById('other-status-container').style.display = 'none';
        this.removeAttribute('required');
        this.value = '';
        document.getElementById('otherStatusError').textContent = '';
    }
});