const submitWishButton = document.getElementById('submit-wish');
const fullnameWish = document.getElementById('fullname-wish');
const emailWish = document.getElementById('email-wish');
const contentWish = document.getElementById('content-wish');
const wishContentBox = document.getElementById('wish-content-list');

const saveWish = async () => {
    try {
        const wishData = {
            fullname: fullnameWish.value.trim(),
            email: emailWish.value.trim(),
            content: contentWish.value.trim()
        }

        openLoadingAnimation();
        setUserInfoAutoFill(wishData.fullname, wishData.email);

        const response = await fetch(BASE_URL + '/wishes/save.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(wishData)
        });

        if (!response.ok) {
            closeLoadingAnimation();
            openPopupNotify('Lỗi kết nối', '', 'error');
        } else {
            const result = await response.json();
            closeLoadingAnimation();

            if (result.status === 'success') {
                openPopupNotify('Thành công', '', 'success');
                getWishes();

                fullnameWish.value = '';
                emailWish.value = '';
                contentWish.value = '';
            } else {
                openPopupNotify('Thất bại', '', 'error');
            }
        }
    } catch (error) {
        closeLoadingAnimation();
        openPopupNotify('Thất bại', '', 'error');
        console.error("Failed to save your wish. ", error);
    }
}

const getWishes = () => {
    fetch(BASE_URL + '/wishes/get.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        }
    })
    .then(response => response.json())
    .then(data => {
        displayWishes(data);
    })
    .catch(error => {
        console.error(error);
    })
}

const displayWishes = (wishes) => {
    let htmlContent = '';

    wishes.forEach(wish => {
        htmlContent += `
            <div class="wish-item">
                <div class="name">${wish.fullname}</div>
                <div class="content">${wish.content}</div>
            </div>
        `;
    });

    wishContentBox.innerHTML = htmlContent;
}

window.addEventListener('DOMContentLoaded', () => {
    getWishes();
});

submitWishButton.addEventListener('click', () => {
    saveWish();
})