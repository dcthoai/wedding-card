const logoutAdminButton = document.getElementById('logout-admin-button');

logoutAdminButton.addEventListener('click', () => {
    fetch(BASE_URL + `/admin/logout.php`, {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success')
            window.location.href = BASE_URL + '/admin/login.php';
        else
            openPopupNotify('Thất bại', data.message, 'error');
    })
    .catch(error => {
        openPopupNotify('Thất bại', error.message, 'error');
        console.error(error);
    });
});