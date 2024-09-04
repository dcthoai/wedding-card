
const wishWrapper = document.getElementById('wish-wrapper');

const displayWishes = (data) => {
    let htmlContent = '';

    data.forEach(item => {
        const isChecked = item.status === '1' ? 'checked' : '';

        htmlContent += `
            <div class="col-12 d-flex align-items-center mb-4 border-bottom pb-3">
                <div class="flex-shrink-0" style="width: 60px; height: 22px;">
                    <input class="wish-status-input" type="checkbox" ${isChecked} data-id="${item.id}">
                </div>
                <div class="flex-1">
                    <div class="wish-item">
                        <div class="fs-5">${item.fullname}</div>
                        <div class="fs-6">${item.content}</div>
                    </div>
                </div>
            </div>
        `;
    });

    wishWrapper.innerHTML = htmlContent;
} 

const getAllWish = () => {
    fetch(BASE_URL + `/admin/wishstatus.php`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            displayWishes(data.wishes);
            addEventListenerUpdateWishStatus();
        }
    })
    .catch(error => {
        console.error(error);
    })
}

const updateWishStatus = (status, wishId) => {    
    fetch(BASE_URL + `/admin/wishstatus.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        },
        body: JSON.stringify({
            status: status,
            wishId: wishId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            openPopupNotify('Cập nhật thành công', '', 'success');
            getAllWish();
        } else {
            openPopupNotify('Cập nhật thất bại', data.message, 'error');
        }
    })
    .catch(error => {
        openPopupNotify('Cập nhật thất bại', '', 'error');
        console.error(error);
    })
}

const addEventListenerUpdateWishStatus = () => {
    const wishItemInputs = document.querySelectorAll('.wish-status-input');

    wishItemInputs.forEach(item => {
        item.addEventListener('change', (event) => {
            const status = event.target.checked ? 1 : 0;
            const wishId = parseInt(item.dataset.id);
            
            updateWishStatus(status, wishId);
        });
    });
}

window.addEventListener('DOMContentLoaded', () => {
    getAllWish();
});